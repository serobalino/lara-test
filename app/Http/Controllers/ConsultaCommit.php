<?php

namespace App\Http\Controllers;

use App\Models\App;
use App\Models\Commit;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Inertia\Inertia;
use Unirest\Request as Consulta;

class ConsultaCommit extends Controller
{
    function serialziacion($app,$commit=null){
        $aplicacion = App::where("nombre_app",$app)->first();
        if($aplicacion){
            if($commit===null)
                $commits=$aplicacion->commits;
            else
                $commits=$aplicacion->commits()->where('id_co', $commit)->get();
        }
        return response(@$commits,@$commits?200:500);
    }

    function vista($app,$commit=null){
        $aplicacion = App::where("nombre_app",$app)->first();
        if($aplicacion){
            if($commit===null)
                $commits=$aplicacion->commits;
            else
                $commits=$aplicacion->commits()->where('id_co', $commit)->get();
            return Inertia::render("Aplicacion",["app"=>$aplicacion,"commits"=>$commits]);
        }else{
            return abort(404);
        }
    }

    function descargaGH($url=null){
        if($url){
            try {
                $decrypted = Crypt::decryptString($url);
            } catch (DecryptException $e) {
                $decrypted = null;
            }
            $response = Consulta::get($decrypted,
                [
                    "Authorization"     =>  "token  ".env("GITHUB_TOKEN")
                ]
            );
            return response()->stream(function () use ($response)  {
                $response->body;
            }, 200, $response->headers);
        }else{
            return abort(404);
        }
    }
}
