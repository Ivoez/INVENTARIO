<?php
class OrdenCompraController extends BaseController {
    private $modelo;
    private $modeloProveedor;
    private $modeloCategoria;

    public function __construct() {
        $this->modelo = $this->model('OrdenCompraModel');
        $this->modeloProveedor = $this->model('ProveedorModel');
        $this->modeloCategoria = $this->model('ProductoModel');
    }

    // formulario crear orden
    public function crear(): void {

        $data = [
            'proveedores' => $this->modeloProveedor->obtenerProveedores(),
            'productos' => $this->modeloCategoria->obtenerProductos(),
        ];

        $this->view('formularios/formOrdenCompra', $data);
    }

    
    // guardar la orden
public function guardar(): void {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $usuario_id = $_SESSION['id_usuario'] ?? null;
        if (!$usuario_id) {
            echo "Debe iniciar sesión.";
            $this->view('pages/Login', []);
            return;
        }

        $proveedor = $_POST['proveedor'] ?? null;
        $fecha = $_POST['fecha'] ?? '';
        $nota = $_POST['nota'] ?? '';
        $productos = $_POST['productos'] ?? [];
        $cantidades = $_POST['cantidades'] ?? [];

        if (empty($proveedor) || empty($productos) || empty($cantidades)) {
            echo "Datos mal cargados.";
            return;
        }

        // número de orden único
        $nro_orden = generarNroOC($proveedor);

        // insertar cabecera
        $cabecera_id = $this->modelo->registrarCabecera($nro_orden, $usuario_id, $proveedor, $fecha, $nota);

        // insertar detalle
        foreach ($productos as $index => $producto_id) {
            $cantidad = (int)$cantidades[$index];

            if ($producto_id && $cantidad > 0) {
                $this->modelo->registrarDetalle($cabecera_id, $producto_id, $cantidad);
            }
        }

        // mensaje de éxito
        echo "<div class='alert alert-success'>Orden generada correctamente.</div>";
    }
}
    

    // Listado de ordenes
    public function listadoOrdenes(): void {
        $ordenes = $this->modelo->obtenerOrdenesConDetalle();

        $data = [
            'ordenes' => $ordenes
        ];

        $this->view('formularios/listadoOrdenCompra', $data);
    }
}