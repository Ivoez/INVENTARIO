<?php
class proveedorController extends BaseController {
  public function __construct() {
      $this->modelo = $this->model('proveedorModel');
  }

    // formulario para crear un nuevo proveedor
    public function agregar_proveedor() {
      $datas = [];
      $errores = [];

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {            
        $razon_social = trim($_POST['razon_social']);
        $CUIT = trim($_POST['CUIT']);
        $direccion = trim($_POST['direccion']);
        $telefono = trim($_POST['telefono']);
        $email = trim($_POST['email']);
        $estado = $this->modelo->devolver_estado_por_nombre('Activo')->id_estado_proveedor;
  
        // Validaciones
        if (empty($razon_social)) {
          $errores['razon_social'] = 'La razón social es requerida';
        }
  
        if (strlen($CUIT) < 8) {
          $errores['CUIT'] = 'El CUIT debe tener un mínimo de 11 caracterés.';
        }
  
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errores['email'] = 'El email no es válido';
        }
  
        if (empty($errores)) {
          $datas= [
            'razon_social_proveedor' => $razon_social,
            'CUIT_proveedor' => $CUIT,
            'direccion_proveedor' => $direccion,
            'telefono_proveedor' => $telefono,
            'email_personal_proveedor' => $email,
            'estado_proveedor_id' => $estado
          ];
  
          $auth = $this->modelo->buscar_por_mail($datas);
          if (empty($auth)){
            if($this->modelo->crear_proveedor($datas)){
              $this->view('pages/dashboard/dashboard_agregar_proveedor');
            }else{
              $errores['general'] = 'No se pudo crear el proveedor.';
              $this->view('pages/dashboard/dashboard_agregar_proveedor', ['datas' => $datas, 'errores' => $errores]);
            }
          }else{
            $errores['general'] = "Ya existe un proveedor con ese email.";
            $this->view('pages/dashboard/dashboard_agregar_proveedor', ['datas' => $datas, 'errores' => $errores]);
          }
        }
      }
      $this->view('pages/dashboard/dashboard_agregar_proveedor', ['datas' => $datas, 'errores' => $errores]);
    }

}