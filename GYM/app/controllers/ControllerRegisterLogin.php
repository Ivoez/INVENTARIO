<?php
    class AuthController extends BaseController{

        public function register(){
                $data = [
                    'error_tipo'=>'',
                    'error_megas'=>'',
                    'error_pass'=>'',
                ];
            
            $this->view('pages/auth/register',$data);
        }

        public function registrarUsuario(){
            if ($_SERVER['REQUEST_METHOD']=='POST'){
                $nombre_apellido = $_POST['nombre_apellido'];
                $dni = $_POST['dni'];
                $email = $_POST['email'];
                $celular = $_POST['celular'];
                $pass = $_POST['password'];
                $pass2 = $_POST['password2'];

                if ($pass == $pass2){
                    $data= [
                        'nombre_apellido' => $nombre_apellido,
                        'dni' => $dni,
                        'email' => $email,
                        'celular' => $celular,
                        'pass' => $pass,
                        'pass2' => $pass2
                    ];
                    $auth = $this->authModel->buscar_por_mail($data);
                    if (empty($auth)){
                        if($this->authModel->crear_usuario($data)){
                            $this->view('pages/auth/login');
                        }else{
                            die("NO SE PUDO CREAR EL USUARIO");
                        }
                    }else{
                        die("Ya existe una cuenta creada con ese email");
                    }
                    
                }else{
                    $data = [
                        'error_pass' => '<div class="alert alert-danger" role="alert">
                                             Las contraseñas no coinciden
                                        </div>',
                        'error_tipo' =>'',
                        'error_megas'=>'',
                    ];
                    $this->view('pages/auth/register',$data);
                }
        }
    }
        public function resetPassword(){
            
            $data = [
                'mail' => '',
                'error_mail' => '',
            ];      
            $this->view('pages/auth/forgot-password',$data);
        }

        public function enviar_password()
    {
        $email = $_POST['email'];
        $data = [
            'email' => $email,
        ];
                
        if (!empty($this->authModel->buscar_por_mail($data))) {
            $where = "new_pass";
            include(RUTA_APP . "/mails/mail_pass.php");                      
            
        } else {
            $data = [
                "error_mail"=> "<div class='alert alert-danger' role='alert'>
                            <p class = 'text-center'>No es un email válido.</p>
                         </div>",
                "mail"=>'',
            ];
            $this->view('pages/auth/forgot-password', $data);
        }
    }

    public function update_pass(){
        $data = [
            'mail' => '',
            'error_mail'=>'',
            'error_pass'=>'',
        ];
        $this->view('pages/auth/updated-password',$data);
    }

    public function actualizar_password(){
        $email = $_POST['email'];
        $passActual =$_POST['pass_actual'];
        $passNueva = $_POST['pass_nueva'];
        $passNueva2 = $_POST['pass_nueva2'];
        if ($passNueva != $passNueva2){
            $data = [
                'mail' => '',
                'error_mail'=>'',
                'error_pass'=> "<div class='alert alert-danger' role='alert'>
                <p class = 'text-center'>Las contraseñas no coinciden.</p>
             </div>",
            ];
            $this->view('pages/auth/updated-password',$data);
        }else{
            if($this->authModel->change_pass($passNueva, $email)){
                $data = [
                    'mail' => '',
                    'error_mail'=>'',
                    'error_pass'=> "<div class='alert alert-success' role='alert'>
                    <p class = 'text-center'>La contraseña fue actualizada</p>
                 </div>",
                ];
                $this->view('pages/auth/updated-password',$data);
            }
        }

    }

    public function login() {
        $data = [
            'error_login' => '',
            'dni' => '',
        ];
        $this->view('pages/login', $data);
    }
    

        public function loginUsuario(){
            $data = [
                'dni' => $_POST['dni'],
            ];
        
            $usuario = $this->authModel->buscar_por_dni($data);
        
            if ($usuario) {
                if ($_POST['password'] == $usuario->pass) {
                    $_SESSION['id'] = $usuario->id;
                    $_SESSION['nombre'] = $usuario->nombre;
                    
                    $this->view('pages/login', $data);
                } else {
                    $data = [
                        'error_login' => '<div class="alert alert-danger" role="alert">
                        DNI o contraseña incorrectos.
                        </div>',
                    ];
                    $this->view('pages/auth/login', $data);
                }
            } else {
                $data = [
                    'error_login' => '<div class="alert alert-danger" role="alert">
                    DNI o contraseña incorrectos.
                    </div>',
                ];
                $this->view('pages/login', $data);
            }
        }
        
        public function logout()
        {
            session_unset();
            session_destroy();
            
            $this->view('pages/index');
        }  


   }  
?>