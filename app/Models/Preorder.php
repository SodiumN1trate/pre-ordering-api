<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preorder extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_code',
        'status',
        'firstname',
        'lastname',
        'email',
        'remark',
        'status_id',

    ];

    public function products() {
        return $this->belongsToMany(Product::class,'preorder_product', 'preorder_id', 'product_id')
            ->withPivot([
                'symbol',
                'color',
                'size',
                'symbol_pos',
            ]);
    }
}
