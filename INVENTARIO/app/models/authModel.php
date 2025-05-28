<?php
class AuthModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function crear_usuario($data) {
        // Llamar al procedimiento con parámetros OUT usando variables @resultado y @mensaje
        $this->db->query("CALL insert_usuario(:nombre, :pass, :email, :avatar, :tipo, :estado, @resultado, @mensaje)");

        $this->db->bind(':nombre', $data['nombre_usuario']);
        $this->db->bind(':pass', $data['pass_usuario']);
        $this->db->bind(':email', $data['email_usuario']);
        $this->db->bind(':avatar', $data['avatar_usuario']);
        $this->db->bind(':tipo', $data['tipo_usuario']);
        $this->db->bind(':estado', $data['estado_usuario']);

        $this->db->execute();

        // Obtener los valores OUT de la sesión de variables de MySQL
        $this->db->query("SELECT @resultado AS resultado_proceso, @mensaje AS mensaje_proceso");
        $this->db->execute();
        $res = $this->db->register();

        return $res; // Objeto con ->resultado_proceso y ->mensaje_proceso
    }
}
