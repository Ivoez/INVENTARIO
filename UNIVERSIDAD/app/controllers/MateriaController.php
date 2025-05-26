<?php
class MateriaController extends BaseController{
    private $materiaModel;
    private $carreraModel;
    private $usuarioModel;
    private $materiaDictadoModel;

    public function __construct() {
        $this->materiaModel = $this->model('MateriaModel');
        $this->carreraModel =  $this->model('CarrerasModel'); 
        $this->usuarioModel = $this->model('UsuarioModel');
        $this->materiaDictadoModel = $this->model('MateriaDictadoModel');
    }

    //Metodo para cargar la vista crear.php
    public function crear() {
        $this->view('pages/materia/crear');
    }

    //Metodo para crear una Materia en la vista crear.php
    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombreMateria = trim($_POST['nombreMateria'] ?? '');
    
            if ($nombreMateria === '') {
                $data = ['mensaje' => 'El nombre de la materia es obligatorio.'];
                $this->view('pages/materia/crear', $data);
                exit;
            }
    
            // Verificar si la materia ya existe
            if ($this->materiaModel->existeMateria($nombreMateria)) {
                $data = ['mensaje' => 'Ya existe una materia con ese nombre.'];
                $this->view('pages/materia/crear', $data);
                exit;
            }
    
            // Crear la materia
            $idMateria = $this->materiaModel->crearMateria($nombreMateria);
            if ($idMateria) {
                $data = ['mensaje' => 'Materia creada exitosamente.'];
            } else {
                $data = ['mensaje' => 'Error al guardar la materia.'];
            }
    
            $this->view('pages/materia/crear', $data);
            exit;
        }
    }
    
    //Metodo para cargar las materias, carreras y profesores en la vista vincular.php
    public function vincular() {
        $materias = $this->materiaModel->obtenerTodasLasMaterias();
        $carreras = $this->carreraModel->obtenerTodasLasCarreras();
        $profesores = $this->usuarioModel->obtenerProfesores();

      //  var_dump($materias, $carreras, $profesores); exit;  // Temporal para ver qué contienen
       $this->view('pages/materia/vincular', [   
        'materias' => $materias,
        'carreras' => $carreras,
        'profesores' => $profesores
    ]);
    }

    //Metodo para la Planificacion de las Materias 
    public function vincularGuardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idMateria = $_POST['idMateria'] ?? null;
            $idCarrera = $_POST['idCarrera'] ?? null;
            $idProfesor = $_POST['idProfesor'] ?? null;
            $cuatrimestre = $_POST['cuatrimestre'] ?? null;
            $turno = $_POST['turno'] ?? null;
            $diaCursada = $_POST['diaCursada'] ?? null;

            // Carga siempre las listas para la vista
            $materias = $this->materiaModel->obtenerTodasLasMaterias();
            $carreras = $this->carreraModel->obtenerTodasLasCarreras();
            $profesores = $this->usuarioModel->obtenerProfesores();

            if ($idMateria && $idCarrera && $idProfesor && $cuatrimestre && $turno && $diaCursada) {
            $ok = $this->materiaDictadoModel->asignarMateriaACarrera($idMateria, $idCarrera, $idProfesor, $cuatrimestre, $turno, $diaCursada);
            if ($ok) {
                $data['mensaje_exito'] = "Materia vinculada correctamente.";
            } else {
                $data['mensaje_error'] = "Error al vincular la materia.";
            }
        } else {
            $data['mensaje_error'] = "Complete todos los campos.";
        }

        // Enviar todas las variables a la vista
        $data['materias'] = $materias;
        $data['carreras'] = $carreras;
        $data['profesores'] = $profesores;

        $this->view('pages/materia/vincular', $data);
        }
    }
}
