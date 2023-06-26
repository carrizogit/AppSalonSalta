<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {
    public $email;
    public $nombre;
    public $token;
    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {
        //crear objeto de emeial;
        $email = new PHPMailer();

        $email->isSMTP();
        $email->Host = 'sandbox.smtp.mailtrap.io';
        $email->SMTPAuth = true;
        $email->Port = 2525;
        $email->Username = '43971590d0e8a3';
        $email->Password = '5a69d50953c999';

        $email->setFrom('cuentas@appsalon.com');
        $email->addAddress('cuentas2@appsalon.com', 'appsalon.com.ar');
        $email->Subject = 'Confirma tu cuenta';

        $email->isHTML(TRUE);
        $email->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>" . $this->nombre . "</strong>Has creado tu cuenta en appsalon solo debes confirmarla haciendo click en el siguiente enlace</p>";
        $contenido .= "<p>Presiona aqui: <a href='http://localhost:3000/confirmar-cuenta?token=". $this->token . "'>Confirmar Cuenta</a> </p>";
        $contenido .= "<p>Si no fuiste tu desestima este mensaje</p>";
        $contenido .= "</html>";
        
        $email->Body = $contenido;
        $email->send();
    }

    public function enviarInstrucciones() {
        //crear objeto de emeial;
        $email = new PHPMailer();

        $email->isSMTP();
        $email->Host = 'sandbox.smtp.mailtrap.io';
        $email->SMTPAuth = true;
        $email->Port = 2525;
        $email->Username = '43971590d0e8a3';
        $email->Password = '5a69d50953c999';

        $email->setFrom('cuentas@appsalon.com');
        $email->addAddress('cuentas2@appsalon.com', 'appsalon.com.ar');
        $email->Subject = 'Restablecer tu contraseña';

        $email->isHTML(TRUE);
        $email->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>" . $this->nombre . "</strong>Has solicitado restablecer tu password</p>";
        $contenido .= "<p>Presiona aqui: <a href='http://localhost:3000/recuperar?token=". $this->token . "'>Recuperar Cuenta</a> </p>";
        $contenido .= "<p>Si no fuiste tu desestima este mensaje</p>";
        $contenido .= "</html>";

        $email->Body = $contenido;
        $email->send();
    }
}