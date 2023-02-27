<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function ItemModel()
    {
        return $this->belongsTo(ItemModel::class);
    }

    public function DetailItem()
    {
        return $this->belongsTo(DetailItem::class);
    }

    public function GradeItem()
    {
        return $this->belongsTo(GradeItem::class);
    }

    public static function getItems($request)
    {
        $items = Item::select([
            'id',
            'name',
            'item_model_id',
        ]);

        return $items;
    }

    public function ItemImage()
    {
        return $this->hasMany(ItemImage::class);
    }

    public function CreateBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
