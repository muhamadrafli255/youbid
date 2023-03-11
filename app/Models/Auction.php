<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Lot()
    {
        return $this->belongsTo(Lot::class);
    }

    public static function getAuction($request)
    {
        $auction = Auction::select([
            'id',
            'lot_id',
            'status'
        ]);

        return $auction;
    }

    public function Ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
