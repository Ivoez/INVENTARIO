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
        return $this->db->single();
    }

    public function registrarDetalle($datos) {
        $this->db->query("CALL insert_detalle_oc(:nro_cabecera, :codigo_producto, :cantidad, @resultado, @mensaje)");
        $this->db->bind(':nro_cabecera', $datos['nro_cabecera']);
        $this->db->bind(':codigo_producto', $datos['codigo_producto']);
        $this->db->bind(':cantidad', $datos['cantidad']);
        $this->db->execute();

        $this->db->query("SELECT @resultado AS resultado, @mensaje AS mensaje");
        return $this->db->single();
    }

    public function obtenerProveedores() {
        $this->db->query("SELECT razon_social_proveedor FROM proveedor");
        return $this->db->resultSet();
    }

    public function obtenerProductos() {
        $this->db->query("SELECT codigo_producto, nombre_producto FROM producto");
        return $this->db->resultSet();
    }
}