<?php

class Usuarios extends BaseController {

    public function __construct() {}

    // Login
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            // Datos simulados (reemplazá esto con base de datos en el futuro)
            $usuarios = [
                'alumno'  => '1234',
                'docente' => 'abcd',
                'admin'   => 'admin123'
            ];

            if (isset($usuarios[$username]) && $usuarios[$username] === $password) {
                echo "Login correcto. Bienvenido, $username";
                exit;
            } else {
                $datos = ['error' => 'Usuario o contraseña incorrectos'];
                $this->view('usuarios/login', $datos);
            }
        } else {
            $datos = ['error' => ''];
            $this->view('usuarios/login', $datos);
        }
    }

    // Mostrar vista "¿Olvidaste tu contraseña?"
public function olvide() {
    $this->view('usuarios/olvide_mi_contraseña'); // Asegúrate de que la vista se llame correctamente
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

            $this->view('usuarios/olvide', $data);
        } else {
            $this->view('usuarios/olvide');
        }
    }

    // Podés agregar esto si querés una vista de restablecimiento
    public function restablecer() {
        echo "Formulario de restablecimiento (pendiente)";
    }
}
