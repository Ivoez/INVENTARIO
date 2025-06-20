<?php
class proveedorModel {
  private $db;

  public function __construct(){
    $this->db = new Database;
  }

  public function buscar_estados(){
    $this->db->query("SELECT * FROM estado_proveedor");
		
		$result = $this->db->registers();
		return $result;
	}

  public function devolver_estado_por_nombre($nombre){
		$this->db->query("SELECT * FROM estado_proveedor WHERE nombre_estado_proveedor = :nombre_estado_proveedor");
		
    $this->db->bind('nombre_estado_proveedor', $nombre);
		$result = $this->db->register();
		return $result;
	}

  public function buscar_proveedores(){
    $this->db->query("SELECT * FROM proveedor");
		
		$result = $this->db->registers();
		return $result;
	}

  public function crear_proveedor($data){
		
		$this->db->query("INSERT INTO proveedor
      (razon_social_proveedor, CUIT_proveedor ,direccion_proveedor ,telefono_proveedor ,email_personal_proveedor ,estado_proveedor_id) 
			VALUES 
			(:razon_social_proveedor, :CUIT_proveedor, :direccion_proveedor, :telefono_proveedor, :email_personal_proveedor, :estado_proveedor_id)");
    $this->db->bind('razon_social_proveedor', $data['razon_social_proveedor']);
    $this->db->bind('CUIT_proveedor', $data['CUIT_proveedor']);
    $this->db->bind('direccion_proveedor', $data['direccion_proveedor']);                  
		$this->db->bind('telefono_proveedor', $data['telefono_proveedor']);
		$this->db->bind('email_personal_proveedor', $data['email_personal_proveedor']);
		$this->db->bind('estado_proveedor_id', $data['estado_proveedor_id']);

		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function buscar_por_mail($data){
		$this->db->query("SELECT p.id_proveedor, p.razon_social_proveedor, p.CUIT_proveedor, p.direccion_proveedor, p.telefono_proveedor, p.email_personal_proveedor,
      pe.nombre_estado_proveedor
			FROM proveedor p
        INNER JOIN estado_proveedor pe ON p.estado_proveedor_id = pe.id_estado_proveedor
				WHERE p.email_personal_proveedor = :email_proveedor
					AND pe.nombre_estado_proveedor = 'Activo'");
		$this->db->bind('email_proveedor', $data['email_personal_proveedor']);
		
		$result = $this->db->register();
		return $result;
	}

  public function buscar_por_estado($data){
		$this->db->query("SELECT p.id_proveedor, p.razon_social_proveedor, p.CUIT_proveedor, p.direccion_proveedor, p.telefono_proveedor, p.email_personal_proveedor,
      pe.nombre_estado_proveedor
			FROM proveedor p
        INNER JOIN estado_proveedor pe ON p.estado_proveedor_id = pe.id_estado_proveedor
				  WHERE p.estado_proveedor_id = :estado_proveedor_id");
		$this->db->bind('estado_proveedor_id', $data['estado_proveedor_id']);
		
		$result = $this->db->register();
		return $result;
	}

public function obtenerProveedores() { //modificado 18:18 20/6 traiga todos los proveedores 
    $this->db->query("SELECT * FROM proveedor");
    return $this->db->registers();
}
}