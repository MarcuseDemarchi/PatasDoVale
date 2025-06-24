<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoacaoAnimal extends Model
{
    protected $table = 'tbdoacaoanimal';
    protected $primaryKey = 'doacodigo';
    public $timestamps = false;

    protected $fillable = [
        'pescodigo',
        'anicodigo',
        'doadata',
        'doaobservacao'
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'pescodigo', 'pescodigo');
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'anicodigo', 'anicodigo');
    }
}