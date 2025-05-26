<?php
class AlumnoModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function obtenerCarrerasDisponibles() {
        $this->db->query("SELECT * FROM carrera WHERE activo = 1");
        return $this->db->registers();
    }

    public function inscribirseCarrera($idAlumno, $idCarrera) {
        $this->db->query("INSERT INTO inscripcioncarrera (idAlumno, idCarrera) VALUES (:idAlumno, :idCarrera)");
        $this->db->bind(':idAlumno', $idAlumno);
        $this->db->bind(':idCarrera', $idCarrera);
        return $this->db->execute();
    }

    public function yaInscripto($idAlumno, $idCarrera) {
        $this->db->query("SELECT * FROM inscripcioncarrera WHERE idAlumno = :idAlumno AND idCarrera = :idCarrera AND activo = 1");
        $this->db->bind(':idAlumno', $idAlumno);
        $this->db->bind(':idCarrera', $idCarrera);
        return $this->db->register() ? true : false;
    }
}
?>
