<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empreendimento extends Model
{
    use HasFactory;

    protected $table = 'empreendimentos';
    public $timestamps = true;

    protected $fillable = [
        'nome',
        'cidade_id',
        'estado_id',
        'data_entrega',
        'valor_m2',
    ];

    public function estado(){
        return $this->belongsTo('App\Models\Estado');
    }

    public function cidade(){
        return $this->belongsTo('App\Models\Cidade');
    }

    public function unidades(){
        return $this->hasMany('App\Models\Unidade','id');
    }

}
