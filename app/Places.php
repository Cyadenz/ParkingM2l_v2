<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
	use Notifiable;

    protected $fillable = [
        'idplace', 'numplace', 'reserver',
    ];
}
