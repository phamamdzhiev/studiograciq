<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public static function getAll(): \Illuminate\Support\Collection
    {
        return DB::table('products')->select('id', 'name', 'desc', 'brand', 'price', 'image_big', 'image_small', 'cat_number')->get();
    }
}
