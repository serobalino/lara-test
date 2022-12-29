<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $table = "logs";
    protected $connection = 'mysql2';
    public $incrementing = null;

    const CREATED_AT = 'creado_a';
    const UPDATED_AT = null;

    protected $casts            =       [
        "trama" => "object",
        "respuesta" => "object",
        "cabecera" => "object",
    ];
}
