<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory, Filterable;

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function modelFilter()
    {
        return $this->provideFilter(\App\ModelFilters\SizeFilter::class);
    }
}
