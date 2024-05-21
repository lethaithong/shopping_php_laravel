<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Gate;
use File;

class ProductController extends Controller
{
    public function index()
    {
        if (Gate::allows('admin-product')) {
            $data = product::orderByDesc('Pro_id')->get();
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
                'Pro_image' => 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048',
                'Pro_des' => 'required|string'
            ],
            [
                'Pro_name.required' => 'Tên sản phẩm không được để trống',
                'Pro_price.required' => 'Giá sản phẩm không được để trống',
                'Pro_des.required' => 'Mô tả sản phẩm không được để trống'
            ]
        );
            $image = time().'-'.$request->Pro_image->getClientOriginalName();
            $request->Pro_image->move(public_path('image'), $image);
            $data = $request->all();
            $data['Pro_image'] = $image;
            Product::create($data);
            return redirect('admin/product/')->with('message','Thêm sản phẩm Thành Công');
    }

    public function show($id)
    {
        if(Gate::allows('admin-product')) {
            $data = product::find($id);
            return view('user/product_detail', ['product'=>$data]);
        }else {
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
                'Pro_image' => 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048',
                'Pro_des' => 'required|string',
            ],
            [
                'Pro_name.max' => 'Chiều dài tên quá giới hạn cho phép',
                'Pro_price.max' => 'Giá trị nhập quá giới hạn cho phép',
                'Pro_name.required' => 'Tên sản phẩm không được để trống',
                'Pro_price.required' => 'Giá sản phẩm không được để trống',
                'Pro_des.required' => 'Mô tả sản phẩm không được để trống'
            ]
        );
           $obj = product::find($request->Pro_id);
           if($request->Pro_image != ''){        
           $path = public_path().'/image/';
  
            //code for remove old file
            if($obj->Pro_image != '' && $obj->Pro_image != null){
                 $file_old = $path.$obj->Pro_image;
                 unlink($file_old);
            }
            //upload new file
            $image = time().'-'.$request->Pro_image->getClientOriginalName();
            $request->Pro_image->move(public_path('image'), $image);
            $data = $request->all();
            $data['Pro_image'] = $image;
            $obj->update($data);
        }
    return redirect('admin/product/')->with('message','Chỉnh sửa sản phẩm Thành Công');
}

    public function active($id)
    {
        
        $product = Product::find($id);
        
        if($product->Pro_status==1){
            $product->update(['Pro_status'=>'0']);
            return redirect('admin/product/')->with('message','Đã mở trạng thái Thành Công');
        }
        else{
            $product->update(['Pro_status'=>'1']);
            return redirect('admin/product/')->with('message','Đã tắt trạng thái Thành Công');
        }
    }

    public function destroy(request $request)
    {
         $ojb = product::find($request->Pro_id);
         if($ojb->Pro_image != '' && $ojb->Pro_image != null){
            $path = public_path().'/image/'.$ojb->Pro_image;
            if(File::exists($path)) {
                File::delete($path);
            }
       }
         $ojb->delete();
         return redirect('admin/product');
    }
}
