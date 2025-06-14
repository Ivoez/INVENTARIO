<?php
class proveedorController extends BaseController {
  public function __construct() {
      $this->modelo = $this->model('proveedorModel');
  }

    // listado de todos los proveedores
    public function index() {
        $proveedores = $this->modelo->obtenerTodos();
        $this->view('pages/proveedores/index', ['proveedores' => $proveedores]);
    }

    // formulario para crear un nuevo proveedor
    public function agregar_proveedor() {
      $datas = [
        'razon_social' => NULL,
        'CUIT' => NULL,
        'direccion' => NULL,
        'telefono' => NULL,
        'email' => NULL,
        'estado' => NULL
      ];

      $errores = [];

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
        $datas['razon_social'] = trim($_POST['razon_social']);
        $datas['CUIT'] = trim($_POST['CUIT']);
        $datas['direccion'] = trim($_POST['direccion']);
        $datas['telefono'] = trim($_POST['telefono']);
        $datas['email'] = trim($_POST['email']);

          // Validaciones
        if (empty($datas['razon_social'])) {
          $errores['razon_social'] = 'La razón social es requerida';
        }

        if (strlen($datas['CUIT'] < 11)) {
          $errores['CUIT'] = 'El CUIT debe tener un mínimo de 11 caracterés.';
        }

        if (!filter_var($datas['email'], FILTER_VALIDATE_EMAIL)) {
          $errores['email'] = 'El email no es válido';
        }

        if (empty($errores)) {
          $res = $this->modelo->agregar_proveedor($datas);

          if ($res->resultado_proceso == 1) {
            $this->view('pages/dashboard/dashboard_agregar_proveedor');
            exit;
          }
          else {
            $mensaje_proceso = $res->mensaje_proceso;
            switch ($mensaje_proceso) {
              case "razon_social_proveedor existente":
                $errores['general'] = "Ya existe un proveedor registrado con la razòn social ingresada.";
                break;
              case "CUIT_proveedor existente":
                $errores['general'] = "Ya existe un proveedor registrado con el CUIT ingresado.";
                break;
              case "direccion_proveedor existente":
                $errores['general'] = "Ya existe un proveedor registrado con la direcciòn ingresada.";
                break; 
              case "telefono_proveedor existente":
                $errores['general'] = "Ya existe un proveedor registrado con el telèfono ingresado.";
                break;
              case "email_personal_proveedor existente":
                $errores['general'] = "Ya existe un proveedor registrado con el email ingresado.";
                break;
              default:
                $errores['general'] = "Error desconocido al crear el proveedor.";
                break;
            }
          }
        }
      }

      $this->view('pages/dashboard/dashboard_agregar_proveedor', ['datas' => $datas, 'errores' => $errores]);
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