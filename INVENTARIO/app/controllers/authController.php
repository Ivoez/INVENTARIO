<?php
class AuthController extends BaseController {
    public function __construct() {
        $this->modelo = $this->model('AuthModel');
    }

    // Mostrar formulario de login
    public function login() {
        $this->view('pages/auth/login', ['data' => [], 'errores' => []]);
    }

    // Procesar login (POST)
    public function loginUsuario() {
        $errores = [];
        $data = [
            'email_usuario' => '',
            'pass_usuario' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data['email_usuario'] = trim($_POST['email']);
            $data['pass_usuario'] = trim($_POST['password']);

            // Verificar credenciales
            $usuario = $this->modelo->login($data['email_usuario'], $data['pass_usuario']);

            if ($usuario) {
                // Iniciar sesión
                $_SESSION['id_usuario'] = $usuario->id_usuario;
                $_SESSION['nombre_usuario'] = $usuario->nombre_usuario;
                $_SESSION['tipo_usuario'] = $usuario->tipo_usuario;

                // Redirigir al dashboard o página principal
                header('Location: ' . RUTA_URL . '/DashboardController');
                exit;
            } else {
                $errores['login'] = "Email o contraseña incorrectos";
            }
        }

        $this->view('pages/auth/login', ['data' => $data, 'errores' => $errores]);
    }

    // Procesar registro
    public function register() {
        $data = [
            'nombre_usuario' => '',
            'pass_usuario' => '',
            'email_usuario' => '',
            'avatar_usuario' => '',
            'tipo_usuario' => '',
            'estado_usuario' => 'Activo'
        ];

        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data['nombre_usuario'] = trim($_POST['usuario']);
            $data['pass_usuario'] = trim($_POST['password']);
            $data['email_usuario'] = trim($_POST['email']);
            $data['avatar_usuario'] = trim($_POST['avatar']) ?: 'default.png';
            $data['tipo_usuario'] = trim($_POST['tipo_usuario']);

            // Validaciones
            if (empty($data['nombre_usuario'])) {
                $errores['usuario'] = 'El nombre de usuario es requerido';
            }

            if (strlen($data['pass_usuario']) < 8) {
                $errores['password'] = 'La contraseña debe tener al menos 8 caracteres';
            }

            if (!filter_var($data['email_usuario'], FILTER_VALIDATE_EMAIL)) {
                $errores['email'] = 'El email no es válido';
            }

            if (empty($errores)) {
                // Hashear contraseña
                $data['pass_usuario'] = password_hash($data['pass_usuario'], PASSWORD_DEFAULT);

                $res = $this->modelo->crear_usuario($data);

                if ($res->resultado_proceso == 1) {
                    $_SESSION['mensaje_exito'] = 'Registro exitoso. Por favor inicia sesión.';
                    header('Location: ' . RUTA_URL . '/AuthController/login');
                    exit;
                } else {
                    $errores['general'] = $res->mensaje_proceso;
                }
            }
        }

        $this->view('pages/auth/Register', ['data' => $data, 'errores' => $errores]);
    }

    // Cerrar sesión
    public function logout() {
        session_destroy();
        header('Location: ' . RUTA_URL . '/AuthController/login');
        exit;
    }
}
?>
