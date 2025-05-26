<?php
class MateriaDictadoModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    //Metodo para la Planificacion de las materias. vincula una materia a una carrera y a un profesor
    public function asignarMateriaACarrera($idMateria, $idCarrera, $idProfesor, $cuatrimestre, $turno, $diaCursada) {
        $this->db->query("INSERT INTO materiadictado (idMateria, idCarrera, idProfesor, cuatrimestre, turno, DiaCursada, activo)
            VALUES (:idMateria, :idCarrera, :idProfesor, :cuatrimestre, :turno, :diaCursada, 1)");

        $this->db->bind(':idMateria', $idMateria);
        $this->db->bind(':idCarrera', $idCarrera);
        $this->db->bind(':idProfesor', $idProfesor);
        $this->db->bind(':cuatrimestre', $cuatrimestre);
        $this->db->bind(':turno', $turno);
        $this->db->bind(':diaCursada', $diaCursada);

        return $this->db->execute();
    }
}
