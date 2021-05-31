<?php
require '../Conexion.php';
class Borrar_controller
{
    public static function borrar()
    {
        try {

            $Conexion = new Conexion();
            $ConexionDb = $Conexion->conectar();

            $sql = 'DELETE From transportadoras WHERE id_transportadora = :id';
            $query = $ConexionDb->prepare($sql);
            $query->bindParam(':id', $_POST['id4']);

            $query->execute();

            echo "Se Ha Borrado Con Exito.";
        } catch (Exception $e) {

            echo 'error: ' . $e;
        }
    }
}
Borrar_controller::borrar();


