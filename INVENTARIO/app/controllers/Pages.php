<?php
    class Pages extends BaseController{
         
        public function __construct(){
            
        }

        public function index(){
            
            $data = [
                "title" => "Bienvenidos a UNLZ - APPWEB"
            ];
            $this->view('pages/index',$data);
        }

        /* FUNCION PARA LUEGO REALIZAR LOS REGISTROS */
        public function login(){
            
            $data = [
                "title" => "Pagina login"
            ];
            $this->view('pages/Login',$data);
        }

        /* FUNCION PARA IR A INICIO */
        public function Inicio(){
            
            $data = [
                "title" => "Pagina inicio"
            ];
            $this->view('pages/inicio',$data);
        }




   }
   
?>