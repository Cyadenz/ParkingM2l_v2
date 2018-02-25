<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
	use Notifiable;

    protected $fillable = [
        'debutperiode', 'finperiode', 'id_users', 'id_place',
    ];
}
