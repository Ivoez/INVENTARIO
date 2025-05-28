<?php
require_once __DIR__ . '/../core/BaseController.php';
require_once __DIR__ . '/../models/Actividad.php';
require_once __DIR__ . '/../models/Profesor.php';

class ActividadesController extends BaseController {
    public function index() {
        $actividadModel = new Actividad();
        $profesorModel = new Profesor();
        $actividades = $actividadModel->obtenerTodas();
        $profesores = $profesorModel->obtenerTodos();
        require_once __DIR__ . '/../views/admin/actividades/index.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = [
                'nombre' => $_POST['nombre'],
                'dia' => $_POST['dia'],
                'hora' => $_POST['hora'],
                'profesor_id' => $_POST['profesor_id']
            ];
            $modelo = new Actividad();
            $modelo->guardar($datos);

           header('Location: ' . RUTA_URL . '/Actividades/index');
           exit;
        }
    }

    public function eliminar($id) {
        $modelo = new Actividad();
        $modelo->eliminar($id);
        header('Location: ' . RUTA_URL . '/Actividades/index');
        exit;
    }
}
