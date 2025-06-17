<?php
class authModel {
  public function __construct(){
    $this->db = new Database;
  }

  public function buscar_estados(){
		$this->db->query("SELECT * FROM estado_usuario");
		
		$result = $this->db->registers();
		return $result;
	}

  public function devolver_estado_por_nombre($nombre){
		$this->db->query("SELECT * FROM estado_usuario WHERE nombre_estado_usuario = :nombre_estado_usuario");
		
    $this->db->bind('nombre_estado_usuario', $nombre);
		$result = $this->db->register();
		return $result;
	}

  public function buscar_tipos(){
		$this->db->query("SELECT * FROM tipo_usuario");
		
		$result = $this->db->registers();
		return $result;
	}

  public function devolver_tipo_por_nombre($nombre){
		$this->db->query("SELECT * FROM tipo_usuario WHERE nombre_tipo_usuario = :nombre_tipo_usuario");
		
    $this->db->bind('nombre_tipo_usuario', $nombre);
		$result = $this->db->register();
		return $result;
	}


	//iner join para convertir el  1 o 2 de estado y tipo a su nombre correspondiente
 public function buscar_usuarios() {
  $this->db->query("SELECT u.*, t.nombre_tipo_usuario, e.nombre_estado_usuario
    FROM usuario u
    INNER JOIN tipo_usuario t ON u.tipo_usuario_id = t.id_tipo_usuario
    INNER JOIN estado_usuario e ON u.estado_usuario_id = e.id_estado_usuario");

  return $this->db->registers();
}
  public function crear_usuario($data){
		
		$keyw = "keyword";
		$this->db->query("INSERT INTO usuario
      (nombre_usuario, apellido_usuario, DNI_usuario, pass_usuario, email_usuario , avatar_usuario, tipo_usuario_id, estado_usuario_id) 
			VALUES( 
			:nombre_usuario, :apellido_usuario, :DNI_usuario, aes_encrypt(:pass_usuario, :keyword), :email_usuario, :avatar_usuario, :tipo_usuario_id, :estado_usuario_id)");
    $this->db->bind('nombre_usuario', $data['nombre_usuario']);
    $this->db->bind('apellido_usuario', $data['apellido_usuario']);
    $this->db->bind('DNI_usuario', $data['DNI_usuario']);                  
		$this->db->bind('email_usuario', $data['email_usuario']);
    $this->db->bind('avatar_usuario', $data['avatar_usuario']);
    $this->db->bind('tipo_usuario_id', $data['tipo_usuario_id']);
    $this->db->bind('estado_usuario_id', $data['estado_usuario_id']);
		$this->db->bind('pass_usuario', $data['pass_usuario']);
    $this->db->bind('keyword', $keyw);
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

    	/* Método para buscar el mail y la contraseña para comprobar si existe y poder loguear*/

	public function buscar_por_mail($data){
		$this->db->query("SELECT u.id_usuario, u.nombre_usuario, u.apellido_usuario, u.DNI_usuario, u.email_usuario, u.avatar_usuario, aes_decrypt(u.pass_usuario, 'keyword') AS pass,
      eu.nombre_estado_usuario, tp.nombre_tipo_usuario
			FROM usuario u
        INNER JOIN estado_usuario eu ON u.estado_usuario_id = eu.id_estado_usuario
        INNER JOIN tipo_usuario tp ON u.tipo_usuario_id = tp.id_tipo_usuario
				  WHERE u.email_usuario =:email_usuario
					  AND eu.nombre_estado_usuario = 'Activo'");
		$this->db->bind('email_usuario', $data['email_usuario']);
		
		$result = $this->db->register();
		return $result;
	}

  public function buscar_por_estado($data){
		$this->db->query("SELECT u.id_usuario, u.nombre_usuario, u.apellido_usuario, u.DNI_usuario, u.email_usuario, u.avatar_usuario, u.aes_decrypt(pass_usuario, 'keyword') AS pass,
      eu.nombre_estado_usuario, tp.nombre_tipo_usuario
			FROM usuario u
        INNER JOIN estado_usuario ue ON u.estado_usuario_id = eu.id_estado_usuario
        INNER JOIN tipo_usuario tp ON u.tipo_usuario_id = tp.id_tipo_usuario
				  WHERE u.estado_usuario_id =:estado_usuario_id");
		$this->db->bind('estado_usuario_id', $data['estado_usuario_id']);
		
		$result = $this->db->register();
		return $result;
	}

  public function buscar_por_tipo($data){
		$this->db->query("SELECT u.id_usuario, u.nombre_usuario, u.apellido_usuario, u.DNI_usuario, u.email_usuario, u.avatar_usuario, u.aes_decrypt(pass_usuario, 'keyword') AS pass,
      eu.nombre_estado_usuario, tp.nombre_tipo_usuario
			FROM usuario u
        INNER JOIN estado_usuario ue ON u.estado_usuario_id = eu.id_estado_usuario
        INNER JOIN tipo_usuario tp ON u.tipo_usuario_id = tp.id_tipo_usuario
				  WHERE u.tipo_usuario_id = :tipo_usuario_id");
		$this->db->bind('tipo_usuario_id', $data['tipo_usuario_id']);
		
		$result = $this->db->register();
		return $result;
	}

	public function change_pass($pass, $email){
		
		$keyw = 'keyword';
		$this->db->query("UPDATE usuario SET
			pass_usuario = aes_encrypt(:new_pass,:keyword)
        WHERE email_usuario=:email_usuario");
		$this->db->bind('new_pass', $pass);
		$this->db->bind('keyword', $keyw);
		$this->db->bind('email_usuario', $email);
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	



}
?>