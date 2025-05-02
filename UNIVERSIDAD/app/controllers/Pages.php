<?php
class Pages extends BaseController {

    public function __construct() {
        // Constructor vacío por ahora
    }

    public function index() {
        $data = [
            "title" => "Bienvenido"
        ];
        $this->view('pages/index', $data);
    }

    /* Función para llamar a la vista info */
    public function Info() {
        $data = [
            "title" => "Información"
        ];
        $this->view('pages/info', $data);
    }

    // Función infoPostGrado combinada
    public function infoPostGrado() {
        $data = [
            "title" => "Carreras de Post-Grado",
            "page" => "infoPostGrado"
        ];
        $this->view('pages/infoPostGrado', $data);
    }

    // Función infoCarrerasDeGrado
    public function infoCarrerasDeGrado() {
        $data = [
            "title" => "Carreras de Grado",
            "page" => "infoCarrerasDeGrado"
        ];
        $this->view('pages/infoCarrerasDeGrado', $data);
    }
}
?>
