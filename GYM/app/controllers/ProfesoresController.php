<?php
require_once __DIR__ . '/../core/BaseController.php';
require_once __DIR__ . '/../models/Profesor.php';

class ProfesoresController extends BaseController {
    public function index() {
        $modelo = new Profesor();
        $profesores = $modelo->obtenerTodos();
        require_once __DIR__ . '/../views/admin/profesores/index.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fotoNombre = $_FILES['foto']['name'];
            $fotoTmp = $_FILES['foto']['tmp_name'];
            $rutaRelativa = 'uploads/' . $fotoNombre;
            $rutaDestino = __DIR__ . '/../../public/' . $rutaRelativa;

            if (!file_exists(dirname($rutaDestino))) {
                mkdir(dirname($rutaDestino), 0777, true);
            }

            move_uploaded_file($fotoTmp, $rutaDestino);

            $datos = [
                'nombre' => $_POST['nombre'],
                'apellido' => $_POST['apellido'],
                'dni' => $_POST['dni'],
                'email' => $_POST['email'],
                'celular' => $_POST['celular'],
                'foto' => $rutaRelativa
            ];

            $modelo = new Profesor();
            if ($modelo->existeDni($datos['dni'])) {
                echo "Ya existe un profesor con ese DNI.";
                exit;
            }

            $modelo->guardar($datos);
            header("Location: /appweb_caba_1c_2025/GYM/public/Profesores/index");
            exit;
        }
    }
}
