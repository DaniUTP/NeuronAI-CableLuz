<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva solicitud de contacto</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <h2 style="color: #2c3e50;">Nueva solicitud de contacto recibida</h2>

    <ul>
        <li><strong>Nombre completo:</strong> {{ $data['nombre_completo'] ?? 'No proporcionado' }}</li>
        <li><strong>Teléfono:</strong> {{ $data['telefono'] ?? 'No proporcionado' }}</li>
        <li><strong>Email:</strong> {{ $data['email'] ?? 'No proporcionado' }}</li>
        <li><strong>Horario de atención:</strong> {{ $data['horario_atencion'] ?? 'No especificado' }}</li>
    </ul>

    <p><strong>Nota:</strong> Por favor contactar al cliente lo antes posible.</p>
</body>
</html>
