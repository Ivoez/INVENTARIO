<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- falta manejo de sesiones -->
<!-- falta completar boton regresar -->

<div style="background-image: url('../img/agregarCarrerasBackground.jpg'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 20px;">

    <div class="container mt-4" style="max-width: 700px;">
        <?php
        // Mostrar el mensaje de éxito si está presente en la sesión
        if (isset($_SESSION['mensaje'])) {
            echo '<div class="alert alert-success">' . $_SESSION['mensaje'] . '</div>';
            unset($_SESSION['mensaje']); 
        }
        ?>
        
        <div class="card p-4" style="background-color: rgba(0, 0, 0, 0.7); border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4); color: white;">
            <h2 class="text-center mb-4">Agregar Nueva Carrera</h2>
            
            <form action="<?php echo RUTA_URL; ?>/AuthController/agregarCarrera" method="POST" enctype="multipart/form-data">
                
                <div class="form-group mb-3">
                    <label for="nombreCarrera">Nombre de la carrera:</label>
                    <input type="text" name="nombreCarrera" id="nombreCarrera" class="form-control" required>
                </div>
                
                <div class="form-group mb-3">
                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="descripcionCompleta">Descripción Completa:</label>
                    <textarea name="descripcionCompleta" id="descripcionCompleta" class="form-control" required></textarea>
                </div>
                
                <div class="form-group mb-3">
                    <label for="tipoCarrera">Tipo de carrera:</label>
                    <select name="tipoCarrera" id="tipoCarrera" class="form-control" required>
                        <option value="Curso">Curso</option>
                        <option value="Grado">Grado</option>
                        <option value="PosGrado">Posgrado</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="imagen">Imagen de la carrera:</label>
                    <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-3">Agregar Carrera</button>
                <a href="#" class="btn btn-secondary w-100 mt-3">Regresar al Dashboard</a>
            </form>
        </div>
    </div>
</div>

