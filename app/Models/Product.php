<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'description',
    ];
    public function providers()
{
    return $this->belongsToMany(Provider::class, 'providers_products');
}
}
