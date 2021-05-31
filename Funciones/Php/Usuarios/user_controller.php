<?php
require '../Conexion.php';
session_start();
class user_controller
{
    public static function Mostrar()
    {
        $Conexion = new Conexion();
        $ConexionDb = $Conexion->conectar();

        try {

            if (!isset($_SESSION['Autentificar'])) {
                echo '1';
                exit();
            }

            $Cedula = $_SESSION['Autentificar'];

            $sql = "SELECT * From usuarios WHERE cedula =:Cedula";
            $respuesta = $ConexionDb->prepare($sql);
            $respuesta->bindParam(':Cedula', $Cedula);
            $respuesta->execute();
            $row = $respuesta->fetchAll(PDO::FETCH_ASSOC);


            foreach ($row as $respuesta) {

                echo '
                <div id="perfil">
                <img id="perfil" class="perfil" src="' . $respuesta['foto'] . '" alt="Foto De perfil" title="perfil">
                </div>
                    <div class="upload-btn-wrapper">
                    <button class="btn btn" id="boton-standar-rw"><i class="fas fa-camera"></i></button>
                    <input onchange="return ActulizarFoto()" id="Foto" class="upload-file-buton" type="file"></div>
                    <div style="margin-top:-20%;" class="container">
                        <hr color="black" size="20">
                        <h6 class="text-center">Informacion Basica</h6>
                        <h6 style="color: #000;title="Nombre"><i class="fas fa-user"></i> ' . $respuesta['nombre'] . '' . " " . '' . $respuesta['apellido'] . '</h6>
                        <h6 style="color: #000;title="Correo"><i class="fas fa-envelope"></i> ' . $respuesta['correo'] . '</h6>
                    </div>';
            }
        } catch (Exception $e) {

            echo 'error: ' . $e;
        }
    }
}
user_controller::Mostrar();

