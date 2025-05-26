<?php
class UsuarioModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    //Metodo para obtener todos profesores
    public function obtenerProfesores() {
        $this->db->query("SELECT * FROM usuario WHERE tipoUsuario = 'Profesor' AND activo = 1 ORDER BY Apellido, Nombre");
        return $this->db->registers();
    }
}
