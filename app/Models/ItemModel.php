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
}
