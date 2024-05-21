<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Order_detail;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;

session_start();
class CartController extends Controller
{
    public function get_shopping_cart()
    {
        $userId = Auth::id();
        if($userId){
            $data = Cart::session($userId)->getContent()->sort();
            return view('user/shopping_cart', ['data'=>$data]);
        }
        else{
            $data = Cart::getContent()->sort();
            return view('user/shopping_cart', ['data'=>$data]);
        }
    }

    public function post_shopping_cart(request $request)
    {
        $userId = Auth::id();
        if($userId){
            //$d = Cart::isEmpty();
            $Product = product::find($request->Pro_id);
            $row = ['id'=>$Product->Pro_id,
                'name'=>$Product->Pro_name,
                'price'=>$Product->Pro_price,
                'quantity'=>$request->Pro_sl,
                'attributes'=>['image'=>$Product->Pro_image]];
                Cart::session($userId)->add($row);
                return redirect('/shopping_cart');
        }
        else{
            $Product = product::find($request->Pro_id);
            $row = ['id'=>$Product->Pro_id,
                'name'=>$Product->Pro_name,
                'price'=>$Product->Pro_price,
                'quantity'=>$request->Pro_sl,
                'attributes'=>['image'=>$Product->Pro_image]];
                Cart::add($row);
        return redirect('/shopping_cart');
        }
    }

