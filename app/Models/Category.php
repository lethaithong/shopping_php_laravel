<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = ['Cat_name','Cat_parent','Cat_status','created_at', 'updated_at','Cat_image'];

    protected $table = 'category';
    protected $primaryKey = 'Cat_id';
    protected $keyType = 'int';

    public $encrementing = true;
    public $timestamps = false;

    public function product(){
        return $this->hasmany(Product::class, 'Cat_id','Cat_id');
    }
}
//delete
