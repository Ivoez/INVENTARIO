<?php
  // se cargan las librerías

 if (session_status() === PHP_SESSION_NONE) {    //permite que se puedan usar mensajes flash que no necesitan persistir
    session_start();
 }
  require_once 'config/config.php';

  //require_once "lib/Base.php";
  //require_once "lib/Controller.php";
  //require_once "lib/Core.php";

  // autoload php

  spl_autoload_register(function($className){
    require_once 'core/'.$className.'.php';
  });
  
?>