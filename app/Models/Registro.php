<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;

class Registro extends Model
{
    use HasFactory;

    use Notifiable;

    protected $primaryKey           =       "id_re";
    protected $table                =       "registros";

    protected $appends              =       ["code_re","celp_re","cell_re"];

    protected $hidden               =       ["id_re"];


    public function getCodeReAttribute(){
        return  Crypt::encryptString($this->attributes['id_re']);
    }

    public function getCelpReAttribute(){
        $nuevo  =   substr($this->attributes['celular_re'], 1);
        $nuevo  =   substr_replace($nuevo," ",3,0);
        $nuevo  =   substr_replace($nuevo," ",7,0);
        return "(593) ".$nuevo;
    }

    public function getCellReAttribute(){
        $nuevo  =   substr($this->attributes['celular_re'], 1);
        return "+593".$nuevo;
    }

    public function cargo(){
        return $this->hasOne(Cargo::class,"id_ca","id_ca");
    }

    public function routeNotificationForMail($notification){
        return $this->email_re;
    }

    public function preferredLocale(){
        return $this->locale;
    }
}
