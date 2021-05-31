<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fuente De Google -->
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&display=swap" rel="stylesheet">

    <!-- Icono -->
    <link rel="icon" type="image/png" href="Publicas/Imagenes/icono.png" />

    <!--Css-->
    <link rel="stylesheet" href="Librerias/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="Librerias/fontawesome-5.13.0/css/all.css">
    <link rel="stylesheet" href="Librerias/Sweetalert/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="Funciones/css/botones.css">
    <link rel="stylesheet" href="Funciones/css/calendario.css">
    <link rel="stylesheet" href="Librerias/bootstrap-4.4.1-dist/css/bootstrap.min.css">

    <!--Js-->
    <script type="text/javascript" src="Librerias/Jquery-3.5.0/jquery-3.5.0.js"></script>
    <script type="text/javascript" src="Librerias/Sweetalert/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="Funciones/Js/Sesion.js"></script>
    <script type="text/javascript" src="Funciones/Js/Conductores.js"></script>
    <script type="text/javascript" src="Funciones/Js/Vehiculos.js"></script>
    <script type="text/javascript" src="Funciones/Js/Productos.js"></script>
    <script type="text/javascript" src="Funciones/Js/Proceso.js"></script>
    <script type="text/javascript" src="Funciones/Js/Transportadoras.js"></script>
    <script type="text/javascript" src="Funciones/Js/Usuarios.js"></script>
    <script type="text/javascript" src="Funciones/Js/Calendario.js"></script>
    <script type="text/javascript" src="Librerias/bootstrap-4.4.1-dist\js\bootstrap.min.js"></script>


    <title>Incio</title>
    <style>
        .upload-btn-wrapper {
            position: relative;
            left: 55%;
            bottom: 5vh;
            overflow: hidden;
            display: inline-block;
            cursor: pointer;

        }

        .upload-btn-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            cursor: pointer;
        }

        #boton-standar-rw {
            transition: all 0.3s ease 0s;
            color: #000;
            background-color: rgb(71, 123, 158, .5);
            width: 95%;
            height: 95%;
            border-radius: 160px;
            margin: auto;
            cursor: pointer;
            transition: .5s;
        }

        .Btn1 {
            color: #000;
            background-color: rgb(71, 123, 158);
            width: 100%;
            padding: 3%;
            border: 0 none;
            text-align: left;
            transition: .5s;
        }

        .Btn1:hover {
            background-color: rgb(63, 109, 142);
        }

        h6 {
            color: black;
        }

        .perfil {
            width: 40%;
            height: 40%;
            border-radius: 160px;
            border: 2px solid black;
            display: block;
            margin-top: 1%;
            margin: auto;
            margin-bottom: 1%;
        }

        .grid-container {
            display: grid;
            grid-template-columns: 0.8fr 1.2fr 1fr 1fr;
            grid-template-rows: .5fr 1fr 1fr 6.81fr;
            gap: 0px 0px;
            grid-template-areas:
                "Menu Barra Barra Barra"
                "Menu Contenido Contenido Contenido"
                "Menu Contenido Contenido Contenido"
                "Menu Contenido Contenido Contenido";
        }

        .Barra {
            grid-area: Barra;
            padding: 10px;
            background-color: rgb(71, 123, 158);
            border: 1px solid black;
            width: 80.1%;
            height: 10%;
            margin-left: 19.91%;
            position: fixed;
            z-index: 1;
        }

        .Contenido {
            grid-area: Contenido;
            margin-top: 3%;
            width: 100%;
            height: auto;
        }

        .Menu {
            grid-area: Menu;
            background-color: rgb(71, 123, 158);
            border: 1px solid black;
            width: 20%;
            height: 100%;
            position: fixed;
            z-index: 1;
        }

        table,
        tr,
        td,
        th,
        tbody,
        thead {
            border: 1px solid #000;
            font-size: small;
            border-collapse: collapse;
            transition: all .5;
        }

        tr:hover {
            background-color: rgb(71, 123, 158);
        }

        label {
            margin-top: 2%;
        }
    </style>
</head>

