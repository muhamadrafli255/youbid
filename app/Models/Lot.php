<?php

namespace App\Models;

use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lot extends Model
{
    use HasFactory, AutoNumberTrait;

    protected $guarded = ['id'];

    protected $date = [
        'opened_date',
        'closed_date',
        'created_at',
        'updated_at'
    ];

    public function getAutoNumberOptions()
    {
        return [
            'name' => [
                'format' => 'LOT - ?', // autonumber format. '?' will be replaced with the generated number.
                'length' => 2 // The number of digits in an autonumber
            ]
        ];
    }

    public function Item()
    {
        return $this->belongsTo(Item::class);
    }

    public static function getLots($request)
    {
        $lots = Lot::select([
            'id',
            'name',
            'opened_date',
            'closed_date',
            'location'
        ]);

        return $lots;
    }
}
