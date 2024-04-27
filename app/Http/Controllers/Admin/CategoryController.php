<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    
    public function index()
    {
        if (Gate::allows('admin-category')) {
            $data = category::orderByDesc('Cat_id','ASC')->get();
            return view('admin.category.show_category', ['data'=>$data]);
        } else {
            return view('admin/404');
        }
    }
    
    public function create()
    {
        if (Gate::allows('admin-category')) {
            return view('admin.category.add_category', ['data'=>category::all()]);
        } else {
            return view('admin/404');
        }
    }

    public function store(Request $request)
    {
        $request -> validate(
            [
                'Cat_name' => 'required|max:100',
                'Cat_image' => 'required',
            ],
            [
                'Cat_name.required' => 'Tên Không Được Trống',
                'Cat_name.max' => 'Chiều Dài Quá Giới Hạn Cho Phép',
                'Cat_image.required' => 'Hình Không Được Trống',
            ]
        );

        $o = new category;
        $o -> Cat_name = $request->Cat_name;
        $o -> Cat_parent = $request->Cat_parent;
        $o -> Cat_status = $request->Cat_status;
        $o -> Cat_image = $request->Cat_image;
        $o->save();
        
        return redirect('admin/category');
    }

    public function active($id)
    {
        $category = Category::find($id);
        
        if($category->Cat_status==1){
            $category->update(['Cat_status'=>'0']);
            return redirect('admin/category/')->with('Thông Báo','Đã Tắt' .$category->Cat_status.'Thành Công');
        }
        else{
            $category->update(['Cat_status'=>'1']);
            return redirect('admin/category/')->with('Thông Báo','Đã Mở' .$category->Cat_status.'Thành Công');
        }
    }

    public function edit(request $request ,$id)
    {
       if (Gate::allows('admin-category')) {
        return view('admin/category/edit_category', ['data'=> category::find($id)]);
    } else {
        return view('admin/404');
    } 
    }

    public function update(request $request)
    {
         $request -> validate(
            [
                'Cat_name' => 'required',
                'Cat_image' => 'required',
            ],
            [
                'Cat_name.required' => 'Tên Không Được Trống',
                'Cat_image.required' => 'Hình Không Được Trống',
            ]
        );

        $obj = category::find($request->Cat_id);
        $obj->Cat_name = $request->Cat_name;
        $obj->Cat_parent = $request->Cat_parent;
        $obj->Cat_status = $request->Cat_status;
        $obj->Cat_image = $request->Cat_image;
        $obj -> save();
        return redirect('admin/category/');
    }

    public function destroy(request $request)
    {
        $ojb = category::find($request->Cat_id); // tra ve 1 dong co khoa chinh la maloai
        $ojb->delete();
        return redirect('admin/category');
    }
}
