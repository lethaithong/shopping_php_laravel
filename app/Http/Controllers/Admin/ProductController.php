<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function index()
    {
        if (Gate::allows('admin-product')) {
            $data = product::orderByDesc('Pro_id','ASC')->paginate(4);
            return view('admin.product.show_product', ['data'=> $data]);
        } else {
            return view('admin/404');
        }
        
    }

    public function create()
    {
        if (Gate::allows('admin-product')) {
            return view('admin.product.add_product');
        } else {
            return view('admin/404');
        }
        
    }

    
    public function store(Request $request)
    {
        $request -> validate(
            [
                'Pro_name' => 'required',
                'Pro_price' => 'required|numeric',
                'Pro_image' => 'required',
                'Pro_des' => 'required|string',
            ],
            [
                'Pro_name.required' => 'ten san pham khong duoc de trong',
                'Pro_name.max' => 'chieu dai ten qua gioi han cho phep',
                'Pro_image.required' => 'hinh anh san pham khong duoc de trong',
                'Pro_price.required' => 'gia san pham khong duoc de trong',
                'Pro_des.required' => 'mo ta san pham khong duoc de trong',
            ]
        );

           $obj= new product;
           $obj->Pro_name = $request->Pro_name;
           $obj->Cat_id = $request->Cat_id;
           $obj->Pro_price = $request->Pro_price;
           $obj->Pro_status = $request->Pro_status;
           $obj->Pro_des = $request->Pro_des; 
           $obj->Pro_image = $request->Pro_image;
           $obj -> save();
           return redirect('admin/product/');
    }

    public function show($id)
    {
        if (Gate::allows('admin-product')) {
            $data = product::find($id);
            return view('user/product_detail', ['product'=>$data]);
        } else {
            return view('admin/404');
        }
        
       
    }

    public function edit($id)
    {
        if (Gate::allows('admin-product')) {
            return view('admin/product/edit_product', ['data'=> product::find($id)]);
        } else {
            return view('admin/404');
        }
        
    }

    public function update(request $request)
    {
           $request -> validate(
            [
                'Pro_name' => 'required|max:100',
                'Pro_price' => 'required|string|max:100000000',
                'Pro_image' => 'required',
                'Pro_des' => 'required|string',
            ],
            [
                'Pro_name.required' => 'ten san pham khong duoc de trong',
                'Pro_name.max' => 'chieu dai ten qua gioi han cho phep',
                'Pro_image.required' => 'hinh anh san pham khong duoc de trong',
                'Pro_price.max' => 'gia tri nhap qua gioi han cho phep',
                'Pro_price.required' => 'gia san pham khong duoc de trong',
                'Pro_des.required' => 'mo ta san pham khong duoc de trong',
            ]
        );
           
           $obj = product::find($request->Pro_id);
           $obj->Pro_name = $request->Pro_name;
           $obj->Cat_id = $request->Cat_id;
           $obj->Pro_price = $request->Pro_price;
           $obj->Pro_status = $request->Pro_status;
           $obj->Pro_des = $request->Pro_des;
           $obj->Pro_image = $request->Pro_image;
           $obj -> save();
           return redirect('admin/product/');
    }

    public function active($id)
    {
        
        $product = Product::find($id);
        
        if($product->Pro_status==1){
            $product->update(['Pro_status'=>'0']);
            return redirect('admin/product/')->with('Thông Báo','Đã Tắt' .$product->Pro_status.'Thành Công');
        }
        else{
            $product->update(['Pro_status'=>'1']);
            return redirect('admin/product/')->with('Thông Báo','Đã Mở' .$product->Pro_status.'Thành Công');
        }
    }

    public function destroy(request $request)
    {
         $ojb = product::find($request->Pro_id); // tra ve 1 dong co khoa chinh la maloai
         $ojb->delete();
         return redirect('admin/product');
    }
}
