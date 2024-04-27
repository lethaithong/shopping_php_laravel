<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['Pro_name','Cat_id','Pro_price','Pro_Image','Pro_des','Pro_status','created_at', 'updated_at','Pro_image'];

    protected $table = 'product';
    protected $primaryKey = 'Pro_id';
    protected $keyType = 'int';

    public $encrementing = true;
    public $timestamps = false;

    function category(){
        return $this->belongsTo(Category::class, 'Cat_id', 'Cat_id');
    }
}
