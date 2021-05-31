<?php
require_once 'Conexion.php';
session_start();

class iniciarSesion_controller
{
    public static function Inicio()
    {
        $Conexion = new Conexion();
        $ConexionDb = $Conexion->conectar();

        $Cedula = $_POST['Cedula'];
        $Password = $_POST['password'];
        $Password_hash = md5($Password);
        try {
            
            $sql = 'SELECT * FROM usuarios WHERE cedula=:Cedula';
            $query = $ConexionDb->prepare($sql);
            $query->bindParam(':Cedula', $Cedula);
            $query->execute();

            $Filas = $query->rowCount();

            if ($Filas > 0) {
                $Respuesta = $query->fetch();
                if ($Password_hash == $Respuesta['clave'] && $Respuesta['tipo_usuario'] == "1")  {
                    $_SESSION['Autentificar'] =  $Cedula;
                    echo 'Inicio Sesion Administrador.';
                } else {
                    if($Password_hash == $Respuesta['clave'] && $Respuesta['tipo_usuario'] == "2"){
                        $_SESSION['Autentificar'] =  $Cedula;
                        echo 'Inicio Sesion Operador.';
                    }else{
                        if($Password_hash == $Respuesta['clave'] && $Respuesta['tipo_usuario'] == "3"){
                            $_SESSION['Autentificar'] =  $Cedula;
                            echo 'Inicio Sesion Consulta.';
                        }else{
                            echo 'La Contraseña Es Incorrecta.';
                        }
                    }   
                }
            } else {
                echo 'Cedula No Existe.';
            }
        } catch (Exception $e) {
            echo 'error: ' . $e;
        }
    }
}
iniciarSesion_controller::Inicio();

