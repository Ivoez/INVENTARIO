<?php
class Pages extends BaseController {
    private $CarrerasModel;

    public function __construct() {
        $this->CarrerasModel = $this->model('CarrerasModel');
    }

    public function index() {

        $data = [
            "title" => "Bienvenido"
        ];
        $this->view('pages/index', $data);
    }

    public function infoCursos() {
        $cursos = $this->CarrerasModel->obtenerCursos();

        $data['cursos'] = array_map(function($curso) {
            return [
                'titulo' => $curso->nombreCarrera,
                'descripcion' => $curso->descripcionMuestra,
                'imagen' => $curso->rutaImagenMuestra,
                'descripcionCompleta' => $curso->descripcionCompletaSideBar
            ];
        }, $cursos);

        $data['title'] = 'Cursos disponibles';

        $this->view('pages/infoCarreras/infoCursos', $data);
    }

    public function AdminMenu(){
        $data=[
                      'tipoUsuario' => $_SESSION['tipoUsuario'],
                      'Nombre' => $_SESSION['Nombre']
                ];
           $this->view('pages/admin/dashboard', $data);
           // exit();
    }


    public function infoCarrerasDeGrado() {
    
        $carreras = $this->CarrerasModel->obtenerCarrerasDeGrado();
        $data['infoCarrerasDeGrado'] = array_map(function($carrera) {
            return [
                'titulo' => $carrera->nombreCarrera,  
                'descripcion' => $carrera->descripcionMuestra,
                'imagen' => $carrera->rutaImagenMuestra,
                'descripcionCompleta' => $carrera->descripcionCompletaSideBar
            ];
        }, $carreras);
    
        $data['title'] = 'Carreras de Grado';
    
       
        $this->view('pages/infoCarreras/infoCarrerasDeGrado', $data);
    }
    
    public function infoPostGrado() {
        
        $carreras = $this->CarrerasModel->obtenerCarrerasDePostGrado();
    
        $data['infoPostGrado'] = array_map(function($carrera) {
            return [
                'titulo' => $carrera->nombreCarrera, 
                'descripcion' => $carrera->descripcionMuestra,
                'imagen' => $carrera->rutaImagenMuestra,
                'descripcionCompleta' => $carrera->descripcionCompletaSideBar
            ];
        }, $carreras);
        
        $data['title'] = 'Carreras de Postgrado';
    
        $this->view('pages/infoCarreras/infoPostGrado', $data);
    }
    
    //Funcion para Preguntas Frecuentes 
    public function preguntasFrecuentes() {
    $this->view('pages/infoCarreras/preguntasFrecuentes');

    }


    //Vistas Dashboard Profesor y enlaces.

    public function dashboard() {
    if (!isset($_SESSION['tipoUsuario']) || $_SESSION['tipoUsuario'] !== 'Profesor') {
        header('Location: ' . RUTA_URL . '/AuthController/login');
        exit;
    }

    require RUTA_APP . 'pages/profesor/dashboard';
}


     // Mostrar vista de Mis Materias
    public function materias() {
        $this->view('pages/profesor/materias');
    }

    // Mostrar vista de Evaluaciones
    public function evaluaciones() {
        $this->view('pages/profesor/evaluaciones');
    }

    // Mostrar vista de Asistencia
    public function calendario() {
        $this->view('pages/profesor/calendario');
    }


// Dashboard Alumno
 public function dashboardAlumno() {
    $alumnoModel = $this->model('AlumnoModel');

    $grado = $alumnoModel->obtenerCarrerasGrado();
    $posgrado = $alumnoModel->obtenerCarrerasPosgrado();
    $cursos = $alumnoModel->obtenerCursos();

    $datos = [
        'grado' => $grado,
        'posgrado' => $posgrado,
        'cursos' => $cursos,
        'mensaje' => ''
    ];

    // Renderizar la vista con los datos
    $this->view('alumno/dashboard', $datos);
}

}


?>
