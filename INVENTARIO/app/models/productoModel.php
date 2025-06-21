<?php
class productoModel {
  private $db;

  public function __construct(){
    $this->db = new Database;
  }


  


  public function buscar_estados(){
		$this->db->query("SELECT * FROM estado_producto");
		
		$result = $this->db->registers();
		return $result;
	}

  public function devolver_estado_por_nombre($nombre){
		$this->db->query("SELECT * FROM estado_proveedor WHERE nombre_estado_proveedor = :nombre_estado_proveedor");
		
    $this->db->bind('nombre_estado_proveedor', $nombre);
		$result = $this->db->register();
		return $result;
	}

  public function buscar_productos(){
    $this->db->query("SELECT * FROM producto");
		
		$result = $this->db->registers();
		return $result;
	}

  public function crear_producto($data){
		
		$this->db->query("INSERT INTO producto
      (proveedor_id, categoria_producto_id ,codigo_producto ,nombre_producto ,cantidad_stock_producto ,precio_costo_producto ,estado_producto_id ) 
			VALUES 
			(:proveedor_id, :categoria_producto_id, :codigo_producto, :nombre_producto, :cantidad_stock_producto, :precio_costo_producto, :estado_producto_id)");
    $this->db->bind('proveedor_id', $data['proveedor_id']);
    $this->db->bind('categoria_producto_id', $data['categoria_producto_id']);
    $this->db->bind('codigo_producto', $data['codigo_producto']);                  
		$this->db->bind('nombre_producto', $data['nombre_producto']);
		$this->db->bind('cantidad_stock_producto', $data['cantidad_stock_producto']);
		$this->db->bind('precio_costo_producto', $data['precio_costo_producto']);
		$this->db->bind('estado_producto_id', $data['estado_producto_id']);

		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}


	public function buscar_por_codigo($codigo){
		$this->db->query("SELECT p.id_producto, p.nombre_producto, p.codigo_producto, p.cantidad_stock_producto, p.precio_costo_producto,
      pv.razon_social_proveedor, c.nombre_categoria_producto, pe.nombre_estado_producto

			FROM producto p
        INNER JOIN proveedor pv ON p.proveedor_id = pv.id_proveedor
        INNER JOIN categoria_producto c ON p.categoria_producto_id = c.id_categoria_producto
        INNER JOIN estado_producto pe ON p.estado_producto_id = pe.id_estado_producto
				  WHERE p.codigo_producto = :codigo_producto
					  AND pe.nombre_estado_producto = 'Activo'");
		$this->db->bind('codigo_producto', $codigo);
		
		$result = $this->db->register();
		return $result;
	}

  public function buscar_por_estado($data){
		$this->db->query("SELECT p.nombre_producto, p.codigo_producto, p.cantidad_stock_producto, p.precio_costo_producto,
      pv.nombre_proveedor, c.nombre_categoria_producto, pe.nombre_estado_producto
			FROM producto p
        INNER JOIN proveedor pv ON p.proveedor_id = pv.id_proveedor
        INNER JOIN categoria_producto c ON p.categoria_producto_id = c.id_categoria_producto
        INNER JOIN estado_producto pe ON p.estado_producto_id = pe.id_estado_producto
				  WHERE p.estado_producto_id =:estado_producto_id");
		$this->db->bind('estado_producto_id', $data['estado_producto_id']);
		
		$result = $this->db->register();
		return $result;
	}

	public function insertarProducto($datos) {
    $this->db->query("INSERT INTO producto (proveedor_id, categoria_producto_id, codigo_producto, nombre_producto, cantidad_stock_producto, precio_costo_producto, estado_producto_id, created_at) 
                      VALUES (:proveedor_id, :categoria_producto_id, :codigo_producto, :nombre_producto, :cantidad_stock_producto, :precio_costo_producto, :estado_producto_id, NOW())");

    $this->db->bind(':proveedor_id', $datos['proveedor_id']);
    $this->db->bind(':categoria_producto_id', $datos['categoria_id']);
    $this->db->bind(':codigo_producto', $datos['codigo_producto']);
    $this->db->bind(':nombre_producto', $datos['nombre_producto']);
    $this->db->bind(':cantidad_stock_producto', $datos['cantidad_stock_producto']);
    $this->db->bind(':precio_costo_producto', $datos['precio_costo_producto']);
    $this->db->bind(':estado_producto_id', $datos['estado_producto_id']);

    return $this->db->execute();
}

public function obtenerProductos() {
    $this->db->query("
        SELECT 
            p.id_producto,
            p.nombre_producto,
            p.codigo_producto,
            p.cantidad_stock_producto,
            p.precio_costo_producto,
            c.nombre_categoria_producto AS nombre_categoria,
			pr.razon_social_proveedor AS nombre_proveedor
			
        FROM producto p
        INNER JOIN categoria_producto c ON p.categoria_producto_id = c.id_categoria_producto
        INNER JOIN proveedor pr ON p.proveedor_id = pr.id_proveedor
    ");
    return $this->db->registers(); 
}
}