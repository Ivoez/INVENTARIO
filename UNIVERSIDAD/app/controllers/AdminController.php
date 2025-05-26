<?php
class AdminController extends BaseController{
    private $CarrerasModel;

    public function __construct() {
        $this->CarrerasModel = $this->model('CarrerasModel');
    }
    public function agregarCarrera() {

    // Verifica que haya un usuario logueado y que sea admin
    if (!isset($_SESSION['tipoUsuario']) || $_SESSION['tipoUsuario'] != 'admin') {
        // Si no es admin o no está logueado, redirige al login o a otra página
        $this->view('pages/auth/login');
        //exit();
    }
   
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // datos del formulario
        $nombreCarrera = trim($_POST['nombreCarrera']);
        $descripcion = trim($_POST['descripcion']);
        $descripcionCompleta = trim($_POST['descripcionCompleta']);
        $tipoCarrera = $_POST['tipoCarrera'];
        $imagen = isset($_FILES['imagen']) ? $_FILES['imagen']['name'] : null;
        $image_type = isset($_FILES['imagen']) ? $_FILES['imagen']['type'] : null;
        $image_size = isset($_FILES['imagen']) ? $_FILES['imagen']['size'] : null;
        $ubi = $_SERVER['DOCUMENT_ROOT'] . RUTA_IMG_CARRERA;

         // Validación: si la carrera ya existe, mostramos error
        if ($this->CarrerasModel->carreraExiste($nombreCarrera)) {
            $data = [
                'errorRegistro' => '<div class="alert alert-danger" role="alert">
                    Ya existe una carrera con ese nombre.
                </div>',
            ];
            $this->view('pages/auth/agregarCarrera', $data);
            return;
        }

        if ($imagen != '') {
            if ($image_size <= 10000000) {
                if ($image_type == 'image/jpg' || $image_type == 'image/jpeg' || $image_type == 'image/png') {
                    move_uploaded_file($_FILES['imagen']['tmp_name'], $ubi . $imagen);
                } else {
                    $data = [
                        'errorRegistro' => '<div class="alert alert-danger" role="alert">
                            El tipo de imagen debe ser jpg, jpeg o png.
                          </div>',
                    ];
                    $this->view('pages/auth/agregarCarrera', $data);
                    return;
                }
            } else {
                $data = [
                    'errorRegistro' => '<div class="alert alert-danger" role="alert">
                        El tamaño de la imagen es demasiado grande
                      </div>',
                ];
                $this->view('pages/auth/agregarCarrera', $data);
                return;
            }
        } else {
            $imagen = 'img_default.png';
        }

        if (empty($nombreCarrera) || empty($descripcion) || empty($descripcionCompleta) || empty($tipoCarrera) || empty($imagen)) {
            echo "Todos los campos son obligatorios.";
            return;
        }

        if ($this->CarrerasModel->agregarCarrera($nombreCarrera, $descripcion, $descripcionCompleta, $tipoCarrera, $imagen)) {
            // Redirigir después de agregar
             $data = ['mensaje' => 'Carrera creada exitosamente.'];
           $this->view('pages/auth/agregarCarrera', $data);
            
        } else {
            $data = [
                'errorRegistro' => 'Error al agregar la carrera.',
            ];
            $this->view('pages/auth/agregarCarrera', $data);
        }
    } else {
        $data = [
            'tipoUsuario' => $_SESSION['tipoUsuario'],
            'Nombre' => $_SESSION['Nombre']
        ];
        $this->view('pages/auth/agregarCarrera', $data);
    }
}
}

?>


