<?php
require_once 'app/core/database.php';

class Profesor {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function obtenerTodos() {
        $sql = "SELECT * FROM profesores";
        return $this->db->query($sql)->fetchAll();
    }

    public function guardar($data) {
        $sql = "INSERT INTO profesores (nombre, apellido, dni, email, celular, foto_perfil)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['nombre'],
            $data['apellido'],
            $data['dni'],
            $data['email'],
            $data['celular'],
            $data['foto']
        ]);
    }
}
