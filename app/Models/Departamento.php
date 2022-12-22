<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $primaryKey           =       "id_de";
    protected $table                =       "departamentos";

    public function empresa(){
        return $this->hasOne(Empresa::class,"id_em","id_em");
    }
}
