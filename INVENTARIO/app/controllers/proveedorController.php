<?php

class ProveedoresController extends BaseController {
    private $modelo;

    public function __construct() {

        // carga el modelo de proveedor
        $this->modelo = $this->model('ProveedorModel');
    }

    // listado de todos los proveedores
    public function index() {
        $proveedores = $this->modelo->obtenerTodos();
        $this->view('pages/proveedores/index', ['proveedores' => $proveedores]);
    }

    // formulario para crear un nuevo proveedor
    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // juntar datos del formulario
            $data = [
                'razon_social_proveedor' => $_POST['razon_social_proveedor'],
                'CUIT_proveedor' => $_POST['CUIT_proveedor'],
                'direccion_proveedor' => $_POST['direccion_proveedor'],
                'telefono_proveedor' => $_POST['telefono_proveedor'],
                'email_personal_proveedor' => $_POST['email_personal_proveedor'],
                'estado_proveedor_id' => $_POST['estado_proveedor_id'] ?? 1 // Activo por defecto
            ];

            $this->modelo->insertar($data);
            redirigir('/proveedores');

        } else {
            // Muestra la vista con el formulario vacío
            $this->view('pages/proveedores/crear');
        }
    }



    // formulario de actualización
    public function editar($id) {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'razon_social_proveedor' => $_POST['razon_social_proveedor'],
                'CUIT_proveedor' => $_POST['CUIT_proveedor'],
                'direccion_proveedor' => $_POST['direccion_proveedor'],
                'telefono_proveedor' => $_POST['telefono_proveedor'],
                'email_personal_proveedor' => $_POST['email_personal_proveedor'],
                'estado_proveedor_id' => $_POST['estado_proveedor_id']
            ];

            $this->modelo->actualizar($id, $data);
            redirigir('/proveedores');

        } else {
            $proveedor = $this->modelo->obtenerPorId($id);
            $this->view('pages/proveedores/editar', ['proveedor' => $proveedor]);
        }
    }


    // cambia de estado 
    public function desactivarProv($id) {
        $this->modelo->desactivar($id);
        redirigir('/proveedores');
    }
}