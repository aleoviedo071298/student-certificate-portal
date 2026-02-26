<?php include_once '../secciones/alumnos.php'; ?>
<?php include_once '../templates/cabecera.php'; ?>
<div class="container">
    <br>
    <div class="row">
        <div class="col-5">
            <form action="" method="post">
                <div class="card">
                    <div class="card-header">
                        <h5>Formulario de alumnos</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="id" class="form-label">ID</label>
                            <input type="text" class="form-control" name="id" id="id" aria-describedby="idHelp" placeholder="ID" value="<?php echo $id; ?>">
                            <div id="idHelp" class="form-text">No compartiremos su ID con nadie mas.</div>
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="nombreHelp" placeholder="Nombre" value="<?php echo $nombre; ?>">
                            <div id="nombreHelp" class="form-text">No compartiremos su ID con nadie mas.</div>
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos" id="apellidos" aria-describedby="apellidosHelp" placeholder="Apellidos" value="<?php echo $apellidos; ?>">
                            <div id="apellidosHelp" class="form-text">No compartiremos su ID con nadie mas.</div>
                        </div>
                        <div class="mb-3">
                            <label for="curso_id" class="form-label">Curso</label>

                            <select multiple class="form-control" name="curso[]" id="curso" aria-describedby="curso_idHelp">
                                <?php foreach($listaCursos as $curso){ ?>
                                <option 
                                    value="<?php echo $curso['id']; ?>" 
                                    <?php echo (in_array($curso['id'], $idcursos))? 'selected': ''; ?>
                                >
                                    <?php echo $curso['nombre_curso']; ?>
                                </option>
                                <?php } ?>
                            </select>

                            <div id="curso_idHelp" class="form-text">No compartiremos su ID con nadie mas.</div>
                        </div>
                        <div class="btn-group" role="group" aria-label="Botones de accion">
                            <button type="submit" name="accion" value="Agregar" class="btn btn-success">Agregar</button>
                            <button type="submit" name="accion" value="Actualizar" class="btn btn-warning">Actualizar</button>
                            <button type="submit" name="accion" value="Eliminar" class="btn btn-danger">Eliminar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-7">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Certificados</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listaAlumnos as $alumno){ ?>
                    <tr>
                        <td><?php echo $alumno['id']; ?></td>
                        <td><?php echo $alumno['nombre']; ?></td>
                        <td><?php echo $alumno['apellidos']; ?></td>

                        <td>
                            <?php foreach($listaAlumnosCursos as $inscripcion){ 
                                if($inscripcion['idalumno'] == $alumno['id'])
                                    echo "<a href='../secciones/certificado.php?idalumno=".$inscripcion['idalumno']."&idcurso=".$inscripcion['idcurso']."'> <img src='../assets/img/pdf.svg' width='20' > ".$inscripcion['nombre_curso']."</a><br>";
                            } 
                        ?>
                        </td>

                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo $alumno['id']; ?>">
                                <button type="submit" name="accion" value="Seleccionar" class="btn btn-info">Seleccionar</button> 
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once '../templates/pie.php'; ?>