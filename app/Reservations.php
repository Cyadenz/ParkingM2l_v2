<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    protected $fillable = [
        'debutperiode', 'finperiode', 'id_users', 'id_place',
    ];
}
