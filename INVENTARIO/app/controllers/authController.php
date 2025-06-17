<?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
class AuthController extends BaseController {
  public function __construct() {
      $this->modelo = $this->model('authModel');
  }

  // Procesar login (POST)
  public function loginUsuario() {
    $datas = [];
    $errores = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
        $datas = [
            'email_usuario' => trim($_POST['email']),
            'pass_usuario' => trim($_POST['pass'])
        ];
        
        if (!filter_var($datas['email_usuario'], FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = 'El email no es válido';
        }

        if (strlen($datas['pass_usuario']) < 8) {
            $errores['pass'] = 'La contraseña debe tener al menos 8 caracteres';
        }

        if (empty($errores)) {
            $usuario = $this->modelo->buscar_por_mail($datas);

            if ($usuario) {
                if ($usuario->pass == $datas['pass_usuario']) {
                    $_SESSION['id_usuario'] = $usuario->id_usuario;
                    

                    

                    if ($usuario->nombre_tipo_usuario == 'Administrador') {
                        return $this->view('pages/dashboard/dashboard_admin');
                    } else {
                        return $this->view('pages/dashboard/dashboard_empleado');
                    }
                } else {
                    $errores['general'] = "El email o contraseña incorrecta.";
                }
            } else {
                $errores['general'] = "El email o contraseña incorrecta.";
            }
        }

        return $this->view('pages/auth/Login', ['datas' => $datas, 'errores' => $errores]); //segundo inicio segun
    }

   
    return $this->view('pages/auth/Login', ['datas' => $datas, 'errores' => $errores]);  //primer inicio en el login 
}
  // Procesar registro
  public function register() {

    $tipos_usuario = $this->modelo->buscar_tipos();
    $datas = [];
    $errores = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {            
      $nombre = trim($_POST['nombre']);
      $apellido = trim($_POST['apellido']);
      $dni = trim($_POST['DNI']);
      $pass = trim($_POST['pass']);
      $email = trim($_POST['email']);
      $avatar = $_FILES['avatar']['name'];
      $image_type = $_FILES['avatar']['type'];
      $image_size = $_FILES['avatar']['size'];
      $ubi = $_SERVER['DOCUMENT_ROOT'] . RUTA_AVATAR;
      $nombre_tipo = trim($_POST['tipo']);

      if ($avatar != ''){
        if($image_size <= 10000000){
            if ($image_type == 'image/jpg' || $image_type == 'image/jpeg' || $image_type == 'image/png') {
              move_uploaded_file($_FILES['avatar']['tmp_name'], $ubi . $avatar);
            }else{
              $errores['error_tipo'] = 'El tipo de imagen debe ser jpg, jpeg o png.';
            }
        }else{
          $errores['error_megas'] = 'El tamaño de la imagen es demasiado grande';
        }
      }else{
        $avatar ='img_default.png';
      }
      // Validaciones
      if (empty($nombre)) {
        $errores['nombre'] = 'El nombre de usuario es requerido';
      }

      if (empty($apellido)) {
        $errores['apellido'] = 'El apellido de usuario es requerido';
      }

      if (strlen($dni) < 8) {
        $errores['DNI'] = 'El DNI debe tener un mínimo de 8 caracterés.';
      }
          
      if (strlen($pass) < 8) {
        $errores['pass'] = 'La contraseña debe tener al menos 8 caracteres';
      }

      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = 'El email no es válido';
      }

      if ($nombre_tipo == 'Seleccione un tipo de usuario') {
        $errores['tipo'] = 'Debe seleccionar un tipo de usuario';
      }

      if (empty($errores)) {
        $tipo = $this->modelo->devolver_tipo_por_nombre($nombre_tipo)->id_tipo_usuario;
        $estado = $this->modelo->devolver_estado_por_nombre('Activo')->id_estado_usuario;
        $datas = [
          'nombre_usuario' => $nombre,
          'apellido_usuario' =>$apellido,
          'DNI_usuario' =>$dni,
          'avatar_usuario' => $avatar,
          'email_usuario' => $email,
          'pass_usuario' => $pass,
          'tipo_usuario_id' => $tipo,
          'estado_usuario_id' => $estado
        ];

        $auth = $this->modelo->buscar_por_mail($datas);
        if (empty($auth)){
          if($this->modelo->crear_usuario($datas)){
            $this->view('pages/dashboard/dashboard_admin');
          }else{
            $errores['general'] = 'No se pudo crear el usuario.';
            $this->view('pages/auth/Register', ['datas' => $datas, 'errores' => $errores, 'tipos_usuario' => $tipos_usuario]);
          }
        }else{
          $errores['general'] = "Ya existe un usuario con ese email.";
          $this->view('pages/auth/Register', ['datas' => $datas, 'errores' => $errores, 'tipos_usuario' => $tipos_usuario]);
        }
      }
    }
    $this->view('pages/auth/Register', ['datas' => $datas, 'errores' => $errores, 'tipos_usuario' => $tipos_usuario]);

  }

    public function listarUsuarios() {
    $modelo = $this->model('authModel');
    $usuarios = $modelo->buscar_usuarios();

    $data = ['usuarios' => $usuarios];
    $this->view('formularios/formListadoUsuario', $data);
}

  // Cerrar sesión
  public function logout() {
    session_unset();      // Limpia todas las variables de sesión
    session_destroy();  
    $this->view('pages/auth/Login');
    exit;
  }

 public function recuperarContrasena() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = trim($_POST['email']);

        $usuario = $this->modelo->buscar_por_mail(['email_usuario' => $email]);

        if (!$usuario) {
            $this->view('pages/auth/forgotPassword', [
                'mensaje' => 'El correo no está registrado.'
            ]);
            return;
        }

        $nuevaPass = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'), 0, 8);
        $this->modelo->change_pass($nuevaPass, $email);

        include(RUTA_APP."/external/Mailer/src/PHPMailer.php");
        include(RUTA_APP."/external/Mailer/src/SMTP.php");
        include(RUTA_APP."/external/Mailer/src/Exception.php");

       

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'noreply.inventariorst@gmail.com';
            $mail->Password = 'zmau dmyg jhkk vnqo';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('noreply.inventariorst@gmail.com', 'Administrador Inventario');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Reseteo de password';
            $mail->Body = "
                <p>Hola,</p>
                <p>Tu nueva contraseña temporal es: <strong>$nuevaPass</strong></p>
                <p>Usala para ingresar al sistema. Luego podrás cambiarla.</p>
            ";

            $mail->send();
            $mensaje = "Revisá tu correo. Te enviamos una nueva contraseña.";
        } catch (Exception $e) {
            $mensaje = "No se pudo enviar el correo: " . $mail->ErrorInfo;
        }

        $this->view('pages/auth/forgotPassword', [
            'mensaje' => $mensaje
        ]);
    } else {
        $this->view('pages/auth/forgotPassword', ['mensaje' => '']);
    }
}

}


?>
