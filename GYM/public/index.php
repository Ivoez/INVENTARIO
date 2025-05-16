<?php
   // se carga el inicializador de la carpeta app
   require_once "../app/init.php";
   ini_set('display_errors', 1);
   error_reporting(E_ALL);

   // instanciamos el objeto que trabajará con las rutas
   $initRoutes = new Routes; //no usa los parentesis ya que le remite a los métodos y por buenas prácticas instncia los objetos así
?>