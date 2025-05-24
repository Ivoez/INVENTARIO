<?php
require_once __DIR__ . '/../core/BaseController.php';
require_once __DIR__ . '/../models/Profesor.php';

class Profesores extends BaseController {
    public function index() {
        echo "Estoy en Profesores";
        exit;
    }
}
