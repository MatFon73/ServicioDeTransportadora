<?php
require_once '../Conexion.php';
session_start();

class  ActualizarFoto_controller
{
    public static function Actulizar()
    {
        //instaciamiento de la clase
        $Conexion = new Conexion();
        $Conexiondb = $Conexion->conectar();

        $Cedula = $_SESSION['Autentificar'];

        $imagen = $_FILES['I']['name'];
        $tmp = ($_FILES['I']['tmp_name']);
        $guardar = '..\..\..\Publicas\Perfil/' . $imagen;
        $Url = 'Publicas\Perfil/' . $imagen;
        move_uploaded_file($tmp,  $guardar);

        try {

            $query = 'UPDATE usuarios SET foto = :Foto WHERE cedula = :Cedula';
            $sql = $Conexiondb->prepare($query);
            $sql->bindParam(':Foto',  $Url);
            $sql->bindParam(':Cedula',  $Cedula);

            //ejecucion del SQL
            $sql->execute();

            echo $Url;
        } catch (PDOException $e) {
            //Reconocer un error y revertir los cambios

            echo 'Se Presento El Siguiente Error: ' . $e;
        }
    }
}
ActualizarFoto_controller::Actulizar();

