<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    protected $primaryKey           =       "id_ca";
    protected $table                =       "cargos";

    public function departamento(){
        return $this->hasOne(Departamento::class,"id_de","id_de");
    }
}
