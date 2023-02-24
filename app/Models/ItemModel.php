<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemModel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function Item()
    {
        return $this->hasMany(Item::class);
    }

    public static function getModelsOnBrands($request)
    {
        $Models = ItemModel::select([
            'id',
            'name',
            'production_year',
        ]);
        if(isset($request['brandId'])){
            $Models->where('brand_id', $request['brandId']);
        }
        return $Models;
    }

    public static function getModels($request)
    {
        $Models =   ItemModel::select([
            'id',
            'name',
            'production_year',
        ]);

        return $Models;
    }
}
