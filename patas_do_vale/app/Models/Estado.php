<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'tbestado';
    protected $primaryKey = 'estcodigo';
    public $timestamps = false;
}
