<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketPrice extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function getTicketPrice($request)
    {
        $ticket = TicketPrice::select([
            'id',
            'category_id',
            'price'
        ]);

        return $ticket;
    }
}
