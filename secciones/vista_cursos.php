<?php include_once '../secciones/cursos.php'; ?>
<?php include_once '../templates/cabecera.php'; ?>
    <div class="container">
        <br>
        <div class="row">   
            <div class="col-12">
                <div class="row">
                    <div class="col-md-4">
                        <form action="" method="post">
                        <div class="card">
                            <div class="card-header">
                                <h5>Formulario de cursos</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb3">
                                    <label for="id" class="form-label">ID</label>
                                    <input type="text" class="form-control" name="id" id="id" value="<?php echo $id; ?>" aria-describedby="idHelp" placeholder="ID">
                                    <div id="idHelp" class="form-text">No compartiremos su ID con nadie mas.</div>
                                </div>
                                <div class="mb3">
                                    <label for="nombre_curso" class="form-label">Nombre del curso</label>
                                    <input type="text" class="form-control" name="nombre_curso" id="nombre_curso" value="<?php echo $nombre_curso; ?>" aria-describedby="nombre_cursoHelp" placeholder="Nombre del curso">
                                    <div id="nombre_cursoHelp" class="form-text">No compartiremos su ID con nadie mas.</div>
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
                    <div class="col-md-8">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre del curso</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($listaCursos as $curso){ ?>
                                <tr>

                                    <td><?php echo $curso['id']; ?></td>
                                    <td><?php echo $curso['nombre_curso']; ?></td>
                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="id" value="<?php echo $curso['id']; ?>">
                                            <button type="submit" name="accion" value="Seleccionar" class="btn btn-info">Seleccionar</button> 
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                            <?php } ?>
                        </table>
                        </form>
                    </div>
<?php include_once '../templates/pie.php'; ?>