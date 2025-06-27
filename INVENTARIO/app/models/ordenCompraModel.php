<?php
class OrdenCompraModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function registrarCabecera($nro_orden, $usuario_id, $proveedor_id, $fecha, $nota) {

        $this->db->query("INSERT INTO cabecera_orden_compra(nro_orden_compra, usuario_responsable_id, proveedor_id, 
        fecha_orden_compra, nota_orden_compra, created_at, updated_at) 
        VALUES (:nro, :usuario, :fecha, :nota, NOW(), NOW())");

        $this->db->bind(':nro', $nro_orden);
        $this->db->bind(':usuario', $usuario_id);
        $this->db->bind(':proveedor', $proveedor_id);
        $this->db->bind(':fecha', $fecha);
        $this->db->bind(':nota', $nota);
        $this->db->execute();

        return $this->db->register();
        return $this->db->lastInsertId();
    }

    public function registrarDetalle($cabecera_id, $producto_id, $cantidad){

        $this->db->query("INSERT INTO detalle_orden_compra(cabecera_orden_compra_id, producto_id, 
        cantidad_detalle_orden_compra, created_at, updated_at)
        VALUES(:cabecera, :producto, :cantidad, NOW(), NOW())");

        $this->db->bind(':cabecera', $cabecera_id);
        $this->db->bind(':producto', $producto_id);
        $this->db->bind(':cantidad', $cantidad);

        $this->db->execute();
    }

    public function obtenerProveedores() {
        $this->db->query("SELECT razon_social_proveedor, id_proveddor FROM proveedor WHERE estado_proveedor_id = 1");
        return $this->db->registers();
    }

    public function obtenerProductos() {
        $this->db->query("SELECT codigo_producto, nombre_producto FROM producto WHERE estado_producto_id = 1");
        return $this->db->registers();
    }

    public function obtenerOrdenesConDetalle() {
    $this->db->query("
        SELECT 
            c.nro_orden_compra AS nro,
            c.fecha_orden_compra AS fecha,
            p.razon_social_proveedor AS proveedor,
            pr.nombre_producto AS producto,
            d.cantidad_detalle_orden_compra AS cantidad
        FROM cabecera_orden_compra c
        INNER JOIN detalle_orden_compra d ON c.id_cabecera_orden_compra = d.cabecera_orden_compra_id
        INNER JOIN proveedor p ON c.proveedor_id = p.id_proveedor
        INNER JOIN producto pr ON d.producto_id = pr.id_producto
        ORDER BY c.fecha_orden_compra DESC
    ");
    return $this->db->registers();
}

    public function generarNroOrdenCompra($proveedor_id) {
        // dos letras de razón social
        $this->db->query("SELECT razon_social_proveedor FROM proveedor WHERE id_proveedor = :id");
        $this->db->bind(':id', $proveedor_id);
        $proveedor = $this->db->registro();

        if (!$proveedor) {
            return null;
        }

        $prefijo = strtoupper(substr($proveedor->razon_social_proveedor, 0, 2));

        // genera el número consecutivo
        $this->db->query("SELECT COUNT(*) AS total FROM cabecera_orden_compra");
        $conteo = $this->db->registro();
        $numero = str_pad($conteo->total + 1, 6, "0", STR_PAD_LEFT);

        return "OC00{$prefijo}{$numero}";
    }


}
