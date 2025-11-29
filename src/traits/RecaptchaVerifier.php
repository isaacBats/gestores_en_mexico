<?php
namespace Olive\traits;

trait RecaptchaVerifier
{
    /**
     * Verifica el token de reCAPTCHA v3
     * @param string $token Token del captcha
     * @return bool|float Retorna el score si es válido, false si no
     */
    public function verifyRecaptcha($token)
    {
        // Validar que el token no esté vacío
        if (empty($token)) {
            return false;
        }

        // Obtener la clave secreta de las variables de entorno
        $secretKey = getenv('RECAPTCHA_SECRET_KEY');
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        
        // Preparar los datos para la verificación
        $data = [
            'secret' => $secretKey,
            'response' => $token,
            'remoteip' => $_SERVER['REMOTE_ADDR']
        ];

        // Configurar opciones para la solicitud HTTP
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];

        // Crear contexto y realizar la solicitud
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $result = json_decode($response);

        // Retornar el score si la verificación fue exitosa
        if ($result && $result->success) {
            return $result->score; // Score entre 0.0 y 1.0
        }

        return false;
    }
}