<?php
    class Pages extends BaseController{
         
        public function __construct(){
            
        }

        public function index(){
            
            $data = [
                "title" => "Bienvenido"
            ];
            $this->view('pages/index',$data);
        }

        /* Función para llamar a la vista info */
        public function Info(){

            $data = [
                "title" => "Información"
            ];
            $this->view('pages/info',$data);
            
        }

        public function infoPostGrado(){

            $data = ["title" => "Carreras de Post-Grado"];

            $this ->view('pages/infoPostGrado', $data);
        }

        
   }
   
?>