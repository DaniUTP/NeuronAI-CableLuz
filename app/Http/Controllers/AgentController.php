<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\NeuronService;
use Illuminate\Support\Facades\Log;

class AgentController extends Controller
{
     protected $neuronService;

    public function __construct(NeuronService $neuronService)
    {
        $this->neuronService = $neuronService;
    }

     public function askQuestion(Request $request)
    {
        // Validar que viene la pregunta
        $request->validate([
            'question' => 'required|string|min:3'
        ]);

        try {
            $question = $request->question;
            $answer = $this->neuronService->askAboutCableLuz($question);
            
            // Opcional: Registrar la interacción
            Log::info("Pregunta sobre CableLuz", [
                'question' => $question,
                'answer' => $answer
            ]);

            return response()->json([
                'success' => true,
                'question' => $question,
                'answer' => $answer,
                'timestamp' => now()->toDateTimeString()
            ]);

        } catch (\RuntimeException $e) {
            Log::error("Error en CableLuzAssistant: ".$e->getMessage());
            return response()->json([
                'success' => false,
                'error' => 'Error al procesar la pregunta',
                'message' => $e->getMessage()
            ], 500);
            
        } catch (\Exception $e) {
            Log::error("Error inesperado: ".$e->getMessage());
            return response()->json([
                'success' => false,
                'error' => 'Error inesperado',
                'message' => 'Ocurrió un error al procesar tu solicitud'
            ], 500);
        }
    }
}