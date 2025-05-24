
<link rel="stylesheet" href="<?php echo RUTA_URL?>public/css/style.css">
<?php require RUTA_APP .'/views/layout/header.php';?>



<title>Registro de Usuarios</title>



<div class="container-body">
    <div class="ctn-form">
            <img src="imagenes/Icono_simple.png" alt="usuario-login"> <!--agrega la ubicacion de la imagen de usuario-->
            <h1 class="title">Formulario de Registro de Usuario Nuevo</h1>
        <form action="">
            <label for="">Nombre de usuario</label> 
            <input type="text">
            <label for="">Contraseña</label> 
            <input type="text">
            <label for="">E-mail</label> 
            <input type="text">
            <label for="">Tipo de usuario</label> 
            <input type="text">
            <label for="">Avatar</label> <!--aún no sé como cargar posibles avatars para seleccionar-->
            <input type="text">

            <input type="submit" name= "boton" value="Ingresar">
            
        </form>
</div>



<?php require RUTA_APP .'/views/layout/footer.php';?>