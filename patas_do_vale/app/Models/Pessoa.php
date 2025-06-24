<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $table = 'tbpessoa';
    protected $primaryKey = 'pescodigo';

    protected $fillable = [
        'pesnome',
        'pesdatanascimento',
        'cidcodigo',
    ];

    public $timestamps = false;

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'cidcodigo');
    }
}
