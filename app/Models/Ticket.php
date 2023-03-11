<?php

namespace App\Models;

use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory, AutoNumberTrait;

    protected $guarded = ['id'];

    public function getAutoNumberOptions()
    {
        return [
            'ticket_number' => [
                'format' => 'YOU-TK-12-?', // autonumber format. '?' will be replaced with the generated number.
                'length' => 3 // The number of digits in an autonumber
            ]
        ];
    }

    public function Auction()
    {
        return $this->hasMany(Auction::class);    
    }
}
