<?php
class Usuario {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    
    public function registrar($datos) {
        $this->db->query("INSERT INTO socios (nombre, apellido, dni, email, celular, password) 
                          VALUES (:nombre, :apellido, :dni, :email, :celular, :password)");

        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':apellido', $datos['apellido']);
        $this->db->bind(':dni', $datos['dni']);
        $this->db->bind(':email', $datos['email']);
        $this->db->bind(':celular', $datos['celular']);
        $this->db->bind(':password', $datos['password']); 

        return $this->db->execute();
    }

   
    public function obtenerUsuarioPorEmail($email) {
        $this->db->query("SELECT * FROM socios WHERE email = :email");
        $this->db->bind(':email', $email);
        return $this->db->register();
    }

    public function obtenerUsuarioPorDni($dni) {
        $this->db->query("SELECT * FROM socios WHERE dni = :dni");
        $this->db->bind(':dni', $dni);
        return $this->db->register();
    }

    public function login($email, $password) {
        $usuario = $this->obtenerUsuarioPorEmail($email);

        if ($usuario && password_verify($password, $usuario->password)) {
            return $usuario;
        }

        return false;
    }

    public function actualizarPassword($email, $nuevaPasswordHash) {
        $this->db->query("UPDATE socios SET password = :password WHERE email = :email");
        $this->db->bind(':password', $nuevaPasswordHash);
        $this->db->bind(':email', $email);
        return $this->db->execute();
    }
}
?>
