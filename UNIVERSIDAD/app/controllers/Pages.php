<?php
    class Pages extends BaseController{
         
        public function __construct(){
            
        }

        public function index(){
            
            $data = [
                "title" => "Bienvenidos al Campus de la Universidad mas picante del condado",
            ];
            $this->view('pages/index',$data);
        }

        
   }
   
?>