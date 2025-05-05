<?php
class CarrerasModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
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
