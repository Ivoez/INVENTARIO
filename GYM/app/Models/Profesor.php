<?php
require_once __DIR__ . '/../core/database.php';

class Profesor {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function obtenerTodos() {
        $this->db->query("SELECT * FROM profesores");
        return $this->db->registers();
    }

    public function guardar($data) {
        $this->db->query("INSERT INTO profesores (nombre, apellido, dni, email, celular, foto_perfil)
                          VALUES (:nombre, :apellido, :dni, :email, :celular, :foto)");
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':apellido', $data['apellido']);
        $this->db->bind(':dni', $data['dni']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':celular', $data['celular']);
        $this->db->bind(':foto', $data['foto']);
        return $this->db->execute();
    }

    public function existeDni($dni) {
        $this->db->query("SELECT id FROM profesores WHERE dni = :dni");
        $this->db->bind(':dni', $dni);
        return $this->db->register() !== false;
    }
}
