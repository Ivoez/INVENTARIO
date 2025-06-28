<?php
class movimientoStockModel {
  private $db;

  public function __construct() {
    $this->db = new Database();
  }

  public function insertarMovimiento($producto_id, $usuario_id, $fecha, $tipo, $cantidad) {
    $cantidad_real = ($tipo === 'salida') ? -abs($cantidad) : abs($cantidad);

   
    $this->db->query("INSERT INTO movimiento_stock (fecha_movimiento, producto_id, cantidad, usuario_responsable_id, created_at, updated_at)
                      VALUES (:fecha, :producto_id, :cantidad, :usuario_id, NOW(), NOW())");

    $this->db->bind(':fecha', $fecha);
    $this->db->bind(':producto_id', $producto_id);
    $this->db->bind(':cantidad', $cantidad_real);
    $this->db->bind(':usuario_id', $usuario_id);
    $this->db->execute();
	
    $this->db->query("UPDATE producto SET cantidad_stock_producto = cantidad_stock_producto + :cantidad WHERE id_producto = :id");
    $this->db->bind(':cantidad', $cantidad_real);
    $this->db->bind(':id', $producto_id);
    $this->db->execute();

			return true;
		
  }

  public function listarMovimientos() {
    if ($this->contarMovimientos() >= 1){

       $this->db->query("SELECT ms.*, p.nombre_producto, p.codigo_producto, u.nombre_usuario, u.apellido_usuario
       FROM movimiento_stock ms
       INNER JOIN producto p ON ms.producto_id = p.id_producto
       INNER JOIN usuario u ON ms.usuario_responsable_id = u.id_usuario
       ORDER BY ms.fecha_movimiento DESC
       ");
            
       return $this->db->registers();

    }
    else{
      echo "No hay movimientos registrados.";
    }
   
  }
    


    public function contarMovimientos()
	{
		$this->db->query("SELECT COUNT(*) as total FROM movimiento_stock");
		return $this->db->register()->total;
	}
    

    
    /*
    
    $producto_id = null, $desde = null, $hasta = null) {
    $sql = "SELECT ms.*, p.nombre_producto, p.codigo_producto, u.nombre_usuario, u.apellido_usuario
            FROM movimiento_stock ms
            JOIN producto p ON ms.producto_id = p.id_producto
            JOIN usuario u ON ms.usuario_responsable_id = u.id_usuario
            WHERE 1=1";

    if (!empty($producto_id)) {
      $sql .= " AND ms.producto_id = :producto_id";
    }
    if (!empty($desde)) {
      $sql .= " AND ms.fecha_movimiento >= :desde";
    }
    if (!empty($hasta)) {
      $sql .= " AND ms.fecha_movimiento <= :hasta";
    }

    $sql .= " ORDER BY ms.fecha_movimiento DESC";

    $this->db->query($sql);

    if (!empty($producto_id)) $this->db->bind(':producto_id', $producto_id);
    if (!empty($desde)) $this->db->bind(':desde', $desde);
    if (!empty($hasta)) $this->db->bind(':hasta', $hasta);

    return $this->db->registers();
  }
    */
  
}