<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInvoice extends Model
{


    use HasFactory;
    protected  $table = 'project_invoice';
    protected $fillable = [
        'id','product_id','inovice_id','count', 'total','created_at','updated_at'
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    public  function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public  function Invoice(){
        return $this->belongsToMany(Invoice::class,'inovice_id','id');
    }
}
