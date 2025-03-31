<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    //Quan hệ 1 - n (bảng cha)
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
