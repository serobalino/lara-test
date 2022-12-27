<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use OpenAI;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Chat', $request->user());
    }

    public function store(Request $request)
    {
        $validacion = Validator::make($request->all(), [
            'pregunta' => 'required',
            'tipo' => 'boolean',
        ]);
        if ($validacion->fails()) {
            $texto = '';
            foreach ($validacion->errors()->all() as $errores)
                $texto .= $errores . PHP_EOL;
            return response(['val' => false, 'message' => $texto, 'data' => $validacion->errors()->all()], 401);
        } else {
            try {
                $client = OpenAI::client(env('OPEN_AI_ID'));
                if ($request->tipo) {
                    $result = $client->images()->create([
                        'prompt' => $request->pregunta,
                        'n' => 1,
                        'size' => '512x512',
                        'response_format' => 'url'
                    ]);
                } else {
                    $result = $client->completions()->create([
                        'model' => 'text-davinci-003',
                        'prompt' => $request->pregunta,
                        'temperature' => 0.7,
                        'max_tokens' => 256,
                        'top_p' => 1,
                        'frequency_penalty' => 0,
                        'presence_penalty' => 0,
                    ]);
                }
                return response()->json([
                    'status' => true,
                    'data' => $result
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'message' => $th->getMessage()
                ], 403);
            }
        }
    }
}
