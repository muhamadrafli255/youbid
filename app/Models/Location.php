<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Auction()
    {
        return $this->hasMany(Auction::class);
    }

    public static function getLocation($request)
    {
        $locations = Location::select([
            'id',
            'name',
            'full_address',
        ]);

        return $locations;
    }
}
