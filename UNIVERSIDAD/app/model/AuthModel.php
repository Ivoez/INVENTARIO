<?php
class AuthModel{
    public function __construct(){
        $this->db = new Database;
    }

    public function crearUsuario($data)
	{
		//para hashear la contraseña
		$hash = password_hash($data['ContraUsuario'], PASSWORD_DEFAULT);
		$activo = 1;
		$this->db->query("INSERT INTO usuario
                          (NombreUsuario, ContraUsuario, Nombre, Apellido, DNI, Email, tipoUsuario, telefono, fotoDePerfil ,activo) 
						  VALUES 
						  (:NombreUsuario, :ContraUsuario, :Nombre, :Apellido, :DNI, :Email, :tipoUsuario, :telefono, :fotoDePerfil , :activo)");
        $this->db->bind('NombreUsuario', $data['NombreUsuario']);
        $this->db->bind('ContraUsuario', $hash);
        $this->db->bind('Nombre', $data['Nombre']);                  
		$this->db->bind('Apellido', $data['Apellido']);
		$this->db->bind('DNI', $data['DNI']);
		$this->db->bind('Email', $data['Email']);
		$this->db->bind('tipoUsuario', $data['tipoUsuario']);
		$this->db->bind('telefono', $data['telefono']);
		$this->db->bind('fotoDePerfil', $data['fotoDePerfil']);
        $this->db->bind('fotoDePerfil', $activo);

		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

    	/* Método para buscar el mail y la contraseña para comprobar si existe y poder loguear*/

	public function buscarPorMail($data)
	{

		$this->db->query("SELECT idUsuario, NombreUsuario, ContraUsuario ,Nombre, Apellido, DNI, Email, tipoUsuario, telefono, fotoDePerfil ,activo
							  FROM usuario
							  WHERE usuario.Email =:Email
							  AND activo = 1");
		$this->db->bind('Email', $data['Email']);
		
		$result = $this->db->register();
		return $result;
	}
	//Para mail_pass
	public function cambiarContaseña($pass, $email)
	{
		
		//$hashed_pass = password_hash($new_pass, PASSWORD_DEFAULT);
		$this->db->query("UPDATE usuario SET
								ContraUsuario = :pass)
							 WHERE Email=:mail");
		$this->db->bind('new_pass', $pass);
		$this->db->bind('mail', $email);
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	
}


?>