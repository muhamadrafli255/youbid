<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Brand()
    {
        return $this->hasMany(Brand::class);
    }

    public static function getCategories()
    {
        $categories = Category::select([
            'id',
            'name',
            'image'
        ]);
        return $categories;
    }

    public function MultiplePrice()
    {
        return $this->belongsTo(MultiplePrice::class);
    }

    public function TicketPrice()
    {
        return $this->hasMany(TicketPrice::class);
    }
}