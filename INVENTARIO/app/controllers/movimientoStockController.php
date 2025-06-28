<?php

class movimientoStockController extends BaseController {
  private $modelo;
  private $modeloProducto;


  public function __construct() {
    $this->modelo = $this->model('movimientoStockModel');
    $this->modeloProducto = $this->model('productoModel');
  }

  
  public function cargarFormulario() {
    $productos = $this->modeloProducto->obtenerProductos();

    $this->view('formularios/formMovimientoStock', ['productos' => $productos]);
  }

  
  public function insertarMovimiento() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $producto_id = trim($_POST['producto_id']);
      $tipo = trim($_POST['tipo']);
      $cantidad = trim($_POST['cantidad']);
      $fecha = trim($_POST['fecha']);

      
    if (empty($producto_id) || empty($tipo) || empty($cantidad) || $cantidad <= 0 || empty($fecha)) {
    echo "Datos mal cargados.";
      return;
    }

    $exito = $this->modelo->insertarMovimiento($producto_id, $usuario_id, $fecha, $tipo, $cantidad);
    // mensaje de éxito
    echo "<div class='alert alert-success'>Orden generada correctamente.</div>";

    }

  }


  ///////////////////////////////////////////////////////probar sino simplificar
  public function listarMovimientos():void {

    $movimientos = $this->modelo->listarMovimientos();

    $this->view('formularios/formListadoMovimientos', ['movimientos' => $movimientos]);  //?

    /*
    $producto_id = $_GET['producto_id'] ?? null;
    $fecha_desde = $_GET['fecha_desde'] ?? null;
    $fecha_hasta = $_GET['fecha_hasta'] ?? null;

    $movimientos = $this->modelo->obtenerMovimientos($producto_id, $fecha_desde, $fecha_hasta);
    $productos = $this->modeloProducto->obtenerProductos();

    $this->view('formularios/formListadoMovimientos', [
      'movimientos' => $movimientos,
      'productos' => $productos,
      'filtros' => [
        'producto_id' => $producto_id,
        'fecha_desde' => $fecha_desde,
        'fecha_hasta' => $fecha_hasta
      ]
    ]);*/


  }
}