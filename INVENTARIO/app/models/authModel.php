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

    // Buscar usuario por email (útil para validaciones y login)
    public function buscarPorEmail($email) {
        $this->db->query("SELECT * FROM usuario WHERE email_usuario = :email");
        $this->db->bind(':email', $email);
        return $this->db->single();
    }

    // Crear usuario usando procedimiento almacenado
    public function crear_usuario($data) {

        // contraseña esté hasheada
        $password_hashed = password_hash($data['pass_usuario'], PASSWORD_DEFAULT);

        $this->db->query("CALL insert_usuario(
            :nombre, :password, :email, :avatar, :tipo, :estado,
            @res, @msg
        )");

        $this->db->bind(':nombre', $data['nombre_usuario']);
        $this->db->bind(':password', $password_hashed);
        $this->db->bind(':email', $data['email_usuario']);
        $this->db->bind(':avatar', $data['avatar_usuario']);
        $this->db->bind(':tipo', $data['tipo_usuario']);
        $this->db->bind(':estado', $data['estado_usuario']);
        $this->db->execute();

        // Obtener resultado del procedimiento (opcional)
        ////$this->db->query("SELECT @res AS resultado_proceso, @msg AS mensaje_proceso");
        //RETORNAR MENSAJES HACER!!!!
    }
}
?>