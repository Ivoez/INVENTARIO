<!-- header para usuarios -->
<?php require RUTA_APP . '/views/layout/users/header.php'; ?>

<div style="background-image: url('../img/agregarCarrerasBackground.jpg'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 20px;">
<div class="container mt-5">
    <div class="card shadow-lg p-4" style="background-color: rgba(0, 0, 0, 0.7); border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4); color: white;">
        <h2 class="mb-4">Vincular Materia a Carrera y Profesor</h2>

        <?php if (isset($mensaje_exito)): ?>
            <div class="alert alert-success"><?= htmlspecialchars($mensaje_exito) ?></div>
        <?php endif; ?>

        <?php if (isset($mensaje_error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($mensaje_error) ?></div>
        <?php endif; ?>

        <form action="<?= RUTA_URL; ?>/MateriaController/vincularGuardar" method="post">
            <div class="mb-3">
                <label for="idMateria" class="form-label">Materia</label>
                <select id="idMateria" name="idMateria" class="form-select" required>
                    <option value="">--Seleccione una materia--</option>
                    <?php foreach($materias as $materia): ?>
                        <option value="<?= $materia->idMateria ?>"><?= htmlspecialchars($materia->nombreMateria) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="idCarrera" class="form-label">Carrera</label>
                <select id="idCarrera" name="idCarrera" class="form-select" required>
                    <option value="">--Seleccione una carrera--</option>
                    <?php foreach($carreras as $carrera): ?>
                        <option value="<?= $carrera->idCarrera ?>"><?= htmlspecialchars($carrera->nombreCarrera) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="idProfesor" class="form-label">Profesor</label>
                <select id="idProfesor" name="idProfesor" class="form-select" required>
                    <option value="">--Seleccione un profesor--</option>
                    <?php foreach($profesores as $profesor): ?>
                        <option value="<?= $profesor->idUsuario ?>"><?= htmlspecialchars($profesor->Apellido . ', ' . $profesor->Nombre) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="cuatrimestre" class="form-label">Cuatrimestre</label>
                <input type="number" id="cuatrimestre" name="cuatrimestre" class="form-control" min="1" max="4" required>
            </div>

            <div class="mb-3">
                <label for="turno" class="form-label">Turno</label>
                <select id="turno" name="turno" class="form-select" required>
                    <option value="">--Seleccione turno--</option>
                    <option value="Mañana">Mañana</option>
                    <option value="Tarde">Tarde</option>
                    <option value="Noche">Noche</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="diaCursada" class="form-label">Día/s de cursada</label>
                <input type="text" id="diaCursada" name="diaCursada" class="form-control" placeholder="Ejemplo: Lunes y Miércoles" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Vincular Materia</button>
                <a href="<?= RUTA_URL; ?>/Pages/AdminMenu" class="btn btn-secondary">Regresar</a>
            </div>
        </form>
    </div>
</div>
</div>
