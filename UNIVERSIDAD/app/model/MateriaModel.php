<?php
class MateriaModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    //Metodo para crear una nueva materia
    public function crearMateria($nombre) {
        $this->db->query("INSERT INTO materia (nombreMateria, activo) VALUES (:nombre, 1)");
        $this->db->bind(':nombre', $nombre);
        if ($this->db->execute()) {
            // Obtener el último ID insertado con PDO directamente:
            return $this->db->lastInsertId();
        }
        return false;
    }

    //metodo para obtener todas las materias
    public function obtenerTodasLasMaterias() {
    $this->db->query("SELECT * FROM materia WHERE activo = 1 ORDER BY nombreMateria");
    return $this->db->registers(); // registers() debe devolver array, no NULL
    }

    //metodo para saber si una materia existe 
    public function existeMateria($nombre) {
        $this->db->query("SELECT COUNT(*) as total FROM materia WHERE nombreMateria = :nombre AND activo = 1");
        $this->db->bind(':nombre', $nombre);
        $resultado = $this->db->register(); // Un solo resultado
    
        return $resultado && $resultado->total > 0;
    }
    

}