<body onload="return User(),  MostrarProceso(), MostrarUsuarios(),MostrarVehiculos(), MostrarConductores(),MostrarProductos(),MostrarTransportadoras(), view()" style="font-family: 'Josefin Sans', sans-serif;">
    <div class="grid-container">
        <div class="Menu">
            <div style="background-color:rgb(63, 109, 142); height:40px;" class="titulo">
                <h4 class="text-center" style="padding: 2%;">Administrador&nbsp;<i class="fas fa-check-circle"></i></h4>
            </div>
            <div style="padding: 1%;" class="container" id="UserData">
            </div>
            <div class="container">
                <hr color="black" size="20">
                <button style="color: #000;" onclick="return Usuarios()" class="Btn1" type="submit"><i class="fas fa-users"></i>&nbsp;Usuarios</button><br>
                <button style="color: #000;" onclick="return Conductores()" class="Btn1" type="submit"><i class="fas fa-motorcycle"></i>&nbsp;Conductores</button><br>
                <button style="color: #000;" onclick="return Productos()" class="Btn1" type="submit"><i class="fas fa-boxes"></i>&nbsp;Productos</button><br>
                <button style="color: #000;" onclick="return Transportadoras()" class="Btn1" type="submit"><i class="fas fa-luggage-cart"></i>&nbsp;Transportadoras</button><br>
                <button style="color: #000;" onclick="return Vehiculos()" class="Btn1" type="submit"><i class="fas fa-car"></i>&nbsp;Vehiculos</button><br>
                <button style="color: #000;" onclick="return Proceso()" class="Btn1" type="submit"><i class="fas fa-user-tie"></i></i>&nbsp;Proceso</button><br>
                <button style="color: #000;" onclick="return Calendario()" class="Btn1" type="submit"><i class="fas fa-calendar-alt"></i>&nbsp;Calendario</button><br>
                <button title="Cerrar Cesion" type="submit" class="Btn1" onclick="return CerrarSesion()"><i class="fas fa-times-circle"></i></i>&nbsp;Cerrar Sesion</button>
            </div>
        </div>
        <div class="Barra">
            <button onclick="return bienvenida()" style="margin-top:-0.8%;margin-left:-0.7%;" class="btn btn"><img src="Publicas/Imagenes/icono.png" width="45px" height="45px" alt="Logo De La Institucion" title="Logo"></button>
            <h4 style="display:inline-block;color: black; ">Trasnportadora De Servicios</h4>
        </div>
        <div id="contenido" style="padding: 5%;" class="Contenido">
            <div class="container" id="bienvenida">
                <h1 class="text-center">Bienvenido</h1>
                <img style="display:block;margin:auto;" src="Publicas/Imagenes/icono.png" width="300px" height="300px" alt="Logo De La Institucion" title="Logo">
                <h1 class="text-center">Trasnportadora De Servicios</h1>
            </div>
            <div id="usuarios"></div>
            <div id="conductores"></div>
            <div id="productos"></div>
            <div id="transportadoras"></div>
            <div id="vehiculos"></div>
            <div id="proceso"></div>

            <div style="margin-top:-5%; display: none;" id="calendario">
            <h1 class="text-center">Calendario De Eventos</h1>
                <div class="calendar">
                    <div class="calendar__info">
                        <div class="calendar__prev" id="prev-month">&#9664;</div>
                        <div class="calendar__month" id="month"></div>
                        <div class="calendar__year" id="year"></div>
                        <div class="calendar__next" id="next-month">&#9654;</div>
                    </div>

                    <div class="calendar__week">
                        <div class="calendar__day calendar__item2">Lun</div>
                        <div class="calendar__day calendar__item2">Mar</div>
                        <div class="calendar__day calendar__item2">Mie</div>
                        <div class="calendar__day calendar__item2">Jue</div>
                        <div class="calendar__day calendar__item2">Vie</div>
                        <div class="calendar__day calendar__item2">Sáb</div>
                        <div class="calendar__day calendar__item2">Dom</div>
                    </div>
                    <div class="calendar__dates" id="dates"></div>
                </div>
                <div style="margin-top: 5%;" class="Evento">
                    <div class="titulo">
                        <p class="text-center" style="height: 40px;position: relative; top: 25%">Evento</p>
                        <button style="
                            background-color: rgb(71, 123, 158);
                            border-radius: 7px 7px 7px 7px;
                            float: right;
                            " data-toggle="modal" data-target="#Vista" class="btn btn" title="Añadir Evento" onclick="Addview()">
                            +
                        </button>
                    </div>
                    <div id="view" style="margin: 4%"></div>
                    <div id="editar" style="margin: 4%"></div>
                    <div id="mensajes" style="margin: 2%">
                        <p>No Hya Envetos</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="app.js"></script>

</html>