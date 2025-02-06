<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Client;

class OpenAIController extends Controller
{
    public function generarRespuesta(Request $request)
    {
        // Asegúrate de que estás recibiendo la pregunta correctamente
        $pregunta = $request->input('pregunta');

        if (!$pregunta) {
            return response()->json(['error' => 'Pregunta no proporcionada'], 400);
        }

        // Crear cliente de OpenAI
        $client = Client::create(env('OPENAI_API_KEY'));

        try {
            // Realizar solicitud a la API de OpenAI
            $response = $client->chat()->create([
                'model' => 'gpt-3.5-turbo', // O usa 'gpt-4' si tienes acceso
                'messages' => [
                    ['role' => 'system', 'content' => 'Eres un asistente útil.'],
                    ['role' => 'user', 'content' => $pregunta],
                ],
            ]);

            // Devolver la respuesta
            return response()->json([
                'respuesta' => $response['choices'][0]['message']['content'],
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error en la API: ' . $e->getMessage()], 500);
        }
    }
}
