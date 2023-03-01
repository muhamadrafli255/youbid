<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiplePrice extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function getMultiplePrice($request)
    {
        $price = MultiplePrice::select([
            'id',
            'category_id',
            'price'
        ]);

        return $price;
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
