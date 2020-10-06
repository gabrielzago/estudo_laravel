<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    use HasFactory;

    protected $table = 'unidades';
    public $timestamps = true;

   /* protected $casts = [
        'valor_m2' => 'double'
    ];*/

    protected $fillable = [
        'nome_apartamento',
        'metragem',
        'empreendimento_id',
        'nome_torre',
        'andar',
    ];

    public function empreendimentos()
    {
        return $this->belongsTo('App\Models\Empreendimento','id');
    }
}
