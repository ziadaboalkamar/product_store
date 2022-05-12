<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected  $table = 'invoices';
    protected $fillable = [
        'id','client_name','date_of_invoice','status','created_at','updated_at'
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];


    public function getActive(){
        return $this->status == 0 ? __(' فاتورة بيع ') : __('فاتورة شراء') ;
    }
}