    public function remove(Request $request)
    {
        $userId = Auth::id();
        if($userId){
            Cart::session(Auth::id())->remove($request->id);
            return redirect('/shopping_cart');
        }
        else{
            Cart::remove($request->id);
            return redirect('/shopping_cart');
        }
    }

    
    public function update(Request $request)
    {
        $userId = Auth::id();
        if($userId){
            Cart::session(Auth::id())->update($request->id,array(
                'quantity' => array(
                    'relative' => true,
                    'value' => $request->quantity
                )));
            return redirect('/shopping_cart');
        }
        else{
            Cart::update($request->id, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                )));
            return redirect('/shopping_cart');
        }
    }

    public function checkout()
    {
        $userId = Auth::id();
        if($userId){
            $data = Cart::session($userId)->getContent()->sort();
            return view('user/check_out', ['data'=>$data]);
        }else{
            $data = Cart::getContent()->sort();
            return view('user/check_out', ['data'=>$data]);
        }
    }

    public function post_checkout(request $request)
    {
                    $User_id = Auth::id();
                    if($User_id){
                        $request -> validate(
                            [
                                'Username' => 'required',
                                'Email' => 'required|email',
                                'Address' => 'required',
                                'Phone' => 'required|digits:10,11',
                            ],
                            [
                                'Username.required' => 'Tên người dùng không được để trống!!',
                                'Password.required' => 'Mật Khẩu không được để trống!!',
                                'Email.required' => 'Email không được để trống!!',
                                'Email.email' => 'Email không đúng định dạng!!',
                                'Address.required' => 'Địa chỉ không được để trống!!',
                                'Phone.required' => 'Số điện thoại không được để trống!!',
                                'Phone.digits' => 'Số điện thoại không đúng!!',
                            ]
                        );
                        if($Order = Order::create([
                            'User_id' => $User_id,
                            'Full_name' => $request->Username,
                            'Email' => $request->Email,
                            'Phone' => $request->Phone,
                            'Address' => $request->Address,
                            'Total' => $request->Total,
                            'Total_coupon' => $request->Total_coupon,
                            'HTTT' => 'Tiền Mặt',
                            'date_order' => $carbon = Carbon::now('Asia/Ho_Chi_Minh')->toDateString(),
                            'Coupon_id' => $request->Coupon_id,
            
                        ])){
                            $Order_id = $Order->Order_id;
                            $items = Cart::session($User_id)->getContent();
                            foreach($items as $item){
                                $Pro_name = $item->name;
                                $image = $item->attributes['image'];
                                $Quantity = $item->quantity;
                                $Price = $item->price;
                                $Pro_id = $item->id;
                                Order_detail::Create([
                                    'Pro_name' => $Pro_name,
                                    'image' => $image,
                                    'Order_id' => $Order_id,
                                    'Pro_id' => $Pro_id,
                                    'Price' => $Price,
                                    'Quantity' => $Quantity
                                ]);
                            }
                            $order_detail = Order_detail::where('Order_id',$Order_id)->get();
                                Mail::send('demo.sendmail',compact('order_detail','Order'), function($email) use($request,$Order){
                                    $email->subject('NEW ORDER');
                                    $email->to($request->Email);
                                    //dd($Order);
                                });
                            Cart::session($User_id)->clear();
                            $coupon = Session::get('coupon');
                            if($coupon == true)
                            Session::forget('coupon');
                            return redirect()->route('SE')->with('ok','Đặt Hàng Thành Công');   
                        }else{
                            return redirect()->back()->with('error','dat hang khong thanh cong');
                        }
                
                    }else{
                    $request -> validate(
                        [
                            'Username' => 'required',
                            'Email' => 'required|email',
                            'Address' => 'required',
                            'Phone' => 'required|digits:10,11',
                        ],
                        [
                            'Username.required' => 'Tên người dùng không được để trống!!',
                            'Password.required' => 'Mật Khẩu không được để trống!!',
                            'Email.required' => 'Email không được để trống!!',
                            'Email.email' => 'Email không đúng định dạng!!',
                            'Address.required' => 'Địa chỉ không được để trống!!',
                            'Phone.required' => 'Số điện thoại không được để trống!!',
                            'Phone.digits' => 'Số điện thoại không đúng!!',
                        ]
                    );

                    $data = $request->all();
                    $data = User::Create($data);
                        if($Order = Order::create([
                            'User_id' => $data->User_id,
                            'Full_name' => $request->Username,
                            'Email' => $request->Email,
                            'Phone' => $request->Phone,
                            'Address' => $request->Address,
                            'Total' => $request->Total,
                            'Total_coupon' => $request->Total_coupon,
                            'date_order' => $carbon = Carbon::now('Asia/Ho_Chi_Minh')->toDateString(),
                            
                        ])){
                            //dd($Order);
                            $Order_id = $Order->Order_id;
                            $items = Cart::getContent();
                            foreach($items as $item){
                                $Pro_name = $item->name;
                                $image = $item->attributes['image'];
                                $Quantity = $item->quantity;
                                $Price = $item->price;
                                $Pro_id = $item->id;
                                Order_detail::Create([
                                    'Pro_name' => $Pro_name,
                                    'image' => $image,
                                    'Order_id' => $Order_id,
                                    'Pro_id' => $Pro_id,
                                    'Price' => $Price,
                                    'Quantity' => $Quantity
                                ]);
                            }
                            $order_detail = Order_detail::where('Order_id',$Order_id)->get();
                                Mail::send('demo.sendmail',compact('order_detail','Order'), function($email) use($request,$Order){
                                    $email->subject('New Order');
                                    $email->to($request->Email);
                                });
                            Cart::clear();
                            return redirect()->route('SE')->with('ok','Đặt Hàng Thành Công');   
                        }else{
                            return redirect()->back()->with('error','dat hang khong thanh cong');
                        }
            }
        }

    public function get_order()
    {
        $userId = Auth::id();
        $data = Order::where(['User_id'=>$userId])->get();
        return view('user/order', ['data'=>$data]);
    }

    public function order_detail($id)
    {
        $data = Order_detail::find($id);
        $data = Order_detail::where(['Order_id'=>$id])->get();

        $datas = Order::find($id);
        $datas = Order::where(['Order_id'=>$id])->first();
        
         return view('user/order_detail', ['data'=>$data, 'datas'=>$datas]);
    }

    public function show_coupon()
    {
        if (Gate::allows('admin-coupon')) {
            return view('admin/coupon/show_coupon',['data'=>Coupon::all()]);
        } else {
            return view('admin/404');
        }  
    }

    public function store_coupon(request $request)
    {
        $request -> validate(
            [
                'Coupon_name' => 'required',
                'Coupon_code' => 'required',
                'Coupon_quantity' => 'required',
                'Coupon_condition' => 'required',
                'Coupon_number' => 'required',
            ],
            [
                'Coupon_name.required' => 'Tên mã không được trống',
                'Coupon_code.required' => 'Mã không được trống',
                'Coupon_quantity.required' => 'Số lượng mã không được trống',
                'Coupon_condition.required' => 'Tính năng mã không được trống',
                'Coupon_number.required' => 'Điều kiện mã không được trống',
            ]
        );
        $coupon = new Coupon;
        $coupon->Coupon_name = $request->Coupon_name;
        $coupon->Coupon_code = $request->Coupon_code;
        $coupon->Coupon_quantity = $request->Coupon_quantity;
        $coupon->Coupon_condition = $request->Coupon_condition;
        $coupon->Coupon_number = $request->Coupon_number;
        $coupon -> save();
        return redirect('admin/coupon/')->with('message','Thêm mã giảm giá Thành Công');
    }

    public function add_coupon()
    {
        if (Gate::allows('admin-coupon')) {
            $data = Coupon::all();
            return view('admin/coupon/add_coupon');
        } else {
            return view('admin/404');
        }
    }

    public function destroy(request $request)
    {
        $coupon = Coupon::find($request->Coupon_id);
        return redirect('admin/coupon');
    }

    public function check_coupon(request $request)
    {
        //$request->session()->flush();
        // session::forget('coupons');
        // session::forget('coupon');
        // $request->session()->all();
        // dd($request);
        $coupon = Coupon::where('Coupon_code', $request->coupon)->first();
        if($coupon){
            $count_coupon = $coupon->count();
            if($count_coupon > 0){
                $coupon_session = Session::get('coupon');
                if($coupon_session){
                        $cou[] = array(
                            'Coupon_code' => $coupon->Coupon_code,
                            'Coupon_condition' => $coupon->Coupon_condition,
                            'Coupon_number' => $coupon->Coupon_number,
                            'Coupon_id' => $coupon->Coupon_id,
                        );
                        Session::put('coupon', $cou);
                    }else{
                        $cou[] = array(
                            'Coupon_code' => $coupon->Coupon_code,
                            'Coupon_condition' => $coupon->Coupon_condition,
                            'Coupon_number' => $coupon->Coupon_number,
                            'Coupon_id' => $coupon->Coupon_id,
                        );
                        Session::put('coupon', $cou);
                    }
                    Session::save();
                    // session::forget('coupons');
                    return redirect()->route('shopping_cart')->with('message','Thêm mã giảm giá thành công');
                }
            }else{
                return redirect()->route('shopping_cart')->with('message','Mã giảm giá không đúng');
        }
        
    }

    // public function edit(request $request ,$id)
    // {
    //    //dd($id);
    //    if (Gate::allows('admin-coupon')) {
    //     return view('admin/coupon/edit_coupon', ['data'=> Coupon::find($id)]);
    // } else {
    //     return view('admin/404');
    // }
        
    // }

    // public function update_coupon(request $request)
    // {

    //      //dd($request->all());  

    //     //  $request -> validate(
    //     //     [
    //     //         'Cat_name' => 'required',
    //     //         'Cat_image' => 'required',
    //     //     ],
    //     //     [
    //     //         'Cat_name.required' => 'ten khong duoc de trong',
    //     //         'Cat_image.required' => 'hinh khong duoc de trong',
    //     //     ]
    //     // );

    //     $coupon = Coupon::find($request->Coupon_id);
    //     $coupon->Coupon_name = $request->Coupon_name;
    //     $coupon->Coupon_code = $request->Coupon_code;
    //     $coupon->Coupon_quantity = $request->Coupon_quantity;
    //     $coupon->Coupon_condition = $request->Coupon_condition;
    //     $coupon->Coupon_number = $request->Coupon_numb
    //     $coupon -> save();
    //     return redirect('admin/coupon/');
    // }

    public function delete_coupon()
    {
        $coupon = Session::get('coupon');
        if($coupon == true)
        Session::forget('coupon');
        return redirect()->route('shopping_cart')->with('message','Xóa mã thành công');
    }

    public function remove_all(Request $request)
    {
        //dd($request);
        $userId = Auth::id();
        if($userId){
            $coupon = Session::get('coupon');
                if($coupon == true)
                    Session::forget('coupon');
                    Cart::session(Auth::id())->clear();
                    return redirect('/shopping_cart');
        }
        else{
            $coupon = Session::get('coupon');
            if($coupon == true)
            Session::forget('coupon');
            Cart::clear();
            return redirect('/shopping_cart');
        }
        
    }

}
