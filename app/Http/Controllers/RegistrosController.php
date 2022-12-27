<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Notifications\FirmaCreada;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class RegistrosController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Formulario',$request->user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validacion =   Validator::make($request->all(), [
            'nombre'    => 'required',
            'apellido'  => 'required',
            'celular'   => 'required',
            'email'     => 'required|email',
            'cargo'     => 'required|exists:cargos,id_ca',
        ]);
        if($validacion->fails()){
            $texto  =   '';
            foreach ($validacion->errors()->all() as $errores)
                $texto.=$errores.PHP_EOL;
            return response(['val'=>false,'message'=>$texto,'data'=>$validacion->errors()->all()],500);
        }else{
            $nuevo              =   new Registro();
            $nuevo->nombre_re   =   mb_convert_case($request->nombre, MB_CASE_TITLE, "UTF-8");
            $nuevo->apellido_re =   mb_convert_case($request->apellido, MB_CASE_TITLE, "UTF-8");
            $nuevo->celular_re  =   $request->celular;
            $nuevo->ext_re      =   $request["extención"];
            $nuevo->email_re    =   strtolower($request->email);
            $nuevo->skype_re    =   $request->skype;
            $nuevo->linkedin_re =   $request->linkedin;
            $nuevo->github_re   =   $request->github;
            $nuevo->id_ca       =   $request->cargo;
            $nuevo->save();
            $nuevo->notify(new FirmaCreada());
            return response(['val'=>true,'message'=>"Se ha enviado un email con las instrucciones",'data'=>route('generar.show',$nuevo->code_re)]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $codigo =   Crypt::decryptString($id);
        } catch (DecryptException $e) {
            $codigo =   0;
        }
        $firma  =   Registro::with('cargo.departamento.empresa')->find($codigo);
        if($firma)
            return view('firma',$firma);
        else
            return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
