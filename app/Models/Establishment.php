<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Establishment extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'establishments';

    protected $fillable = [
        'description',
        'type',
        'zip_code',
        'street',
        'district',
        'number',
        'city',
        'state',
        'complement',
        'deleted_at',
    ];
}
