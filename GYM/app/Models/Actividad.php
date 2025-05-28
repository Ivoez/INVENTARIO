<?php
require_once __DIR__ . '/../core/database.php';

class Actividad {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function obtenerTodas() {
        $this->db->query("SELECT actividades.*, 
                             CONCAT(profesores.nombre, ' ', profesores.apellido) AS profesor_nombre,
                             profesores.foto_perfil
                      FROM actividades 
                      LEFT JOIN profesores ON actividades.profesor_id = profesores.id");
        return $this->db->registers();
    }



    public function guardar($data) {
        $this->db->query("INSERT INTO actividades (nombre, dia, hora, profesor_id)
                          VALUES (:nombre, :dia, :hora, :profesor_id)");
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':dia', $data['dia']);
        $this->db->bind(':hora', $data['hora']);
        $this->db->bind(':profesor_id', $data['profesor_id']);
        return $this->db->execute();
    }

    public function eliminar($id) {
        $this->db->query("DELETE FROM actividades WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
