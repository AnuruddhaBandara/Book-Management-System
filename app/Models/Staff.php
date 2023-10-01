<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Staff extends Model implements AuthenticatableContract
{
    use HasFactory, Notifiable, Authenticatable, HasRoles;
    protected $fillable = [
        'name',
        'email',
        'password',



    ];
}
