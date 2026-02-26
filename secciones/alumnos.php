<?php
// INSERT INTO `alumnos` (`id`, `nombre`, `apellidos`) VALUES (NULL, 'Alejandro', 'Oviedo');
include "../configuraciones/bd.php";
$conexion = BD::crearInstancia();

//Variables
$id = (isset($_POST['id']))?$_POST['id']:'';
$nombre = (isset($_POST['nombre']))?$_POST['nombre']:'';
$apellidos = (isset($_POST['apellidos']))?$_POST['apellidos']:'';
$idcursos = (isset($_POST['curso']))?$_POST['curso']:array();
$idcurso = (isset($idcursos[0]))?$idcursos[0]:'';
$idalumno = $id;

//Acciones
$accion = (isset($_POST['accion']))?$_POST['accion']:'';
switch($accion){
    case 'Agregar':
        //Agregar alumno
        if(!empty($nombre) && !empty($apellidos)){
            $sql="INSERT INTO alumnos (nombre, apellidos) VALUES (:nombre, :apellidos)";
            $consulta=$conexion->prepare($sql);
            $consulta->bindParam(":nombre", $nombre);
            $consulta->bindParam(":apellidos", $apellidos);
            $consulta->execute();            
            $idalumno = $conexion->lastInsertId();

            //Agregar cursos
            foreach($idcursos as $curso_id){
                if(!empty($curso_id)){
                    $sql2="INSERT INTO alumnos_cursos (idalumno, idcurso) VALUES (:idalumno, :idcurso)";
                    $consulta2=$conexion->prepare($sql2);
                    $consulta2->bindParam(":idalumno", $idalumno);
                    $consulta2->bindParam(":idcurso", $curso_id);
                    $consulta2->execute();
                }
            }
        }
        header('Location: vista_alumnos.php');
        break;
    case 'Actualizar':
        //Actualizar alumno
        $sql = "UPDATE alumnos SET nombre = :nombre, apellidos = :apellidos WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":apellidos", $apellidos);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        // Limpiar cursos anteriores
        $sql2 = "DELETE FROM alumnos_cursos WHERE idalumno = :idalumno";
        $stmt2 = $conexion->prepare($sql2);
        $stmt2->bindParam(":idalumno", $id);
        $stmt2->execute();

        // Insertar los nuevos cursos seleccionados
        foreach($idcursos as $curso_id){
            if(!empty($curso_id)){
                $sql3 = "INSERT INTO alumnos_cursos (idalumno, idcurso) VALUES (:idalumno, :idcurso)";
                $stmt3 = $conexion->prepare($sql3);
                $stmt3->bindParam(":idalumno", $id);
                $stmt3->bindParam(":idcurso", $curso_id);
                $stmt3->execute();
            }
        }
        header("Location: vista_alumnos.php");
        break;
    case 'Eliminar':
        //Eliminar cursos
        $sql2 = "DELETE FROM alumnos_cursos WHERE idalumno = :idalumno";
        $stmt2 = $conexion->prepare($sql2);
        $stmt2->bindParam(":idalumno", $id);
        $stmt2->execute();

        //Eliminar alumno
        $sql = "DELETE FROM alumnos WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        header("Location: vista_alumnos.php");
        break;
    case 'Seleccionar':
        //Seleccionar alumno
        $sql = "SELECT * FROM alumnos WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $alumno = $stmt->fetch(PDO::FETCH_LAZY);
        $nombre = $alumno['nombre'];
        $apellidos = $alumno['apellidos'];

        //Seleccionar cursos
        $sql2 = "SELECT idcurso FROM alumnos_cursos WHERE idalumno = :idalumno";
        $stmt2 = $conexion->prepare($sql2);
        $stmt2->bindParam(":idalumno", $id);
        $stmt2->execute();
        $cursos_asignados = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($cursos_asignados as $asignacion){
            $idcursos[] = $asignacion['idcurso'];
        }
        break;
}
$consulta=$conexion->prepare("SELECT * FROM alumnos");
$consulta->execute();
$listaAlumnos=$consulta->fetchAll();

$consulta=$conexion->prepare("SELECT * FROM cursos");
$consulta->execute();
$listaCursos=$consulta->fetchAll();

$consulta=$conexion->prepare("SELECT alumnos_cursos.*, cursos.nombre_curso FROM alumnos_cursos INNER JOIN cursos ON alumnos_cursos.idcurso = cursos.id");
$consulta->execute();
$listaAlumnosCursos=$consulta->fetchAll();
?>

