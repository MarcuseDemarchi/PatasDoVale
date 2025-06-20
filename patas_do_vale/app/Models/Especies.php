<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especies extends Model
{
    protected $table = 'tbespecies';

    protected $primaryKey = 'espcodigo';

    public $timestamps = false;

    protected $fillable = [
        'espnome',
    ];
}