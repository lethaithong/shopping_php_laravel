<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

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
