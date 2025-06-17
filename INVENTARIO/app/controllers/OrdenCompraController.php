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

    // Mostrar formulario para crear una nueva orden
    public function crear() {
        // Verificar sesión
        if (!isset($_SESSION['email_usuario'])) {
            $_SESSION['mensaje_error'] = "Inicie sesión para generar una Orden de Compra.";
            redireccionar('/auth/login');
            return;
        }

        $data = [
            'proveedores' => $this->modeloProveedor->obtenerProveedores(),
            'productos' => $this->modeloCategoria->obtenerProductos(),
        ];

        $this->view('ordencompra/crear', $data);
    }

    // Guardar la orden (cabecera + múltiples detalles)
    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Verificar sesión
            $email = $_SESSION['email_usuario'] ?? null;
            if (!$email) {
                $_SESSION['mensaje_error'] = "Inicie sesión para cargar una Orden de Compra.";
                redireccionar('/auth/login');
                return;
            }

            // Datos cabecera
            $cabecera = [
                'proveedor' => $_POST['proveedor'],
                'email_usuario' => $email,
                'nro' => $_POST['nro'],
                'fecha' => $_POST['fecha']
            ];

            $resultadoCabecera = $this->modelo->registrarCabecera($cabecera);

            if ($resultadoCabecera['resultado'] == 1) {
                // Registrar detalles
                $productos = $_POST['productos'] ?? [];
                $cantidades = $_POST['cantidades'] ?? [];
                $erroresDetalle = [];

                // Validación básica
                if (!is_array($productos) || !is_array($cantidades) || count($productos) !== count($cantidades)) {
                    $_SESSION['mensaje_error'] = "Datos de productos mal formados.";
                    redireccionar('/ordencompra/crear');
                    return;
                }

                for ($i = 0; $i < count($productos); $i++) {
                    $detalle = [
                        'nro_cabecera' => $_POST['nro'],
                        'codigo_producto' => $productos[$i],
                        'cantidad' => $cantidades[$i]
                    ];

                    $resDetalle = $this->modelo->registrarDetalle($detalle);

                    if ($resDetalle['resultado'] != 1) {
                        $erroresDetalle[] = $resDetalle['mensaje'];
                    }
                }

                if (empty($erroresDetalle)) {
                    $_SESSION['mensaje_exito'] = "Orden registrada correctamente.";
                } else {
                    $_SESSION['mensaje_error'] = "Error al cargar:<br>" . implode("<br>", $erroresDetalle);
                }

                redireccionar('/ordencompra/crear');
            } else {
                $_SESSION['mensaje_error'] = $resultadoCabecera['mensaje'];
                redireccionar('/ordencompra/crear');
            }
        }
    }

    // Mostrar listado de órdenes
    public function listadoOrdenes() {
        if (!isset($_SESSION['email_usuario'])) {
            $_SESSION['mensaje_error'] = "Inicie sesión para ver las órdenes generadas.";
            redireccionar('/auth/login');
            return;
        }

        $ordenes = $this->modelo->obtenerOrdenesConDetalle();
        $this->view('ordencompra/listado', ['ordenes' => $ordenes]);
    }
}