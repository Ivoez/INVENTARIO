<?php
// UsuarioController.php
class AuthController extends BaseController{

    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    // Método para registrar un nuevo usuario
    public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtener los datos del formulario
            $datos = [
                'nombre' => isset($_POST['nombre']) ? trim($_POST['nombre']) : '',
                'apellido' => isset($_POST['apellido']) ? trim($_POST['apellido']) : '',
                'dni' => isset($_POST['dni']) ? trim($_POST['dni']) : '',
                'email' => isset($_POST['email']) ? trim($_POST['email']) : '',
                'celular' => isset($_POST['celular']) ? trim($_POST['celular']) : '',
                'password' => isset($_POST['password']) ? password_hash(trim($_POST['password']), PASSWORD_DEFAULT) : ''
                ];

            if (empty($datos['nombre']) || empty($datos['apellido']) || empty($datos['dni']) || empty($datos['email']) || empty($datos['celular']) || empty($datos['password'])) {
                // Validación de campos vacíos
                echo "Todos los campos son obligatorios.";
                return;
            }

            // Intentar registrar al usuario
            if ($this->usuarioModel->registrar($datos)) {
                // Si es exitoso, redirigir a la página de login
                header("Location: /login");
                exit();
            } else {
                echo "Error al registrar al socio.";
            }
        } else {
            // Mostrar vista de registro si la solicitud no es POST
            require_once 'views/usuarios/registro.php';
        }
    }

    // Método para iniciar sesión
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtener los datos del formulario
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (empty($email) || empty($password)) {
                echo "Email y contraseña son obligatorios.";
                return;
            }

            // Intentar iniciar sesión
            $usuario = $this->usuarioModel->login($email, $password);

            if ($usuario) {
                // Guardar datos del usuario en sesión y redirigir
                session_start();
                $_SESSION['usuario'] = $usuario;
                header("Location: /dashboard");
                exit();
            } else {
                echo "Credenciales incorrectas.";
            }
        } else {
            // Mostrar vista de login
            require_once 'views/usuarios/login.php';
        }
    }

    // Método para actualizar la contraseña
    public function actualizarPassword() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = trim($_POST['email']);
            $nuevaPassword = trim($_POST['nueva_password']);
            $nuevaPasswordHash = password_hash($nuevaPassword, PASSWORD_DEFAULT);

            if (empty($email) || empty($nuevaPassword)) {
                echo "Email y nueva contraseña son obligatorios.";
                return;
            }

            // Intentar actualizar la contraseña
            if ($this->usuarioModel->actualizarPassword($email, $nuevaPasswordHash)) {
                echo "Contraseña actualizada exitosamente.";
            } else {
                echo "Error al actualizar la contraseña.";
            }
        } else {
            // Mostrar vista de recuperación de contraseña
            require_once 'views/usuarios/recuperar_contraseña.php';
        }
    }
}
?>