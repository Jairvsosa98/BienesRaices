<?php

namespace Controllers;

use Model\Vendedor;
use MVC\Router;

class VendedorController {
    public static function create(Router $router) {
        $vendedor = new Vendedor;

        $errores = Vendedor::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Crear una nueva instancia
            $vendedor = new Vendedor($_POST['vendedor']);
    
            // Validar que no haya campos vacíos
            $errores = $vendedor->validar();
    
            // No hay errores
            if(empty($errores)){
                $vendedor->guardar();
            }
        }

        $router->view('/vendedores/crear', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function update(Router $router) {
        $id = validarORedireccionar('/admin');
        $vendedor = Vendedor::find($id);
    
        // Arreglo con mensajes de errores
        $errores = Vendedor::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Asignar los valores
            $args = $_POST['vendedor'];
    
            // Sincroniazr objeto en memoria con lo que el usuario escribió
            $vendedor->sincronizar($args);
    
            // Validación
            $errores = $vendedor->validar();
    
            if(empty($errores)){
                $vendedor->guardar();
            }
        }
        $router->view('/vendedores/actualizar', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function delete() {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Validar ID
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if($id) {
    
                $tipo = $_POST['tipo'];
    
                if(validarTipoContenido($tipo)){
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();     
                } 
            }
        }
    }
}