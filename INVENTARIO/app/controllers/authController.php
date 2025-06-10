<?php
class AuthController extends BaseController {
    public function __construct() {
        $this->modelo = $this->model('AuthModel');
    }

    // Procesar login (POST)
    public function loginUsuario() {
      $data = [
        'email_usuario' => '',
        'pass_usuario' => ''
      ];
      $errores = [];
      
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data['email_usuario'] = trim($_POST['email']);
        $data['pass_usuario'] = trim($_POST['password']);
        
        if (!filter_var($data['email_usuario'], FILTER_VALIDATE_EMAIL)) {
          $errores['email'] = 'El email no es válido';
        }

        if (strlen($data['pass_usuario']) < 8) {
          $errores['password'] = 'La contraseña debe tener al menos 8 caracteres';
        }
        if (empty($errores)) {

          $res = $this->modelo->login($data);
          if ($res->resultado_proceso == 1) {
            if($res->nombre_tipo_usuario == 'Administrador'){
              $this->view('pages/dashboard/dashboard_admin');
            } else {
              $this->view('pages/dashboard/dashboard_empleado');
            }
            exit;
          }
          else {
            $mensaje_proceso = $res->mensaje_proceso;
            switch ($mensaje_proceso) {
              case "'email_usuario no existente":
                $errores['general'] = "El email o contraseña no cohinciden.";
                break;
              case "pass_usuario incorrecta":
                $errores['general'] = "El email o contraseña no cohinciden.";
                break;
              default:
                $errores['general'] = "Error desconocido al intentar logearse.";
                break;
            }
          }
        }
      }

      $this->view('pages/auth/Login', ['data' => $data, 'errores' => $errores]);
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
          $data['avatar_usuario'] = trim($_POST['avatar']);
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

            $res = $this->modelo->crear_usuario($data);

            if ($res->resultado_proceso == 1) {
              header('Location: ' . RUTA_URL . '/AuthController/loginUsuario');
              exit;
            }
            else {
              $mensaje_proceso = $res->mensaje_proceso;
              switch ($mensaje_proceso) {
                case "nombre_usuario existente":
                  $errores['general'] = "Nombre de usuario existente.";
                  break;
                case "email_usuario existente":
                  $errores['general'] = "Email existente.";
                  break;
                case "avatar_usuario existente":
                  $errores['general'] = "Avatar existente.";
                  break;
                case "nombre_tipo_usuario incorrecto":
                  $errores['general'] = "Tipo de usuario icorrecto.";
                  break; 
                case "nombre_estado_usuario incorrecto":
                  $errores['general'] = "Estado de usuario icorrecto.";
                  break;
                default:
                  $errores['general'] = "Error desconocido al crear el usuario.";
                  break;
              }
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
