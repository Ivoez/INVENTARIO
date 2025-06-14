<?php
class proveedorModel {
  private $db;

  public function __construct() {
    $this->db = new Database();
  }

  // Crear proveedor
  public function agregar_proveedor($data) {
    $this->db->query("CALL insert_proveedor(
        :razon_social, :CUIT, :direccion, :telefono, :email, :estado,
        @res, @msg
    )");
    $this->db->bind(':razon_social', $data['razon_social']);
    $this->db->bind(':CUIT', $data['CUIT']);
    $this->db->bind(':direccion', $data['direccion']);
    $this->db->bind(':telefono', $data['telefono']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':estado', $data['estado']);

    $this->db->execute();

    $this->db->query("SELECT @res AS resultado_proceso, @msg AS mensaje_proceso");

    $resultado = $this->db->register();  // Ejecuta y obtiene resultado

    return $resultado; //Asegura que siempre se retorne algo
    }


    //mostar proveedores con estado 
    public function obtenerTodos() {
        $this->db->query("SELECT p.*, ep.nombre_estado_proveedor 
                          FROM proveedor p
                          INNER JOIN estado_proveedor ep ON p.estado_proveedor_id = ep.id_estado_proveedor");

        return $this->db->registros(); 
    }


    // traer proveedor por  id
    public function obtenerPorId($id) {
        $this->db->query("SELECT * FROM proveedor WHERE id_proveedor = :id");
        $this->db->bind(':id', $id); 
        return $this->db->registro(); 
    }


    

    // actualizar un proveedor por id
    public function actualizar($id, $data) {
        $this->db->query("UPDATE proveedor SET 
            razon_social_proveedor = :razon,
            CUIT_proveedor = :cuit,
            direccion_proveedor = :direccion,
            telefono_proveedor = :telefono,
            email_personal_proveedor = :email,
            estado_proveedor_id = :estado
            WHERE id_proveedor = :id");

        // asigna valores a parámetros
        $this->db->bind (':razon', $data['razon_social_proveedor']);
        $this->db->bind (':cuit', $data['CUIT_proveedor']);
        $this->db->bind (':direccion', $data['direccion_proveedor']);
        $this->db->bind (':telefono', $data['telefono_proveedor']);
        $this->db->bind (':email', $data['email_personal_proveedor']);
        $this->db->bind (':estado', $data['estado_proveedor_id']);
        $this->db->bind( ':id', $id);

        return $this->db->execute();
    }
    

    // desactiva proveedor por id
    public function cambioEstado ($id) {
        $this->db->query ("UPDATE proveedor SET estado_proveedor_id = :estado WHERE id_proveedor = :id");
        $this->db->bind (':estado', 2); //es 2 no?
        $this->db->bind (':id', $id);
        return $this->db->execute ();
    }
}