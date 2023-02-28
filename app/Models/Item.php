<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Item extends Model
{
    use HasFactory, AutoNumberTrait;

    protected $guarded = ['id'];

    public function getAutoNumberOptions()
    {
        return [
            'item_code' => [
                'format' => 'YOU-?', // autonumber format. '?' will be replaced with the generated number.
                'length' => 5 // The number of digits in an autonumber
            ]
        ];
    }

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

    public function Lot()
    {
        return $this->belongsTo(Lot::class);
    }
}
