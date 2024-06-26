<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getAdmin()
    {
        return view('admin/index');
    }

    public function filter_by_date(request $request)
    {
        $data = $request->all();

        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $get = Order::whereBetween('date_order', [ $from_date, $to_date ])->orderBy('date_order','ASC')->get();
        
        foreach($get as $key => $val){
            $char_data[] = array(
                'date_order' => $val->date_order,
                'Total' => $val->Total,
            );
        }
        echo $data = json_encode($char_data);
    }

    public function change(request $request)
    {
        $data = $request->all();

        //$today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-y H:i:s');

        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dauthangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoithangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if($data['dashboard_value'] == '7ngayqua'){
            $get = Order::whereBetween('date_order', [ $sub7days, $now ])->orderBy('date_order','ASC')->get();
        }
        // elseif($data['dashboard_value'] == 'thangtruoc'){
        //     $get = Order::whereBetween('date_order', [ $dauthangtruoc, $cuoithangtruoc ])->orderBy('date_order','ASC')->get();
        // }
        elseif($data['dashboard_value'] == 'thangnay'){
            $get = Order::whereBetween('date_order', [$dauthangnay,$now])->orderBy('date_order','ASC')->get();
        }
        elseif($data['dashboard_value'] == '365ngayqua'){
            $get = Order::whereBetween('date_order', [$sub365days,$now])->orderBy('date_order','ASC')->get();
        }

        foreach($get as $key => $val){
            $char_data[] = array(
                'date_order' => $val->date_order,
                'Total' => $val->Total
            );
        }
        echo $data = json_encode($char_data);
    }

    public function refesh(request $request)
    {
        $data = $request->all();

        $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(30)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = Order::whereBetween('date_order', [ $sub30days, $now ])->orderBy('date_order','ASC')->get();
        
        foreach($get as $key => $val){
            $char_data[] = array(
                'date_order' => $val->date_order,
                'Total' => $val->Total,
            );
        }
        echo $data = json_encode($char_data);
    }
}
