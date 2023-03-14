<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function getLocation($request)
    {
        $locations = Location::select([
            'id',
            'name',
            'full_address',
        ]);

        return $locations;
    }

    public function Lot()
    {
        return $this->hasMany(Lot::class);
    }
}
