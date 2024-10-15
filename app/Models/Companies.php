<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Companies extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'companies';

    protected $fillable = [
        'legal_name',
        'fantasy_name',
        'document',
        'email',
        'phone',
        'type',
        'id_owner',
        'deleted_at',
    ];
}
