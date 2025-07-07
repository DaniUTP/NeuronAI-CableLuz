<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmación de contacto</title>
</head>
<body>
    <h2>¡Gracias por contactarte con CableLuz!</h2>

    <p>Hemos recibido tu solicitud y uno de nuestros asesores se pondrá en contacto contigo lo antes posible.</p>

    <h3>Resumen de tus datos:</h3>
    <p><strong>Nombre completo:</strong> {{ $data['nombre_completo'] ?? 'No proporcionado' }}</p>
    <p><strong>Teléfono:</strong> {{ $data['telefono'] ?? 'No proporcionado' }}</p>
    <p><strong>Email:</strong> {{ $data['email'] ?? 'No proporcionado' }}</p>
    <p><strong>Horario de atención preferido:</strong> {{ $data['horario_atencion'] ?? 'No especificado' }}</p>

    <br>

    <p>Si esta información no es correcta, por favor responde a este correo o contáctanos directamente.</p>

    <p>Atentamente,<br>El equipo de atención al cliente de CableLuz.</p>
</body>
</html>
