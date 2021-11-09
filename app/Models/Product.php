<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['brand_id', 'category_id', 'supplier_id', 'unit_id', 'product_name', 'product_code', 'product_price', 'status'];

    public function supplier()
    {
        return $this->hasOne(Supplier::class,'id','supplier_id');
    }

    public function purchase()
    {
        return $this->belongsTo(Purchase::class,'id');
    }
}
