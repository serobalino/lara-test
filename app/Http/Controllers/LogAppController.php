<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogAppController extends Controller
{
    public function consultar($device){
        return response()->json(Log::where('origen',$device)->latest('creado_a')->paginate(100));
    }

    public function lista(){
        $aux = Log::distinct('origen')->get(['origen']);
        foreach ($aux as $item){
            $item->route = route('logdevice',$item->origen);
        }
        return response()->json($aux);
    }

    public function guardar(Request $request){
        $nuevo = new Log();
        $nuevo->origen = $request->origen;
        $nuevo->uri = $request->uri;
        $nuevo->codigo = $request->codigo;
        $nuevo->trama = @($request->trama);
        $nuevo->respuesta = @($request->respuesta);
        $nuevo->cabecera = @($request->cabecera);
        $nuevo->save();
        return route('logdevice',$nuevo->origen);
    }
}
