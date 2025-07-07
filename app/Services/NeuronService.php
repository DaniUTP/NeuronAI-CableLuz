<?php
namespace App\Services;

use NeuronAI\Agent;
use NeuronAI\Providers\Gemini\Gemini;
use NeuronAI\SystemPrompt;
use NeuronAI\Providers\AIProviderInterface;
use NeuronAI\Tools\Tool;
use NeuronAI\Tools\ToolProperty;
use NeuronAI\Tools\PropertyType;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormConfirmation;
use App\Mail\ContactUserMail;
use Illuminate\Support\Facades\Storage;

class NeuronService extends Agent
{
    protected $cableLuzData;

    public function __construct()
    {
        $jsonPath = 'database/cableLuz.json';

        if (Storage::disk('public')->exists($jsonPath)) {
            $jsonContent = Storage::disk('public')->get($jsonPath);
            $this->cableLuzData = json_decode($jsonContent, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \RuntimeException('Error al decodificar el JSON: ' . json_last_error_msg());
            }
        } else {
            throw new \RuntimeException("El archivo JSON no existe en: storage/app/public/{$jsonPath}");
        }
    }

    protected function provider(): AIProviderInterface
    {
        return new Gemini(
            key: env('GEMINI_API_KEY'),
            model: 'gemini-2.0-flash',
        );
    }

    public function instructions(): string
    {
        $jsonContext = json_encode($this->cableLuzData, JSON_PRETTY_PRINT);

        return new SystemPrompt(
            background: [
                "Eres un asistente virtual especializado en CableLuz.",
                "Tienes acceso a toda la información sobre planes, precios y servicios en formato JSON. El JSON es: {$jsonContext}",
                "Debes responder exclusivamente sobre temas relacionados con CableLuz.",
                "Si el usuario desea adquirir un servicio o ser contactado, llama a la herramienta 'enviar_correo_contacto' pasando los datos que te brinde.",
                "Los datos requeridos son: nombre_completo (obligatorio), telefono (obligatorio), email (opcional), horario_atencion (opcional).",
                "NO inventes valores. Si un dato no fue proporcionado, colócalo como null.",
                "NO le insistas al usuario por los datos opcionales.",
            ]
        );
    }

    protected function tools(): array
    {
        return [
            Tool::make(
                'enviar_correo_contacto',
                'Envía un correo de contacto con los datos del cliente.'
            )
                ->addProperty(new ToolProperty('nombre_completo', PropertyType::STRING, 'Nombre completo del usuario', true))
                ->addProperty(new ToolProperty('telefono', PropertyType::STRING, 'Teléfono del usuario', true))
                ->addProperty(new ToolProperty('email', PropertyType::STRING, 'Correo electrónico del usuario', false))
                ->addProperty(new ToolProperty('horario_atencion', PropertyType::STRING, 'Horario de atención preferido', false))
                ->setCallable(function (string $nombre_completo, string $telefono, ?string $email = null, ?string $horario_atencion = null) {
                    $data = [
                        'nombre_completo' => $nombre_completo,
                        'telefono' => $telefono,
                        'email' => $email,
                        'horario_atencion' => $horario_atencion,
                    ];

                    // Enviar correo al administrador
                    try {
                        Mail::to('aldanagerardo24@gmail.com')->send(new ContactUserMail($data));
                    } catch (\Exception $e) {
                        Log::error('Error al enviar correo al administrador: ' . $e->getMessage());
                        return 'Error al enviar el correo al administrador.';
                    }

                    // Enviar correo al usuario (si hay email)
                    if (!empty($email)) {
                        try {
                            Mail::to($email)->send(new ContactFormConfirmation($data));
                        } catch (\Exception $e) {
                            Log::error('Error al enviar correo al usuario: ' . $e->getMessage());
                            return 'Correo enviado al administrador, pero falló al usuario.';
                        }
                    }

                    return 'Correo enviado exitosamente.';
                })
        ];
    }

    public function askAboutCableLuz(string $question): string
    {
        try {
            $response = $this->chat(new \NeuronAI\Chat\Messages\UserMessage($question));
            return $response->getContent();
        } catch (\Throwable $e) {
            Log::error('Error procesando pregunta con Gemini: ' . $e->getMessage());
            return 'Hubo un error procesando tu solicitud. Intenta nuevamente más tarde.';
        }
    }
}
