<?php

class movimientoStockModel {
  private $db;

  public function __construct() {
    $this->db = new Database();
  }

  public function crear_movimiento($data){
		
		$this->db->query("INSERT INTO movimiento_stock
      (fecha_movimiento, producto_id, cantidad, usuario_responsable_id) 
			VALUES 
			(:fecha_movimiento, :producto_id, :cantidad, :usuario_responsable_id)");
    $this->db->bind('fecha_movimiento', $data['fecha_movimiento']);
    $this->db->bind('producto_id', $data['producto_id']);
    $this->db->bind('cantidad', $data['cantidad']);                  
		$this->db->bind('usuario_responsable_id', $data['usuario_responsable_id']);

		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

}
?>