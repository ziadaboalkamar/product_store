<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected  $table = 'products';
    protected $fillable = [
        'id', 'name','store_id','count', 'price','status','created_at','updated_at'
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    public  function stores(){
        return $this->belongsTo(Store::class,'store_id','id');
    }


    public function getActive(){
        return $this->status == 0 ? __(' غير فعال ') : __('فعال') ;
    }
}
