<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected  $table = 'stores';
    protected $fillable = [
        'id', 'name','status','created_at','updated_at'
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function getActive(){
        return $this->status == 0 ? __(' غير فعال ') : __('فعال') ;
    }

    public  function products(){
        return $this->hasMany(Product::class,'store_id','id');
    }
}
