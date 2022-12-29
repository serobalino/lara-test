<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    use HasFactory;

    protected $primaryKey       =   "id_app";
    protected $connection = 'mysql2';

    public function commits(){
        return $this->hasMany(Commit::class,"app_co","nombre_app")->latest()->limit(20);
    }
}
