<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmación de Contacto - CableLuz</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333333;
            margin: 0;
            padding: 0;
            background-color: #f5f7fa;
        }
        
        .email-container {
            max-width: 640px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid #e1e5eb;
        }
        
        .header {
            background: linear-gradient(135deg, #1a1a1a 0%, #3a3a3a 100%);
            padding: 50px 20px;
            text-align: center;
            position: relative;
            border-bottom: 5px solid #FF6B00;
        }
        
        .header:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #FF6B00 0%, #FF9500 50%, #FF6B00 100%);
        }
        
        .logo {
            font-size: 42px;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: 1.5px;
            margin: 0;
            padding: 0;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        
        .logo-highlight {
            color: #FF6B00;
            position: relative;
            display: inline-block;
        }
        
        .logo-highlight:after {
            content: "";
            position: absolute;
            bottom: 2px;
            left: 0;
            width: 100%;
            height: 3px;
            background: #FF6B00;
            border-radius: 2px;
            transform: skewX(-15deg);
        }
        
        .tagline {
            color: rgba(255, 255, 255, 0.85);
            font-size: 16px;
            margin-top: 10px;
            letter-spacing: 0.5px;
            font-weight: 300;
        }
        
        .content {
            padding: 45px 40px;
        }
        
        .title {
            color: #1a1a1a;
            font-size: 26px;
            font-weight: 600;
            margin-top: 0;
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 15px;
        }
        
        .title:after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background: #FF6B00;
            border-radius: 3px;
        }
        
        .thank-you {
            font-size: 24px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 25px;
            text-align: center;
        }
        
        .confirmation-message {
            background: #ffffff;
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 35px;
            border: 1px solid #e1e5eb;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
            position: relative;
            overflow: hidden;
            border-left: 5px solid #4CAF50;
            font-size: 16px;
            line-height: 1.7;
            color: #555;
        }
        
        .confirmation-message:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(to bottom, #4CAF50, #8BC34A);
        }
        
        .data-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 35px;
            border: 1px solid #e1e5eb;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
            position: relative;
            overflow: hidden;
        }
        
        .data-card:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(to bottom, #FF6B00, #FF9500);
        }
        
        .info-row {
            display: flex;
            margin-bottom: 15px;
            align-items: flex-start;
        }
        
        .info-label {
            font-weight: 500;
            color: #666666;
            width: 150px;
            flex-shrink: 0;
            font-size: 15px;
        }
        
        .info-value {
            font-weight: 400;
            color: #1a1a1a;
            font-size: 15px;
            flex-grow: 1;
        }
        
        .footer {
            text-align: center;
            padding: 30px;
            background: #1a1a1a;
            color: #aaaaaa;
            font-size: 13px;
            border-top: 1px solid #333333;
        }
        
        .footer p {
            margin: 8px 0;
        }
        
        .footer a {
            color: #FF6B00;
            text-decoration: none;
            font-weight: 500;
        }
        
        .divider {
            height: 1px;
            background: linear-gradient(to right, transparent, #e0e0e0, transparent);
            margin: 35px 0;
        }
        
        .contact-info {
            margin-top: 25px;
            font-size: 15px;
            color: #555;
            text-align: center;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 8px;
            border-left: 4px solid #2196F3;
        }
        
        .contact-info strong {
            color: #1a1a1a;
            font-weight: 600;
        }
        
        .network-icons {
            display: flex;
            justify-content: center;
            margin: 25px 0;
            gap: 15px;
        }
        
        .network-icon {
            width: 40px;
            height: 40px;
            background: #f0f0f0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #FF6B00;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1 class="logo">Cable<span class="logo-highlight">Luz</span></h1>
            <div class="tagline">Conectando tu mundo con la mejor tecnología</div>
        </div>
        
        <div class="content">
            <div class="thank-you">¡Gracias por contactarnos!</div>
            
            <div class="confirmation-message">
                <p>Hemos recibido tu solicitud correctamente. Nuestro equipo se pondrá en contacto contigo a la brevedad posible según el horario que nos indicaste.</p>
                <p>Tu solicitud está siendo procesada y será atendida por uno de nuestros asesores especializados en servicios de internet y cable.</p>
            </div>
            
            <h2 class="title">Resumen de tu solicitud</h2>
            
            <div class="data-card">
                <div class="info-row">
                    <div class="info-label">Nombre completo:</div>
                    <div class="info-value">{{ $data['nombre_completo'] ?? 'No proporcionado' }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Teléfono:</div>
                    <div class="info-value">{{ $data['telefono'] ?? 'No proporcionado' }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Correo electrónico:</div>
                    <div class="info-value">{{ $data['email'] ?? 'No proporcionado' }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Horario preferido:</div>
                    <div class="info-value">{{ $data['horario_atencion'] ?? 'No especificado' }}</div>
                </div>
            </div>
            
            <div class="contact-info">
                <p><strong>¿Necesitas ayuda inmediata?</strong></p>
                <p>Puedes contactarnos directamente al:</p>
                <p>Teléfono: <strong>(555) 123-4567</strong></p>
                <p>Email: <strong><a href="mailto:contacto@cableluz.com">contacto@cableluz.com</a></strong></p>
                <p>Horario de atención: <strong>Lunes a Viernes de 8:00 am a 6:00 pm</strong></p>
            </div>
        </div>
        
        <div class="footer">
            <p>© 2025 CableLuz. Todos los derechos reservados.</p>
            <p>Este es un mensaje automático, por favor no responder directamente a este correo.</p>
            <p>Carrera 45 #12-34, Medellín, Colombia</p>
        </div>
    </div>
</body>
</html>