<?php
class OrdenCompraModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function registrarCabecera($datos) {
        $this->db->query("CALL insert_cabecera_oc(:proveedor, :email_usuario, :nro, :fecha, @resultado, @mensaje)");
        $this->db->bind(':proveedor', $datos['proveedor']);
        $this->db->bind(':email_usuario', $datos['email_usuario']);
        $this->db->bind(':nro', $datos['nro']);
        $this->db->bind(':fecha', $datos['fecha']);
        $this->db->execute();

        $this->db->query("SELECT @resultado AS resultado, @mensaje AS mensaje");
        return $this->db->register();
    }

    public function registrarDetalle($datos) {
        $this->db->query("CALL insert_detalle_oc(:nro_cabecera, :codigo_producto, :cantidad, @resultado, @mensaje)");
        $this->db->bind(':nro_cabecera', $datos['nro_cabecera']);
        $this->db->bind(':codigo_producto', $datos['codigo_producto']);
        $this->db->bind(':cantidad', $datos['cantidad']);
        $this->db->execute();

        $this->db->query("SELECT @resultado AS resultado, @mensaje AS mensaje");
        return $this->db->register();
    }

    public function obtenerProveedores() {
        $this->db->query("SELECT id_proveedor, razon_social_proveedor FROM proveedor");
        return $this->db->register();
    }

    public function obtenerProductos() {
        $this->db->query("SELECT codigo_producto, nombre_producto FROM producto");
        return $this->db->register();
    }

    public function obtenerOrdenesConDetalle() {
        $this->db->query("
            SELECT oc.nro, oc.fecha, p.razon_social_proveedor, pr.nombre_producto, d.cantidad
            FROM orden_compra oc
            JOIN detalle_orden_compra d ON oc.nro = d.nro_oc
            JOIN proveedor p ON oc.id_proveedor = p.id_proveedor
            JOIN producto pr ON d.codigo_producto = pr.codigo_producto
            ORDER BY oc.fecha DESC
        ");
        return $this->db->register();
    }
}