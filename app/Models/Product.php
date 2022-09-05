<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public static function getAll(Request $request): \Illuminate\Support\Collection
    {
        $request->whenHas('category', function () use ($request) {
            $sql = DB::table('products')
                ->where('category_id', '=', 1)
                ->toSql();

            dd($sql);
            dd($request->query('category'));
//            return

        });

        return DB::table('products')
            ->select('id', 'name', 'desc', 'brand', 'price', 'image_big', 'image_small', 'catalogue_number')
            ->get();
    }
}
