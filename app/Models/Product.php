<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'type_id',
        'price',
    ];

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function preorders() {
        return $this->belongsToMany(Preorder::class,'preorder_product');
    }
}
