<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function firstName(): Attribute
    {
        $names = explode(" ", $this->name);

        return new Attribute(fn () => $names[0]);
    }

    protected function lastName(): Attribute
    {
        $names = explode(" ", $this->name);

        return new Attribute(fn () => $names[1]);
    }
}
