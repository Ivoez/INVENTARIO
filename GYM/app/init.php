<?php
  // se cargan las librerías
  require_once 'config/config.php';
  require_once 'core/database.php';
  require_once 'core/baseController.php';
  require_once 'models/Usuarios.php';
  require_once 'controllers/AuthController.php';




  // autoload php

 spl_autoload_register(function($className){
    $paths = ['core', 'controllers', 'models'];

    foreach ($paths as $path) {
        $file = '../app/' . $path . '/' . $className . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
  
?>