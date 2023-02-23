<?php

namespace App\Models;

use Generator;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PhpParser\Node\Stmt\TryCatch;
use Spatie\Permission\Traits\HasRoles;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Nonstandard\Uuid as NonstandardUuid;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function BankAccount()
    {
        return $this->belongsTo(BankAccount::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model){
            try {
                $model->uuid = NonstandardUuid::uuid4()->toString();
            } catch (UnsatisfiedDependencyException $e) {
                abort(500, $e->getMessage());
            }
        });
        }

        public function SubDistrict()
        {
            return $this->belongsTo(SubDistrict::class);
        }

        public static function getSocieties($request)
        {
            $societies = User::select(
                [
                    'id',
                    'uuid',
                    'image',
                    'nik',
                    'full_name',
                    'email',
                    'is_complete',
                ])->where('role_id', 3);
    
                return $societies;
        }
}
