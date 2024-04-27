<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['User_id','Coupon_id' , 'Full_name', 'Email', 'Phone' ,'Address','Status','Total','Total_coupon','HTTT','date_order'];

    protected $table = 'order';
    protected $primaryKey = 'Order_id';
    protected $keyType = 'int';

    public $encrementing = true;
    public $timestamps = false;

    function user(){
        return $this->belongsTo(User::class, 'User_id', 'User_id');
    }

    function order_detail(){
        return $this->hasMany(Order_detail::class, 'Order_id', 'Order_id');
    }

    function coupon(){
        return $this->belongsTo(Coupon::class, 'Coupon_id', 'Coupon_id');
    }
}
