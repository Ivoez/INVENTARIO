<?php
class movimientoStockController extends BaseController {
  public function __construct() {
      $this->modelo = $this->model('movimientoStockModel');
  }


    // formulario para crear un nuevo movmiento
    public function agregar_movimiento() {
      $datas = [
        'codigo_producto' => NULL,
        'email_usuario' => $_SESSION['email_usuario'],
        'tipo' => NULL,
        'fecha' => NULL,
        'cantidad' => NULL
      ];

      $errores = [];

      // Envío a view todos los tipos de usuario
      $codigos_producto = $this->modelo->obtener_codigos_producto();

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
        $datas['codigo_producto'] = trim($_POST['codigo_producto']);
        $datas['tipo'] = trim($_POST['tipo']);
        $datas['fecha'] = trim($_POST['fecha']);
        $datas['cantidad'] = trim($_POST['cantidad']);

          // Validaciones
        if ($datas['codigo_producto'] == 'Seleccione un código de producto') {
          $errores['codigo_producto'] = 'Debe seleccionar un código de producto';
        }

        // Validaciones
        if (empty($datas['cantidad']) OR $datas['cantidad'] <= 0) {
          $errores['cantidad'] = 'La cantidad debe ser mayor a 0';
        }
        
        // Validaciones
        if (empty($datas['fecha'])) {
          $errores['fecha'] = 'La fecha es requerida';
        }

        if ($datas['tipo'] == 'Seleccione un tipo de movimiento') {
          $errores['tipo'] = 'Debe seleccionar un tipo de movimiento';
        }

        if (empty($errores)) {
          $res = $this->modelo->agregar_movimiento($datas);

          if ($res->resultado_proceso == 1) {
            $this->view('pages/dashboard/dashboard_agregar_mov_stock');
            exit;
          }
          else {
            $mensaje_proceso = $res->mensaje_proceso;
            switch ($mensaje_proceso) {
              case "codigo_producto no existente":
                $errores['general'] = "No existen productos registrados con ese còdigo.";
                break;
              case "email_usuario no existente":
                $errores['general'] = "Error con el usuario responsable.";
                break;
              case "tipo de movimiento incorrecto":
                $errores['general'] = "El tipo de movimiento es incorrecto.";
                break; 
              case "cantidad no válida":
                $errores['general'] = "La cantidad no es vàlida.";
                break;
              case "La fecha no puede ser posterior a hoy":
                $errores['general'] = "La fecha no puede ser posterior a hoy.";
                break;
              default:
                $errores['general'] = "Error desconocido al crear el movmiento de stock.";
                break;
            }
          }
        }
      }

      $this->view('pages/dashboard/dashboard_agregar_mov_stock', ['datas' => $datas, 'errores' => $errores, 'codigos_producto' => $codigos_producto]);
    }

}