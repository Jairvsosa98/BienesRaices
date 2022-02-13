<?php 

require 'funciones.php';
require 'config/database.php';
require __DIR__. '/../vendor/autoload.php';

// Conectarse a la BD
$db = conectarDB();
$db->set_charset('utf8');

use Model\ActiveRecord;

ActiveRecord::setDB($db);

