<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_detail;

class OrderController extends Controller
{
    

    public function get_order_ad()
    {
    
        $data = Order::orderByDesc('Order_id')->get();
        return view('admin/Order', ['data'=>$data]);

        // $userId = Auth::id();
        // $data = Order::where(['User_id'=>$userId])->get();
        // return view('user/order', ['data'=>$data]);
    }

    public function get_order_detail_ad($id)
    {
        $data = Order_detail::find($id);
        $data = Order_detail::where(['Order_id'=>$id])->get();

        $datas = Order::find($id);
        $datas = Order::where(['Order_id'=>$id])->first();
        
         return view('admin/Order_detail_ad', ['data'=>$data, 'datas'=>$datas]);
    }

    public function active_order($id)
    {
        //dd($id);
        $order = Order::find($id);
        
        if($order->Status==0){
            $order->update(['Status'=>'1']);
            return redirect('admin/Order/')->with('message','Đã Duyệt Đơn Hàng' .$order->Status);
        }
    }

}
