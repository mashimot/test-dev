<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    //
    protected $table = 'modelos';

    public function marca(){
        return $this->belongsTo('App\Marca', 'id_marca');
    }
}
