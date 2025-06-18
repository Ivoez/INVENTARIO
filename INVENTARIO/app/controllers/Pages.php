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

        /* FUNCION PARA IR AL DASHBOARD ADMIN */
        public function dashboardAdmin(){
            
            $data = [
                "title" => "Dashboard"
            ];
            $this->view('pages/dashboard/dashboard_admin',$data);
        }

        /* FUNCION PARA IR AL DASHBOARD EMPLEADO */
        public function dashboardEmpleado(){
            
            $data = [
                "title" => "Dashboard"
            ];
            $this->view('pages/dashboard/dashboard_empleado',$data);
        }

        


   }
   
?>