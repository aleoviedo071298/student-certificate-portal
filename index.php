<?php
session_start();

$mensaje = "";

if($_POST){
    if($_POST['usuario']=='admin' && $_POST['password']=='123456'){
        $_SESSION['usuario']=$_POST['usuario'];
        header("Location: secciones/index.php");
    }
    else{
        $mensaje = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso al Sistema | Academy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">

            <div class="col-md-4">
           </div>

            <div class="col-md-4">
                <br>

                <form action="index.php" method="post">

                <div class="card">

                    <div class="card-header">
                        <h4 class="card-title">Inicio de sesion</h4>
                    </div>

                    <div class="card-body">
                        <?php if(!empty($mensaje)){
                            echo "<div class='alert alert-danger' role='alert'>";
                            echo $mensaje;
                            echo "</div>";
                        }?>

                            <div class="mb-3">
                                <label for="usuario" class="form-label">Usuario</label>
                                <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="usuarioHelp" placeholder="Usuario">
                                <div id="usuarioHelp" class="form-text">No compartiremos su usuario con nadie mas.</div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="password" id="password" aria-describedby="passwordHelp" placeholder="Contraseña">
                                <div id="passwordHelp" class="form-text">No compartiremos su contraseña con nadie mas.</div>
                            </div>
                            <button type="submit" class="btn btn-primary">Iniciar sesion</button>
                    
                    </div>

                </div>

                </form>

            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>