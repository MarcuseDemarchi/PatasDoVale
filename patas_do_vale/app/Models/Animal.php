<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'tbanimais';

    protected $primaryKey = 'anicodigo';

    public $timestamps = false;

    protected $fillable = [
        'anipelido',
        'aniespecie',
        'anipeso',
        'aniporte',
    ];
}
