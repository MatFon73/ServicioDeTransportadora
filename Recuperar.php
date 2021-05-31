<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">

    <!-- Fuente De Google -->
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&display=swap" rel="stylesheet">

    <!-- Icono -->
    <link rel="icon" type="image/png" href="Publicas/Imagenes/icono.png" />

    <!--Css-->
    <link rel="stylesheet" href="Librerias/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="Librerias/fontawesome-5.13.0/css/all.css">
    <link rel="stylesheet" href="Funciones/css/Sesion.css">
    <link rel="stylesheet" href="Funciones/css/botones.css">
    <link rel="stylesheet" href="Librerias/Sweetalert/dist/sweetalert2.min.css">

    <!-- js -->
    <script type="text/javascript" src="Funciones/Js/Sesion.js"></script>
    <script type="text/javascript" src="Librerias/Jquery-3.5.0/jquery-3.5.0.js"></script>
    <script type="text/javascript" src="Librerias/Sweetalert/dist/sweetalert2.all.min.js"></script>

    <title>Recuperar Contraseña</title>
</head>

<body style="font-family: 'Josefin Sans', sans-serif;">
    <div class="contenedor">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-ms-5">
                    <div class="container">
                        <center><img src="Publicas/Imagenes/icono.png" alt="Iniciar Sesion" width="100px" height="100px"></center>
                        <h1 class="text-center" style="color:black">Recuperar Contraseña</h1> <br>
                    </div>

                    <form method="post" id="Formulario">
                        <div class="form-row">
                            <div class="col">
                                <i class="fas fa-address-card" style="color:black"></i>
                                <label class="mr-sm-2" for="Cedula" title="Campo Oblicatorio">Cedula *</label>
                                <input autocomplete="off" class="form-control" name="Cedula" type="text" id="Cedula" placeholder="Cedula" require><br>
                            </div>
                            <div class="col">
                                <i class="fas fa-envelope" style="color:black"></i>
                                <label class="mr-sm-2" for="Correo" title="Campo Oblicatorio">Correo *</label>
                                <input autocomplete="off" class="form-control" name="Correo" type="email" id="Correo" placeholder="Correo" require><br>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <button titulo="verificar" style="margin-bottom:5%; background-color: rgb(71, 123, 158);" class="btn btn" type="submit" onclick="return Verificar()"><i class="fas fa-paper-plane" style="color:black"></i>&nbsp;Verficar</button><br>
                            <div style="margin-bottom: 10%;" class="container" id="cambiar"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="Final">
            <h6 class="text-center">¿Tienes Una Cuenta?</h6>
            <center><a href="index.php" style="padding:5%;" class="registro">Iniciar Sesion</a></center>
        </div>
    </div>
    </div>
</body>

</html>
