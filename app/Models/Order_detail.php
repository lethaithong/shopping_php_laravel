<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;

    protected $fillable = ['Order_id','Pro_name','image','Price','Pro_id','Quantity'];

    protected $table = 'order_detail';
    protected $primaryKey = 'order_detail_id';
    protected $keyType = 'int';

    public $encrementing = true;
    public $timestamps = false;

    function order(){
        return $this->belongsTo(Order::class, 'Order_id', 'Order_id');
    }

    function product(){
        return $this->hasMany(Product::class, 'Pro_id', 'Pro_id');
    }
}
