<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    //
    protected $table = 'marcas';

    public function modelos(){
        return $this->hasMany('App\Modelos', 'id_marca');
    }
}
