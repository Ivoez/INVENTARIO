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

        
   }
   
?>