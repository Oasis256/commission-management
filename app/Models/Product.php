<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['brand_id', 'category_id', 'supplier_id', 'unit_id', 'product_name', 'product_code', 'product_price', 'status'];

    public function supplier()
    {
        return $this->hasOne(Supplier::class,'supplier_id','id');
    }

    public function Purchase()
    {
        return $this->belongsToMany(Purchase::class, 'product_id','id');
    }
}
