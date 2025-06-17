<?php 
   //Clase controlador principal
   // Se encarga de poder cargar los models y views

   class BaseController{

      //Cargar model

      public function model($model){
         //carga
         require_once '../app/models/'. $model.'.php';
         // instanciar el model
         return new $model();
      }
      // Cargar view 
    public function view($view, $data = []){
    if (file_exists('../app/views/' . $view . '.php')) {
        extract($data); // <-- convierte 'productos' => $productos en $productos
        require_once '../app/views/' . $view . '.php';
    } else {
        die("La vista no existe");
    }
}

   }
?>