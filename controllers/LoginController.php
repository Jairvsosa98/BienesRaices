<?php
namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController {
    public static function login(Router $router) {
        $errores = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Admin($_POST);
            $errores = $auth->validar();
            if(empty($errores)) {
                // Verificar si el usuario existe
                $resultado = $auth->existeUsuario();
                
                
                if(!$resultado) {
                    $errores = Admin::getErrores();
                }else {
                    // Verificar el password
                    $autenticado = $auth->comprobarPassword($resultado);

                    if($autenticado) {
                    // Autentificar al usuario
                        $auth->autenticar();    
                    } else {
                        $errores = Admin::getErrores();
                    } 
                }   
            }
        }

        $router->view('auth/login', [
            'errores' => $errores
        ]);
    }
    public static function logout(Router $router) {
        session_start();

        $_SESSION = [];
        
        header('Location: /');
    }
}