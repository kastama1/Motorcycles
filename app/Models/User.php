<?php

namespace App\Models;

use Barryvdh\Debugbar\Facades\Debugbar as FacadesDebugbar;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    use HasFactory;

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
