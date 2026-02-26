<?php
// INSERT INTO `cursos` (`id`, `nombre_curso`) VALUES (NULL, 'Sitio web con PHP');
include "../configuraciones/bd.php";
$conexion = BD::crearInstancia();

//Recepcion de datos
$id=isset($_POST['id']) ? $_POST['id'] : '';
$nombre_curso=isset($_POST['nombre_curso']) ? $_POST['nombre_curso'] : '';

//carga de datos
$accion=isset($_POST['accion']) ? $_POST['accion'] : '';
if($accion!=''){
    switch($accion){
        case 'Agregar':
            $sql="INSERT INTO cursos (nombre_curso) VALUES (:nombre_curso)";
            $consulta=$conexion->prepare($sql);
            $consulta->bindParam(":nombre_curso", $nombre_curso);
            $consulta->execute();
            header('Location: vista_cursos.php');
            break;
        case 'Actualizar':
            $sql="UPDATE cursos SET nombre_curso=:nombre_curso WHERE id=:id";
            $consulta=$conexion->prepare($sql);
            $consulta->bindParam(":nombre_curso", $nombre_curso);
            $consulta->bindParam(":id", $id);
            $consulta->execute();
            header('Location: vista_cursos.php');
            break;
        case 'Eliminar':
            $sql="DELETE FROM cursos WHERE id=:id";
            $consulta=$conexion->prepare($sql);
            $consulta->bindParam(":id", $id);
            $consulta->execute();
            header('Location: vista_cursos.php');
            break;
        case 'Seleccionar':
            $sql="SELECT * FROM cursos WHERE id=:id";
            $consulta=$conexion->prepare($sql);
            $consulta->bindParam(":id", $id);
            $consulta->execute();
            $curso=$consulta->fetch(PDO::FETCH_ASSOC);
            $nombre_curso=$curso['nombre_curso'];
            break;
    }
}

//Listado de cursos
$consulta=$conexion->prepare("SELECT * FROM cursos");
$consulta->execute();
$listaCursos=$consulta->fetchAll();

?>