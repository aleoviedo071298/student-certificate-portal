<?php
include_once("../templates/cabecera.php");
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Bienvenido <?php echo $_SESSION['usuario']; ?></h1>
            <p>Centro de emision de certificados</p>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Alumnos</h5>
                    <p class="card-text">Aqui podras gestionar tus alumnos.</p>
                    <a href="alumnos.php" class="btn btn-primary">Gestionar alumnos</a>
                </div>
            </div><br>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Cursos</h5>
                    <p class="card-text">Aqui podras gestionar tus cursos.</p>
                    <a href="cursos.php" class="btn btn-primary">Gestionar cursos</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once("../templates/pie.php");
?>