<?php

include '../configuraciones/bd.php';
include '../librerias/fpdf.php';

$conexion=BD::crearInstancia();


$idcurso=isset($_GET['idcurso'])?$_GET['idcurso']:'';
$idalumno=isset($_GET['idalumno'])?$_GET['idalumno']:'';

$sql="SELECT alumnos.nombre, alumnos.apellidos, cursos.nombre_curso
FROM alumnos, cursos
WHERE alumnos.id=:idalumno AND cursos.id=:idcurso";
$sentencia=$conexion->prepare($sql);
$sentencia->bindParam(':idalumno', $idalumno);
$sentencia->bindParam(':idcurso', $idcurso);
$sentencia->execute();
$alumno=$sentencia->fetch(PDO::FETCH_LAZY);


$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();
// Center background image on A4 Landscape (297x210 mm)
$pdf->Image('../assets/img/certificado.jpg', 0, 0, 297, 210);

$pdf->SetFont('Arial', 'B', 30);
$pdf->SetTextColor(0, 50, 100); 
$pdf->SetY(50);
$pdf->Cell(0, 10, 'CERTIFICADO DE PARTICIPACION', 0, 1, 'C');

$pdf->SetFont('Arial', 'I', 26);
$pdf->SetY(80);
$pdf->Cell(0, 10, utf8_decode($alumno['nombre'].' '.$alumno['apellidos']), 0, 1, 'C');

$pdf->SetFont('Arial', '', 20);
$pdf->SetY(100);
$pdf->Cell(0, 10, 'Por haber participado en el curso:', 0, 1, 'C');

$pdf->SetFont('Arial', 'B', 22);
$pdf->SetY(120);
$pdf->Cell(0, 10, utf8_decode($alumno['nombre_curso']), 0, 1, 'C');

$pdf->SetFont('Arial', '', 20);
$pdf->SetY(140);
$pdf->Cell(0, 10, 'Otorgado por la Academia el dia '.date('d/m/Y'), 0, 1, 'C');



$pdf->Output();

?>
