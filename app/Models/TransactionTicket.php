<?php

namespace App\Models;

use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionTicket extends Model
{
    use HasFactory, AutoNumberTrait;

    protected $guarded = ['id'];

    public function getAutoNumberOptions()
    {
        return [
            'number' => [
                'format' => '2023/ID/03?', // autonumber format. '?' will be replaced with the generated number.
                'length' => 6 // The number of digits in an autonumber
            ]
        ];
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
