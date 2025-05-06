<?php

class AuthController extends BaseController {

    public function __construct() {
        $this->authModel=$this->model('AuthModel');
    }
    //login retorna la vista
    public function login(){
        $data = [
            'errorLogin'=>'',
        ];
        $this->view('pages/auth/login', $data);
    }

    //Vista Informacion.php
    public function informacion() {
        $this->view('pages/auth/Informacion');
    }
    

    // Login
    public function loginUsuario() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'Email' => $_POST['Email'],
                'pass' => $_POST['password'],
            ];
            $UsuarioEncontrado = $this->authModel->buscarPorMail($data);
            if($UsuarioEncontrado){
                //CON HASH password_verify($data['pass'], $UsuarioEncontrado->ContraUsuario)
                if ($data['pass'] === $UsuarioEncontrado->ContraUsuario){ 
                    $_SESSION['idUsuario']=$UsuarioEncontrado->idUsuario;
                    $_SESSION['NombreUsuario']=$UsuarioEncontrado->NombreUsuario;
                    $_SESSION['Nombre']=$UsuarioEncontrado->Nombre;
                    $_SESSION['Apellido']=$UsuarioEncontrado->Apellido;
                    $_SESSION['DNI']=$UsuarioEncontrado->DNI;
                    $_SESSION['Email']=$UsuarioEncontrado->Email;
                    $_SESSION['tipoUsuario']=$UsuarioEncontrado->tipoUsuario;
                    $_SESSION['telefono']=$UsuarioEncontrado->telefono;
                    $_SESSION['fotoDePerfil']=$UsuarioEncontrado->fotoDePerfil;
                    $_SESSION['activo']=$UsuarioEncontrado->activo;
                    $_SESSION['ContraUsuario']=$UsuarioEncontrado->ContraUsuario;

                    $data = [
                        'Nombre' => $UsuarioEncontrado->Nombre,
                        'tipoUsuario' => $UsuarioEncontrado->tipoUsuario,
                    ];
                    if($data['tipoUsuario'] == 'admin'){
                        $this->view('pages/admin/dashboard', $data);
                        exit();
                    }else if($data['tipoUsuario'] == 'Profesor'){
                        $this->view('pages/profesor/dashboard', $data);
                        exit();
                    }else{
                        $this->view('pages/alumno/dashboard', $data);
                        exit();
                    }
                     // o $this->view('pages/dashboard/dashboard');
                    //header('Location: ' . RUTA_APP . '/app/views/pages/dashboard');
                    
                }else{
                    $data = [
                        'errorLogin' => '<div class="alert alert-danger" role="alert">
                        Usuario o contraseña incorrectos.1
                      </div>',
                    ];
                    $this->view('pages/auth/login',$data);
                }
            }else{
                $data = [
                    'errorLogin' => '<div class="alert alert-danger" role="alert">
                    Usuario o contraseña incorrectos.2
                  </div>',
                ];
                $this->view('pages/auth/login',$data);
            }
            
        }else{
            $this->login();
        }          // NombreUsuario, Nombre, Apellido, DNI, Email, tipoUsuario, telefono, fotoDePerfil ,activo, aes_decrypt(ContraUsuario, 'keyword') AS ContraUsuario
    }
    //mostra dashboard
    
    // Mostrar vista "¿Olvidaste tu contraseña?"
public function olvide() {
    $data=[
        'email'=> '',
        'error'=> '',
    ];
    $this->view('pages/auth/olvide_mi_contraseña', $data); // Asegúrate de que la vista se llame correctamente
}

//mostrar vista de registro usuario
public function registrarUsuario() {
    $data=[
        
    ];
    $this->view('pages/auth/registrarUsuario', $data); // Asegúrate de que la vista se llame correctamente
}    
    





    // Procesa el formulario de recuperación
    public function enviarCorreo() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);

            // Simulación de búsqueda de usuario por correo
            $usuariosRegistrados = ['usuario@ejemplo.com'];

            if (in_array($email, $usuariosRegistrados)) {
                // Enlace ficticio
                $enlace = RUTA_URL . "/usuarios/restablecer";
                $mensaje = "Hacé clic aquí para restablecer tu contraseña: $enlace";

                // mail($email, "Recuperación de contraseña", $mensaje); // si tenés configurado mail
                $data['success'] = "Te enviamos un enlace de recuperación al correo.";
            } else {
                $data['error'] = "El correo no está registrado.";
            }

            $this->view('pages/auth/olvide_mi_contraseña', $data);
        } else {
            $this->view('pages/auth/olvide_mi_contraseña');
        }
    }

    // /* Función para llamar a la vista actualizarContraseña con blanqueo de errores*/
    public function actualizarVistaContraseña() {
        $data = [
            'mail' => '',
            'errorMail' => '',
        ];
        $this->view('pages/auth/actualizarContraseña');
    }

    public function actualizarContraseña() {
        
    }


    public function logout() {
        // Iniciar la sesión si aún no ha sido iniciada
        //session_start();
    
        // Eliminar todas las variables de sesión
        session_unset();
    
        // Destruir la sesión actual
        session_destroy();
    
        // Redirigir al usuario a la página de login
        $this->view('pages/auth/login');
        exit;
    }
    
}
