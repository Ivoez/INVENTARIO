<?php
class AlumnoController extends BaseController {
    private $AlumnoModel;

    public function __construct() {
        $this->AlumnoModel = $this->model('AlumnoModel');

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function verCarreras() {
        if (!isset($_SESSION['tipoUsuario']) || $_SESSION['tipoUsuario'] != 'Alumno') {
            $this->view('pages/auth/login');
            return;
        }

        $carreras = $this->AlumnoModel->obtenerCarrerasDisponibles();

        $data = [
            'carreras' => $carreras,
            'Nombre' => $_SESSION['Nombre']
        ];

        $this->view('pages/alumno/verCarreras', $data);
    }

    public function inscribirse($idCarrera) {
        if (!isset($_SESSION['idUsuario']) || $_SESSION['tipoUsuario'] != 'Alumno') {
            $this->view('pages/auth/login');
            return;
        }

        $idAlumno = $_SESSION['idUsuario'];

        if ($this->AlumnoModel->inscribirseCarrera($idAlumno, $idCarrera)) {
    // Redirige al dashboard
    
        $this->view('pages/alumno/dashboard', [
        'Nombre' => $_SESSION['Nombre'],
        'mensaje' => 'Inscripción exitosa.'
    ]);
}       else {
             $this->view('pages/alumno/verCarreras', [
             'error' => 'Error al inscribirse.'
    ]);
}

       
    }
}
?>
