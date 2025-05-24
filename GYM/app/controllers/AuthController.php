<?php
// UsuarioController.php
class AuthController extends BaseController{

    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuarios();
    }

    public function index() {
    $this->forgotPassword();
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
            require_once RUTA_VIEWS . '/pages/auth/register.php';
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
  

public function forgotPassword() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';

        if (empty($email)) {
            echo "El email es obligatorio.";
            return;
        }

        $usuario = $this->usuarioModel->obtenerUsuarioPorEmail($email);
        if (!$usuario) {
            echo "No se encontró un usuario con ese email.";
            return;
        }

        $codigo = rand(100000, 999999);
        if ($this->usuarioModel->guardarCodigoRecuperacion($email, $codigo)) {
            require_once __DIR__ . '/../../utils/Mailer.php';

            if (Mailer::enviarCodigoRecuperacion($email, $codigo)) {
                header('Location: /recover-step2?email=' . urlencode($email));
                exit();
            } else {
                echo "Error al enviar el correo.";
            }
        }
    } else {
        require_once __DIR__ . '/../views/pages/auth/recoverPassword.php';

    }
}

public function resetPassword($codigo = null, $email = null) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $codigo = isset($_POST['codigo']) ? trim($_POST['codigo']) : '';
        $nuevaPassword = isset($_POST['nueva_password']) ? trim($_POST['nueva_password']) : '';
        $repetirPassword = isset($_POST['repetir_password']) ? trim($_POST['repetir_password']) : '';

        if (empty($email) || empty($codigo) || empty($nuevaPassword) || empty($repetirPassword)) {
            echo "Todos los campos son obligatorios.";
            return;
        }

        if ($nuevaPassword !== $repetirPassword) {
            echo "Las contraseñas no coinciden.";
            return;
        }

        if ($this->usuarioModel->validarCodigo($email, $codigo)) {
            $hash = password_hash($nuevaPassword, PASSWORD_DEFAULT);
            if ($this->usuarioModel->actualizarPassword($email, $hash)) {
                echo "Contraseña actualizada exitosamente.";
                header('Location: /login');
                exit();
            } else {
                echo "Error al actualizar la contraseña.";
            }
        } else {
            echo "Código incorrecto.";
        }
    } else {
        require_once 'views/pages/auth/forgotPassword.php';
    }
}

    
}
?>