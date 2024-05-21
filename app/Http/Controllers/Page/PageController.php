<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;

class PageController extends Controller
{
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function getLogin()
    {
        return view('user.login');
    }

    public function PostLogin(request $request)
    {
        if (Auth::attempt(['Email' => $request->Email, 'password' => $request->password, 'Level' => 0])) {
            return redirect()->route('admin_index');
        } 
        if (Auth::attempt(['Email' => $request->Email, 'password' => $request->password, 'Level' => 1])) {
            if(Auth::attempt(['Email' => $request->Email, 'password' => $request->password, 'Status' => 0])){
                return redirect()->route('admin_index');
            }else
            return redirect()->route('login')->with('error', 'Tài khoản Của Bạn Đã Bị Khóa');
        } 
        if (Auth::attempt(['Email' => $request->Email, 'password' => $request->password, 'Level' => 5, 'Status' => 0]))
        {
            return redirect()->route('home');
        }
        elseif(Auth::attempt(['Email' => $request->Email, 'password' => $request->password, 'Level' => 5, 'Status' => 1]))
        {
            return redirect()->route('login')->with('error', 'Tài khoản Của Bạn Đã Bị Khóa');
        }
           
        else {
            return redirect()->route('login')->with('error', 'Tài khoản hoặc mật khẩu không đúng');
        }
    }

    public function register()
    {
        return view('user/register');
    }

    public function postRegister(request $request)
    {

        $users = User::where(['Email' => $request->Email, 'Level' => 5])->first();
        if($users){
            return redirect()->route('register')->with('error', 'Email này đã được sử dụng');
        }else{
            $user = new User();
            $user->Username = $request->Username;
            $user->Email = $request->Email;
            $user->Image = $request->Image;
            $user->Password = Hash::make($request->Password);
            $user->save();
            return redirect()->route('login')->with('success', 'Tạo tài khoản thành công, Mời đăng nhập');
        } 
    }

    public function product_paginate()
    {
        return view('user.product', ['data'=>product::paginate(6)]);
    }

    public function getHome()
    {

        if (Gate::allows('user-role')) {
            return view('admin/404');
        } else { 
            $data = product::where('Pro_Status',0)->orderByDesc('Pro_id')->limit(4)->get();
            $datas =product::paginate(8);
            return view('user/index', ['data' => $data, 'datas' => $datas]);
        }
    }

    public function product()
    {
        return view('user.product');
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function product_detail($id)
    {
          $data = product::find($id);
          $data = product::where(['Pro_id'=>$id])->first();
           return view('user/product_detail', ['product'=>$data]);
    }

    public function check_out()
    {
        return view('user.check_out');
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function index_ad()
    {
        return view('admin.index');
    }

    public function charts()
    {
        return view('admin.charts');
    }

    public function tables()
    {
        return view('admin.tables');
    }

    public function layout_sidenav_light()
    {
        return view('admin.layout_sidenav_light');
    }

    public function layout_static()
    {
        return view('admin.layout_static');
    }

    public function password()
    {
        return view('admin.password');
    }

    public function login_admin()
    {
        return view('admin.login_admin');
    }

    public function order()
    {
        return view('user.order');
    }

    public function order_detail()
    {
        return view('user.order_detail');
    }

    public function SE()
    {
        return view('user.SE');
    }

    public function product_by_category($id)
    {
        $data = Product::find($id);
        $data = Product::where(['Cat_id'=>$id])->paginate(6);
        //dd($data);

        $cat = Category::find($id);
        $cat = Category::where(['Cat_parent'=>$id])->get();
        //dd($cat->product);
        //dd($cat);
        //$data = product::paginate(2);
        return view('user/product_by_category', ['product'=>$data, 'cat'=>$cat]);
        //'data'=>product::paginate(6)
    }

    public function search(request $request)
    {
        //dd($request);
        $product_search = Product::where('Pro_status', 0)->where('Pro_name', 'like', '%' . $request->search . '%')
             //->orWhere('Pro_price', $request->search)
            // ->orWhere('Pro_des', $request->search)
            //->paginate(2);
            ->get();
            return view('user/search', ['search'=>$product_search]);
        
    }
    
}
