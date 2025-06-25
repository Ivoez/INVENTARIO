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


    // muestra formulario 
    public function crear() : void { 
        // Verificar sesión
        if (!isset($_SESSION['email_usuario'])) {
            $_SESSION['mensaje_error'] = "Inicie sesión para generar una Orden de Compra."; ///////////////// no muestra formulario
            $this->view('pages/Login', ['data' => []]);
            return;
        }

        $data = [
            'proveedores' => $this->modeloProveedor->obtenerProveedores(),
            'productos' => $this->modeloCategoria->obtenerProductos(),
        ];

        $this->view('formularios/formOrdenCompra', $data);
    }

    // crea la orden con detalles
    public function guardar() : void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = $_SESSION['email_usuario']?? null;
            if(!$email){
                $data = [
                    'error' => "Inicie sesión para cargar una orden de compra.",
                    'proveedores' => $this  -> modelo-> obtenerProveedores(),
                    'productos' => $this  -> modelo-> obtenerProductos()
                ];
                $this -> view ('pages/Login', $data);
                return;
            }
            
            $proveedor = $_POST['proveedor'] ?? '';
            $fecha = $_POST['fecha'] ?? '';
            $productos = $_POST['productos'] ?? [];
            $cantidades = $_POST['cantidades'] ?? [];
            //habría que agregar un apartado para notas, ej. solicitar un producto del cual no se posea código/no este cargado en productos
            //$nota = $_POST ['nota'] ?? ''; 
            
            if (empty($proveedor) || empty($productos) || count($productos) !== count($cantidades)){
                $data = [
                    'error' => 'Datos mal cargados.',
                    'proveedores' => $this  -> modelo-> obtenerProveedores(),
                    'productos' => $this  -> modelo-> obtenerProductos()

                ];
                $this -> view ('formularios/formOrdenCompra', $data);
                return;
            }

            $nro_orden = uniqid();
            $datosCabecera = [
                'proveedor' => $proveedor,
                'email_usuario' => $email, 
                'nro' => $nro_orden, 
                'fecha' => $fecha
            ];

            $resultado =$this -> modelo -> registrarCabecera($datosCabecera);

            if ($resultado['resultado'] != 1){
                $data = [
                    'error' => 'Error.'.$resultado['mensaje'],
                    'proveedores' => $this  -> modelo-> obtenerProveedores(),
                    'productos' => $this  -> modelo-> obtenerProductos()
                ];
                $this -> view ('formularios/formOrdenCompra', $data);
                return;
            }

            for ($i=0; $i<count($productos); $i++){
                if(!empty($productos[$i]) && $cantidades[$i] > 0){
                    $this -> modelo -> registrarDetalle([
                        'nro_cabecera' => $nro_orden,
                        'codigo_producto' => $productos[$i],
                        'cantidad' => $cantidades[$i]
                    ]);
                }
            }
            
            $data = [

                'mensaje_ok' => 'Orden de Compra generada exitosamente.',
                'proveedores' => $this  -> modelo-> obtenerProveedores(),
                'productos' => $this  -> modelo-> obtenerProductos()
            ];

            $this -> view ('formularios/formOrdenCompra', $data);
            return;


            }
    }


    // listado de ordenes
    public function listadoOrdenes() : void {
        $modelo = $this->model('ordenCompraModel');
        $ordenes = $this->modelo->obtenerOrdenesConDetalle();

        $this->view('formularios/formOrdenCompra', ['ordenes' => $ordenes]);
    }

}




