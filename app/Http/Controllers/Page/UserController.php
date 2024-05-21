<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
class UserController extends Controller
{
    public function index()
    {
        if (Gate::allows('user-role-1')) {
            $data = User::whereBetween('Level',[5,9])->get();
            return view('admin.user.vuser.show_user', ['data'=>$data]);
        } else {
            return view('admin/404');
        }
    }
    
    public function edit($User_id)
    {
        return view('admin/user/vuser/edit_user', ['data'=> user::find($User_id)]);
    }

    public function update(request $request)
    {
        $request -> validate(
            [
                'Username' => 'required|unique:user',
                'Password' => 'required',
                'Email' => 'required|email|unique:user',
                'Address' => 'required',
                'Phone' => 'required|unique:user',
                'Image' => 'required',
            ],
            [
                'Username.required' => 'Tên người dùng không được để trống',
                'Username.unique' => 'Tên người dùng đã bị trùng',
                'Email.required' => 'Email không được để trống',
                'Email.email' => 'Email không đúng định dạng',
                'Email.unique' => 'Email đã được sử dụng',
                'Address.required' => 'Địa chỉ không được để trống',
                'Phone.required' => 'SDT không được để trống',
                'Phone.unique' => 'SDT đã được sử dụng', 
            ]
        );  
       $obj = User::find($request->User_id);
       $obj->Username = $request->Username;
       $obj->Password = $request->Password;
       $obj->Email = $request->Email;
       $obj->Address = $request->Address;
       $obj->Phone = $request->Phone;
       $obj->Status = $request->Status;
       $obj->Level = $request->Level;
       $obj->save();
       return redirect('admin/user/vuser/');
    }

    public function active($id)
    {
        $user = User::find($id);
        if($user->Status==1){
            $user->update(['Status'=>'0']);
            return redirect('admin/user/vuser')->with('message','Đã mở trạng thái Thành Công');
        }
        else{
            $user->update(['Status'=>'1']);
            return redirect('admin/user/vuser')->with('message','Đã tắt trạng thái Thành Công');
        }
    }

    public function update_profile(request $request)
    {
        $request -> validate(
            [
                'Username' => 'required|unique:user',
                'Email' => 'required|email|unique:user',
                'Address' => 'required',
                'Phone' => 'required|unique:user',
            ],
            [
                'Username.required' => 'ten nguoi dung khong duoc de trong',
                'Username.unique' => 'ten nguoi dung da duoc su dung',
                'Password.required' => 'Password khong duoc de trong',
                'Email.required' => 'Email khong duoc de trong',
                'Email.email' => 'Email khong dung dinh dang',
                'Email.unique' => 'Email da duoc su dung',
                'Address.required' => 'Address khong duoc de trong',
                'Phone.required' => 'Phone khong duoc de trong',
                'Phone.unique' => 'Phone da duoc su dung',
                'Image.required' => 'hinh anh khong duoc de trong',
            ]
        );
        $obj = User::find($request->User_id);
        $obj->Username = $request->Username;
        $obj->Email = $request->Email;
        $obj->Image = $request->Image;
        $obj->Address = $request->Address;
        $obj->Phone = $request->Phone;
        $obj->save();
        return redirect()->route('update_profile')->with('success','cập nhật thành công');
    }

//-------------------------ADMIN--------------------------------------------

public function index_admin()
{
    if (Gate::allows('user-role-1')) {
        $data = User::whereBetween('Level',[0,4])->get();
        return view('admin.user.vadmin.show_admin', ['data'=>$data]);
    } else {
        return view('admin/404');
    }
}
public function create_admin()
{
    return view('admin.user.vadmin.add_admin');
}
public function store_admin(Request $request)
{
    $request -> validate(
        [
            'Username' => 'required|unique:user',
            'Password' => 'required',
            'Email' => 'required|email|unique:user',
            'Address' => 'required',
            'Phone' => 'required|unique:user',
        ],
        [
            'Username.required' => 'Tên người dùng không được để trống',
            'Username.unique' => 'Tên người dùng đã bị trùng',
            'Password.required' => 'Password không được để trống',
            'Email.required' => 'Email không được để trống',
            'Email.email' => 'Email không đúng định dạng',
            'Email.unique' => 'Email đã được sử dụng',
            'Address.required' => 'Địa chỉ không được để trống',
            'Phone.required' => 'SDT không được để trống',
            'Phone.unique' => 'SDT đã được sử dụng',
        ]
    );

    $user = new User();
    $user->Username = $request->Username;
    $user->Email = $request->Email;
    $user->Address = $request->Address;
    $user->Phone = $request->Phone;
    $user->Status = $request->Status;
    $user->Level = $request->Level;
    $user->Password = Hash::make($request->Password);
    $user->save();
    return redirect('admin/user/vadmin/');
}
public function destroy_admin(request $request)
{
    $ojb = User::find($request->User_id);
    $ojb->delete();
    return redirect('admin/user/vadmin/')->with('message','Xóa tài khoản thành công');
}
public function active_admin($id)
    {
        $user = User::find($id);
        if($user->Status==1){
            $user->update(['Status'=>'0']);
            return redirect('admin/user/vadmin')->with('message','Đã mở trạng thái Thành Công');
        }
        else{
            $user->update(['Status'=>'1']);
            return redirect('admin/user/vadmin')->with('message','Đã tắt trạng thái Thành Công');
        }
    }

    public function edit_admin($User_id)
    {
        return view('admin/user/vadmin/edit_admin', ['data'=> user::find($User_id)]);
    }

    public function edit_profile()
    {
        return view('admin/user/vadmin/edit_profile');
    }

    public function update_admin(request $request)
    {

        $request -> validate(
            [
                'Username' => 'required|unique:user',
                'Email' => 'required|email|unique:user',
                'Address' => 'required',
                'Phone' => 'required|unique:user',
            ],
            [
                'Username.required' => 'Tên người dùng không được để trống',
                'Username.unique' => 'Tên người dùng đã bị trùng',
                'Email.required' => 'Email không được để trống',
                'Email.email' => 'Email không đúng định dạng',
                'Email.unique' => 'Email đã được sử dụng',
                'Address.required' => 'Địa chỉ không được để trống',
                'Phone.required' => 'SDT không được để trống',
                'Phone.unique' => 'SDT đã được sử dụng', 
            ]
        );
        $obj = User::find($request->User_id);
        $obj->Username = $request->Username;
        $obj->Email = $request->Email;
        $obj->Address = $request->Address;
        $obj->Phone = $request->Phone;
        $obj->Status = $request->Status;
        $obj->Level = $request->Level;
        $obj->save();
        return redirect()->back()->with('message', 'Cập Nhật Quản Trị Viên Thành Công');
    }
    public function update_profile_ad(request $request)
    {
        $request -> validate(
            [
                'Username' => 'required',
                'Email' => 'required|email',
                'Address' => 'required',
                'Phone' => 'required',
            ],
            [
                'Username.required' => 'Tên người dùng không được để trống',
                'Email.required' => 'Email không được để trống',
                'Email.email' => 'Email không đúng định dạng',
                'Address.required' => 'Địa chỉ không được để trống',
                'Phone.required' => 'SDT không được để trống',
            ]
        );
        $obj = User::find($request->User_id);
        $obj->Username = $request->Username;
        $obj->Email = $request->Email;
        $obj->Address = $request->Address;
        $obj->Phone = $request->Phone;
        $obj->save();
        return redirect()->back()->with('message','cập nhật hồ sơ thành công');
    }
}
