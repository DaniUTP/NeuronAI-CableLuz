<?php

namespace App\Services;
use NeuronAI\Agent;
use NeuronAI\Providers\Gemini\Gemini;
use NeuronAI\SystemPrompt;
use Illuminate\Support\Facades\Storage;
use NeuronAI\Providers\AIProviderInterface;

class NeuronService extends Agent
{
    protected $cableLuzData;

    public function __construct()
    {
        // Ruta segura usando el sistema de archivos de Laravel
        $jsonPath = 'database/cableLuz.json';
        
        // Verificar existencia y leer el archivo
        if (Storage::disk('public')->exists($jsonPath)) {
            $jsonContent = Storage::disk('public')->get($jsonPath);
            $this->cableLuzData = json_decode($jsonContent, true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \RuntimeException('Error al decodificar el JSON: '.json_last_error_msg());
            }
        } else {
            throw new \RuntimeException("El archivo JSON no existe en: storage/app/public/{$jsonPath}");
        }
    }

   protected function provider(): AIProviderInterface
    {
        return new Gemini(
            key: 'AIzaSyCij5jTanDy5YyK69KIT3zDTKV6DFF36GE',
            model: 'gemini-2.0-flash',
        );
    }

    public function instructions(): string
    {
        // Pasamos el JSON completo como contexto
        $jsonContext = json_encode($this->cableLuzData, JSON_PRETTY_PRINT);

        return new SystemPrompt(
            background: [
                "Eres un asistente virtual especializado en CableLuz.",
                "Tienes acceso a toda la información sobre planes, precios y servicios en formato JSON. El JSON es".$jsonContext,
                "Debes responder exclusivamente sobre temas relacionados con CableLuz.",
                "Utiliza EXACTAMENTE la información proporcionada en el JSON."
            ],
            steps: [
                "Analiza la pregunta del usuario cuidadosamente.",
                "Consulta el JSON completo proporcionado para encontrar la información relevante.",
                "Responde usando SOLO los datos presentes en el JSON.",
                "Si la pregunta requiere comparaciones, organiza la información de manera clara.",
                "Para preguntas específicas, busca directamente en la estructura del JSON."
            ],
            output: [
                "Respuestas claras y basadas únicamente en los datos del JSON.",
                "Mantén las unidades y formatos originales (Mbps, PEN, etc.).",
                "No inventes información que no esté en el JSON.",
                "Si no hay datos para responder, indica que no tienes esa información."
            ]
        );
    }

    public function askAboutCableLuz(string $question): string
    {
         $message = $this->chat(new \NeuronAI\Chat\Messages\UserMessage($question));
    
    // Convertir el objeto Message a string
    return $message->getContent();
    }
}
