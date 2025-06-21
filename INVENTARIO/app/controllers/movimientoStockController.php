<?php
class movimientoStockController extends BaseController {
  public function __construct() {
      $this->modelo = $this->model('movimientoStockModel');
      $this->modeloProducto = $this->model('productoModel');
  }

    // formulario para crear un nuevo proveedor
    public function agregar_movimiento() {

      $errores = [];
      $datas = [];
      $codigos_producto = $this->modeloProducto->buscar_productos();

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {            
        $codigo_producto = trim($_POST['codigo_producto']);
        $tipo = trim($_POST['tipo']);
        $fecha = trim($_POST['fecha']);
        $cantidad = trim($_POST['cantidad']);
        $usuario = $_SESSION['id_usuario'];
  
        // Validaciones
        if ($codigo_producto == 'Seleccione un código de producto') {
          $errores['codigo_producto'] = 'Debe seleccionar un código de producto';
        }
  
        if (empty($cantidad) OR $cantidad == 0) {
          $errores['cantidad'] = 'La cantidad debe ser distinta a 0';
        }

        if (empty($fecha)) {
          $errores['fecha'] = 'La fecha es requerida';
        }

        if ($tipo == 'Seleccione un tipo de movimiento') {
          $errores['tipo'] = 'Debe seleccionar un tipo de movimiento';
        }
  
        if (empty($errores)) {
          if ($tipo == 'Salida') {
            $cantidad = $cantidad * -1;
          }
          $producto_id = $this->modeloProducto->buscar_por_codigo($codigo_producto)->id_producto;
          $datas = [
            'fecha_movimiento' => $fecha,
            'cantidad' => $cantidad,
            'usuario_responsable_id' => $usuario,
            'producto_id' => $producto_id
          ];
  
          if($this->modelo->crear_movimiento($datas)){
              $this->view('pages/dashboard/dashboard_agregar_mov_stock');
          }else{
              $errores['general'] = 'No se pudo crear el movimiento.';
          }
      }
    }
    $this->view('pages/dashboard/dashboard_agregar_mov_stock', ['datas' => $datas, 'errores' => $errores, 'codigos_producto' => $codigos_producto]);
  }

  public function cargarFormulario() {
    $modeloCategoria = $this->model('categoriaModel');
    $modeloProveedor = $this->model('proveedorModel');
    $modeloEstado = $this->model('estadoProductoModel');

    $datos = [
        'categorias' => $modeloCategoria->obtenerCategorias(),
        'proveedores' => $modeloProveedor->obtenerProveedores(),
        'estados' => $modeloEstado->obtenerEstados()
    ];

    $this->view('formularios/formProductos', $datos);
}




}