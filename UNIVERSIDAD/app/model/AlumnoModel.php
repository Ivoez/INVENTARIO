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

    public function desinscribirseCarrera($idAlumno, $idCarrera) {
        $this->db->query("DELETE FROM inscripcioncarrera WHERE idAlumno = :idAlumno AND idCarrera = :idCarrera");
        $this->db->bind(':idAlumno', $idAlumno);
        $this->db->bind(':idCarrera', $idCarrera);
        return $this->db->execute();
    }

    // AlumnoModel.php
    public function yaInscripto($idAlumno, $idCarrera) {
        $this->db->query("SELECT * FROM inscripcioncarrera 
                      WHERE idAlumno = :idAlumno AND idCarrera = :idCarrera AND activo = 1");
        $this->db->bind(':idAlumno', $idAlumno);
        $this->db->bind(':idCarrera', $idCarrera);
        return $this->db->register() ? true : false;
}


    public function estaInscripto($idAlumno, $idCarrera) {
        $this->db->query("SELECT * FROM inscripcioncarrera WHERE idAlumno = :idAlumno AND idCarrera = :idCarrera AND activo = 1");
        $this->db->bind(':idAlumno', $idAlumno);
        $this->db->bind(':idCarrera', $idCarrera);
        return $this->db->register() ? true : false;
    }

    public function obtenerCarrerasInscripto($idAlumno, $tipoCarrera) {
        $this->db->query("SELECT DISTINCT c.* FROM carrera c
                          INNER JOIN inscripcioncarrera i ON c.idCarrera = i.idCarrera
                          WHERE i.idAlumno = :idAlumno AND c.tipoCarrera = :tipoCarrera AND i.activo = 1");
        $this->db->bind(':idAlumno', $idAlumno);
        $this->db->bind(':tipoCarrera', $tipoCarrera);
        return $this->db->registers();
    }
}
?>
