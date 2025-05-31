<?php
class AuthModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Login: valida email y contraseña
    public function login($email, $password) {
        $this->db->query("SELECT * FROM usuario WHERE email_usuario = :email");
        $this->db->bind(':email', $email);
        $usuario = $this->db->single();

        if ($usuario && password_verify($password, $usuario->pass_usuario)) {
            return $usuario;
        } else {
            return false;
        }
    }

    // Buscar usuario por email
    public function buscarPorEmail($email) {
        $this->db->query("SELECT * FROM usuario WHERE email_usuario = :email");
        $this->db->bind(':email', $email);
        return $this->db->single();
    }

    // Crear usuario usando el procedimiento almacenado
    public function crear_usuario($data) {
        $this->db->query("CALL insert_usuario(
            :nombre, :password, :email, :avatar, :tipo, :estado,
            @res, @msg
        )");

        $this->db->bind(':nombre', $data['nombre_usuario']);
        $this->db->bind(':password', $data['pass_usuario']);
        $this->db->bind(':email', $data['email_usuario']);
        $this->db->bind(':avatar', $data['avatar_usuario']);
        $this->db->bind(':tipo', $data['tipo_usuario']);
        $this->db->bind(':estado', $data['estado_usuario']);
        $this->db->execute();

        // Recuperar el resultado del procedimiento
        $this->db->query("SELECT @res AS resultado_proceso, @msg AS mensaje_proceso");
        return $this->db->single();
    }
}