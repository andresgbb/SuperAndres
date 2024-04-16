<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
    ];
    public function products()
{
    return $this->belongsToMany(Product::class, 'providers_products');
}
}
