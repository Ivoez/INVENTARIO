<?php
class CarrerasModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function agregarCarrera($nombreCarrera, $descripcion,$descripcionCompleta, $tipoCarrera, $imagen) {
    $this->db->query("INSERT INTO carrera (nombreCarrera, descripcionMuestra,descripcionCompletaSideBar, tipoCarrera, rutaImagenMuestra, activo)
                      VALUES (:nombreCarrera, :descripcion, :descripcionCompleta, :tipoCarrera, :imagen, 1)");
    
    $this->db->bind(':nombreCarrera', $nombreCarrera);
    $this->db->bind(':descripcion', $descripcion);
    $this->db->bind(':descripcionCompleta', $descripcionCompleta);
    $this->db->bind(':tipoCarrera', $tipoCarrera);
    $this->db->bind(':imagen', $imagen);

    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }
}

    public function obtenerCursos() {
        $this->db->query("SELECT * FROM carrera WHERE tipoCarrera = 'Curso' AND activo = 1");
        return $this->db->registers();
    }

    public function obtenerCarrerasDeGrado() {
        $this->db->query("SELECT * FROM carrera WHERE tipoCarrera = 'Grado' AND activo = 1");
        return $this->db->registers();
    }

    public function obtenerCarrerasDePostGrado() {
        $this->db->query("SELECT * FROM carrera WHERE tipoCarrera = 'PosGrado' AND activo = 1");
        return $this->db->registers();
    }
}
