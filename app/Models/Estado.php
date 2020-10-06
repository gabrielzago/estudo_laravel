<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $table = 'estados';
    public $timestamps = false;

    protected $fillable = [
        'nome',
    ];

    public function cidades()
    {
        return $this->hasMany('App\Models\Cidade');
    }

    public function empreendimentos()
    {
       return $this->belongsTo('App\Models\Empreendimento', 'id');
    }
}
