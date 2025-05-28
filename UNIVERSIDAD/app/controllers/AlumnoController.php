<?php
class AlumnoController extends BaseController {
    private $AlumnoModel;

    public function __construct() {
        $this->AlumnoModel = $this->model('AlumnoModel');

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function dashboard() {
        if (!isset($_SESSION['idUsuario']) || $_SESSION['tipoUsuario'] != 'Alumno') {
            $this->view('pages/auth/login');
            return;
        }

        $idAlumno = $_SESSION['idUsuario'];

        // ✅ Cargar las carreras inscriptas por tipo
        $grado = $this->AlumnoModel->obtenerCarrerasInscripto($idAlumno, 'Grado');
        $postgrado = $this->AlumnoModel->obtenerCarrerasInscripto($idAlumno, 'Posgrado');
        $cursos = $this->AlumnoModel->obtenerCarrerasInscripto($idAlumno, 'Curso');

        $data = [
            'grado' => $grado,
            'postgrado' => $postgrado,
            'cursos' => $cursos,
            'Nombre' => $_SESSION['Nombre']
        ];

        $this->view('pages/alumno/dashboard', $data);
    }

    public function inscribirse($idCarrera) {
        if (!isset($_SESSION['idUsuario']) || $_SESSION['tipoUsuario'] != 'Alumno') {
            $this->view('pages/auth/login');
            return;
        }

        $idAlumno = $_SESSION['idUsuario'];

            // 🛡️ Verificar si ya está inscripto
        if ($this->AlumnoModel->yaInscripto($idAlumno, $idCarrera)) {
            $_SESSION['error'] = 'Ya estás inscripto en esta carrera.';
            header('Location: ' . RUTA_URL . '/AlumnoController/verCarreras');
            exit;
    }



        if ($this->AlumnoModel->inscribirseCarrera($idAlumno, $idCarrera)) {
            $_SESSION['mensaje'] = 'Inscripción exitosa.';
        } else {
            $_SESSION['error'] = 'Error al inscribirse.';
        }

        // Redirige al dashboard para ver las inscripciones actualizadas
        header('Location: ' . RUTA_URL . '/AlumnoController/dashboard');
        exit;
    }

    public function desinscribirse($idCarrera) {
        if (!isset($_SESSION['idUsuario']) || $_SESSION['tipoUsuario'] != 'Alumno') {
            $this->view('pages/auth/login');
            return;
        }

        $idAlumno = $_SESSION['idUsuario'];

        if ($this->AlumnoModel->desinscribirseCarrera($idAlumno, $idCarrera)) {
            $_SESSION['mensaje'] = 'Te desinscribiste correctamente.';
        } else {
            $_SESSION['error'] = 'Error al desinscribirse.';
        }

        header('Location: ' . RUTA_URL . '/AlumnoController/dashboard');
        exit;
    }

    public function verCarreras() {
        if (!isset($_SESSION['tipoUsuario']) || $_SESSION['tipoUsuario'] != 'Alumno') {
            $this->view('pages/auth/login');
            return;
        }

        $idAlumno = $_SESSION['idUsuario'];
        $carreras = $this->AlumnoModel->obtenerCarrerasDisponibles();

        $data = [
            'carreras' => $carreras,
            'idAlumno' => $idAlumno,
            'Nombre' => $_SESSION['Nombre']
        ];

        $this->view('pages/alumno/verCarreras', $data);
    }
}
?>
