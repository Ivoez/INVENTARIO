<?php
class AuthController extends BaseController {
    public function __construct() {
        $this->modelo = $this->model('AuthModel');
    }

    // Procesar login (POST)
    public function loginUsuario() {
      $datas = [
        'email_usuario' => '',
        'pass_usuario' => ''
      ];
      $errores = [];
      
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $datas['email_usuario'] = trim($_POST['email']);
        $datas['pass_usuario'] = trim($_POST['password']);
        
        if (!filter_var($datas['email_usuario'], FILTER_VALIDATE_EMAIL)) {
          $errores['email'] = 'El email no es válido';
        }

        if (strlen($datas['pass_usuario']) < 8) {
          $errores['password'] = 'La contraseña debe tener al menos 8 caracteres';
        }
        if (empty($errores)) {

          $res = $this->modelo->login($datas);
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

      $this->view('pages/auth/Login', ['datas' => $datas, 'errores' => $errores]);
    }


    // Procesar registro
    public function register() {

      $datas = [
        'nombre' => NULL,
        'apellido' => NULL,
        'DNI' => NULL,
        'pass' => NULL,
        'email' => NULL,
        'avatar' => NULL,
        'tipo' => NULL,
        'estado' => NULL
      ];

      $errores = [];

      // Envío a view todos los tipos de usuario
      $tipos_usuario = $this->modelo->obtener_tipos_usuario();

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
        $datas['nombre'] = trim($_POST['nombre']);
        $datas['apellido'] = trim($_POST['apellido']);
        $datas['DNI'] = trim($_POST['DNI']);
        $datas['pass'] = trim($_POST['pass']);
        $datas['email'] = trim($_POST['email']);
        $datas['avatar'] = trim($_POST['avatar']);
        $datas['tipo'] = trim($_POST['tipo']);

          // Validaciones
        if (empty($datas['nombre'])) {
          $errores['nombre'] = 'El nombre de usuario es requerido';
        }

        if (empty($datas['apellido'])) {
          $errores['apellido'] = 'El apellido de usuario es requerido';
        }

        if (strlen($datas['DNI'] < 8)) {
          $errores['DNI'] = 'El DNI debe tener un mínimo de 8 caracterés.';
        }
            
        if (strlen($datas['pass']) < 8) {
          $errores['pass'] = 'La contraseña debe tener al menos 8 caracteres';
        }

        if (!filter_var($datas['email'], FILTER_VALIDATE_EMAIL)) {
          $errores['email'] = 'El email no es válido';
        }

        if ($datas['tipo'] == 'Seleccione un tipo de usuario.') {
          $errores['tipo'] = 'Debe seleccionar un tipo de usuario';
      }

        if (empty($errores)) {
          $res = $this->modelo->crear_usuario($datas);

          if ($res->resultado_proceso == 1) {
            header('Location: ' . RUTA_URL . '/AuthController/loginUsuario');
            exit;
          }
          else {
            $mensaje_proceso = $res->mensaje_proceso;
            switch ($mensaje_proceso) {
              case "DNI_usuario existente":
                $errores['general'] = "Ya existe un usuario registrado con el DNI ingresado.";
                break;
              case "email_usuario existente":
                $errores['general'] = "Ya existe un usuario registrado con el email ingresado.";
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

      $this->view('pages/auth/Register', ['datas' => $datas, 'errores' => $errores, 'tipos_usuario' => $tipos_usuario]);
    }

    // Cerrar sesión
    public function logout() {
    session_start();
    session_unset();      // Limpia todas las variables de sesión
    session_destroy();  
    header('Location: ' . RUTA_URL . '/AuthController/loginUsuario');
    exit;
}

}
?>
