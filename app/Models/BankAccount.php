<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
