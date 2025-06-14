<?php

class movimientoStockModel {
  private $db;

  public function __construct() {
    $this->db = new Database();
  }

  // Listado de codigos de producto
  public function obtener_codigos_producto() {
    $this->db->query("CALL list_codigo_producto()");
    return $this->db->registers(); // Devuelve todos los registros obtenidos
  }

  //Registrar usuario
  public function agregar_movimiento($data) {
    $this->db->query("CALL insert_movimiento_stock(
      :codigo_producto, :email_usuario, :tipo, :fecha, :cantidad,
      @res, @msg
    )");

    $this->db->bind(':codigo_producto', $data['codigo_producto']);
    $this->db->bind(':email_usuario', $data['email_usuario']);
    $this->db->bind(':tipo', $data['tipo']);
    $this->db->bind(':fecha', $data['fecha']);
    $this->db->bind(':cantidad', $data['cantidad']);

    $this->db->execute();

    $this->db->query("SELECT @res AS resultado_proceso, @msg AS mensaje_proceso");

    $resultado = $this->db->register();  // Ejecuta y obtiene resultado

    return $resultado; //Asegura que siempre se retorne algo
  }

}
?>