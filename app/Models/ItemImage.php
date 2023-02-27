<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemImage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Item()
    {
        return $this->belongsTo(Item::class);
    }
}
