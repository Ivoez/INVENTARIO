<?php

class categoriaModel {
  private $db;

  public function __construct() {
    $this->db = new Database();
  }

  public function buscar_categorias(){
    $this->db->query("SELECT * FROM categoria_producto");
		
		$result = $this->db->registers();
		return $result;
	}

 public function insertarCategoria($nombreCategoria) {
    $this->db->query("INSERT INTO categoria_producto (nombre_categoria_producto, created_at, updated_at) VALUES (:nombre, NOW(), NOW())");
    $this->db->bind(':nombre', $nombreCategoria);
    $this->db->execute();
    return $this->db->lastInsertId();
}
  
	public function obtenerCategorias() {
    $this->db->query("SELECT id_categoria_producto, nombre_categoria_producto FROM categoria_producto");
    return $this->db->registers();
}


}
?>