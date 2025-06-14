<?php
class AuthController extends BaseController {
    public function __construct() {
        $this->modelo = $this->model('usuariosModel');
    }

    // Procesar lsitado
    public function listadoUsuarios() {

      $datas = [
        'email' => NULL,
        'tipo' => NULL,
        'estado' => NULL
      ];

      $errores = [];

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $datas['email'] = trim($_POST['email']);
        $datas['tipo'] = trim($_POST['tipo']);
        $datas['estado'] = trim($_POST['estado']);

          // Validaciones
        if (!filter_var($datas['email'], FILTER_VALIDATE_EMAIL)) {
          $errores['email'] = 'El email no es válido';
        }

        if ($datas['tipo'] == 'Seleccione un tipo de usuario.') {
          $errores['tipo'] = 'Debe seleccionar un tipo de usuario';
        }

        if ($datas['estado'] == 'Seleccione un estado.') {
          $errores['tipo'] = 'Debe seleccionar un estado de usuario';
        }

        if (empty($errores)) {
          $res = $this->modelo->listadoUsuarios($datas);

          if ($res->resultado_proceso == 1) {
            $this->view('pages/dashboard/dashboard_admin', 1);
            exit;
          }
          else {
            $mensaje_proceso = $res->mensaje_proceso;
            switch ($mensaje_proceso) {
              case "email_usuario no existente":
                $errores['general'] = "No existe usuario con el email ingresado.";
                break;
              case "nombre_tipo_usuario no existente":
                $errores['general'] = "No existen usuarios con el tipo de usuario seleccionado.";
                break;
              case "nombre_estado_usuario no existente":
                $errores['general'] = "No existen usuarios con el estado de usuario seleccionado.";
                break; 
              default:
                $errores['general'] = "Error desconocido al crear el usuario.";
                break;
            }
          }
        }
      }

      $this->view('pages/dashboard/dashboard_usuarios', ['datas' => $datas, 'errores' => $errores, 'usuarios' => $usuarios]);
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