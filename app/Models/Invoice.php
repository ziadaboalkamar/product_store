<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected  $table = 'invoices';
    protected $fillable = [
        'id','client_name','product_id','store_id','count', 'total','status','created_at','updated_at'
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
