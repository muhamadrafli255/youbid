<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function getBrandOnCategories($request)
    {
        $brand = Brand::select([
            'id',
            'name',
        ]);
        if(isset($request['categoryId'])){
            $brand->where('category_id', $request['categoryId']);
        }
        return $brand;
    }

    public static function getBrand($request)
    {
        $brand = Brand::select([
            'id',
            'name',
            'image'
        ]);

        return $brand;
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ItemModel()
    {
        return $this->hasMany(ItemModel::class);
    }
}
