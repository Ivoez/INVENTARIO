<?php
class productoController extends BaseController {
    private $modelo;
    private $modeloCategoria;
    private $modeloProveedor;

    public function __construct() {
        $this->modelo = $this->model('productoModel');
        $this->modeloCategoria = $this->model('categoriaModel');
        $this->modeloProveedor = $this->model('proveedorModel');
    }


    public function index() {
    $this->view('formularios/formListado');
}

    public function cargarFormulario() {
        $data = [
            'categorias' => $this->modeloCategoria->obtenerCategorias(),
            'proveedores' => $this->modeloProveedor->obtenerProveedores()
        ];
        $this->view('formularios/formProductos', $data); 
    }

    public function insertarProducto() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Limpieza y asignación de variables
        $nombre_producto = trim($_POST['nombre_producto']);
        $codigo_producto = trim($_POST['codigo_producto']);
        $cantidad_stock_producto = (int) trim($_POST['cantidad_stock_producto']);
        $precio_costo_producto = (float) trim($_POST['precio_costo_producto']);
        $categoria_id = trim($_POST['categoria']);
        $nueva_categoria = trim($_POST['nueva_categoria']);
        $proveedor_id = trim($_POST['proveedor']);

        $categoriaModel = $this->model('categoriaModel');
        $productoModel = $this->model('productoModel');

        // Si escribió nueva categoría, insertar y obtener su ID
        if (!empty($nueva_categoria)) {
            $nuevaCategoriaID = $categoriaModel->insertarCategoria($nueva_categoria);
            $categoria_id = $nuevaCategoriaID;
        }

        // Validaciones básicas
        $errores = [];
        if (empty($nombre_producto)) {
            $errores[] = "El nombre del producto es obligatorio.";
        }
        if (empty($codigo_producto)) {
            $errores[] = "El código del producto es obligatorio.";
        }
        if ($cantidad_stock_producto < 0) {
            $errores[] = "La cantidad en stock no puede ser negativa.";
        }
        if ($precio_costo_producto < 0) {
            $errores[] = "El precio de costo no puede ser negativo.";
        }
        if (empty($categoria_id)) {
            $errores[] = "La categoría es obligatoria.";
        }
        if (empty($proveedor_id)) {
            $errores[] = "El proveedor es obligatorio.";
        }

        if (!empty($errores)) {
            // Volver a mostrar el formulario con errores y datos
            $data = [
                'errores' => $errores,
                'dataForm' => $_POST,
                'categorias' => $categoriaModel->obtenerCategorias(),
                'proveedores' => $this->model('proveedorModel')->obtenerProveedores()
            ];
            $this->view('formularios/formProductos', $data);
            return;
        }

        // Datos para insertar
        $datos = [
            'proveedor_id' => $proveedor_id,
            'categoria_id' => $categoria_id,
            'codigo_producto' => $codigo_producto,
            'nombre_producto' => $nombre_producto,
            'cantidad_stock_producto' => $cantidad_stock_producto,
            'precio_costo_producto' => $precio_costo_producto,
            'estado_producto_id' => 1 // Activo por defecto
        ];

        // Insertar producto
        $insertado = $productoModel->insertarProducto($datos);

        if ($insertado) {
            // Redirigir con mensaje o cargar vista de confirmación
            header("Location: " . RUTA_URL . "/productoController/confirmacion");
            exit;
        } else {
            // Error al insertar
            $data = [
                'errores' => ['Error al insertar el producto. Intente nuevamente.'],
                'dataForm' => $_POST,
                'categorias' => $categoriaModel->obtenerCategorias(),
                'proveedores' => $this->model('proveedorModel')->obtenerProveedores()
            ];
            $this->view('formularios/formProductos', $data);
        }
    }
}

public function listarProductos() {
    $modelo = $this->model('productoModel');
    $productos = $modelo->obtenerProductos();

      $data = ['productos' => $productos]; // ✅ armás el array $data


    $this->view('formularios/formListado', ['productos' => $productos]);
}


    public function confirmacion() {
        echo "<div class='alert alert-success'>Producto guardado con éxito.</div>";
    }

    
}