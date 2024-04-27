<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    
    protected $fillable = ['Coupon_name','Coupon_code','Coupon_quntity','Coupon_condition', 'Coupon_number'];

    protected $table = 'coupon';
    protected $primaryKey = 'Coupon_id';
    protected $keyType = 'int';

    public $encrementing = true;
    public $timestamps = false;

    // public function product(){
    //     return $this->hasmany(Product::class, 'Cat_id','Cat_id');
    // }
}
