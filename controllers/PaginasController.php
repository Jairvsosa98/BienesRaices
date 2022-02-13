<?php 

namespace Controllers;

use Model\Propiedad;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class PaginasController {
    public static function index(Router $router) {

    $propiedades = Propiedad::get(3);
    $inicio = true;
    $router->view('paginas/index', [
        'propiedades' => $propiedades,
        'inicio' => true
    ]);
    }
    public static function nosotros(Router $router) {
        $router->view('paginas/nosotros');
    }
    public static function propiedades(Router $router) {
    $propiedades = Propiedad::all();
    $router->view('paginas/propiedades', [
        'propiedades' => $propiedades
    ]);
    }
    public static function propiedad(Router $router) {
        $id = validarORedireccionar('/propiedades');
        $propiedad = Propiedad::find($id);
        $router->view('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }
    public static function blog(Router $router) {
        $router->view('paginas/blog');
    }
    public static function entrada(Router $router) {
        $router->view('paginas/entrada');
    }
    public static function contacto(Router $router) {

        $mensaje = null;
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $respuestas = $_POST['contacto'];

          // Crear una instancia de PHPMailer
          $mail = new PHPMailer();

          // Configurar SMTP
          $mail->isSMTP();
          $mail->Host = 'smtp.mailtrap.io';
          $mail->SMTPAuth = true;
          $mail->Username = 'a939159c5a310c';
          $mail->Password = '74d4bb3e4dd5ab';
          $mail->SMTPSecure = 'tls';
          $mail->Port = 2525;

          // Configurar el contenido del mail
          $mail->setFrom('admin@bienesraices.com');
          $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
          $mail->Subject = 'Tienes un Nuevo Mensaje';
          
          // Habilitar HTML
          $mail->isHTML(true);
          $mail->CharSet = 'UTF-8';

          // Definir el contenido
          $contenido = '<html>';
          $contenido .=' <p> Tienes un nuevo mensaje</p>';
          $contenido .=' <p>Nombre: '. $respuestas['nombre'] .'</p>';

          // Enviar de forma condicional algunos campos de email o telefono
            if($respuestas['contacto'] === 'telefono') {
                $contenido .= '<p>Eligió ser contactado por Teléfono</p>';
                $contenido .=' <p>Teléfono: '. $respuestas['telefono'] .'</p>';
                $contenido .=' <p>Fecha de contacto: '. $respuestas['fecha'] .'</p>';
                $contenido .=' <p>Hora de contacto: '. $respuestas['hora'] .'</p>';
            }else {
                // Es email., entonces agregamos el campo de email
                $contenido .= '<p> Eligió ser contactado por Email</p>';
                $contenido .=' <p>Email: '. $respuestas['email'] .'</p>';
            }
          $contenido .=' <p>Mensaje: '. $respuestas['mensaje'] .'</p>';
          $contenido .=' <p>Vende o Compra: '. $respuestas['tipo'] .'</p>';
          $contenido .=' <p>Precio o Presupuesto: $'. $respuestas['presupuesto'] .'</p>';
          $contenido .=' <p>Preferencia de contacto: '. $respuestas['contacto'] .'</p>';
          $contenido .= '</html>';

          $mail->Body = $contenido;
          $mail->AltBody = "Esto es contenido alternativo sin HTML";

          // Enviar el email
            if($mail->send()) {
                $mensaje = "Mensaje enviado Correctamente";
            }else {
                $mensaje = "El mensaje no se pudo enviar...";
            }
        
        }

        $router->view('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}
