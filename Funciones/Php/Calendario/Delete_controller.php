<?php
require_once '../Conexion.php';
class Borrar_controller
{
    public static function borrar()
    {
        try {

            $Conexion = new Conexion();
            $ConexionDb = $Conexion->conectar();

            $sql1 = 'DELETE From movimientos WHERE id_movimiento = :id' ;
            $query1 = $ConexionDb->prepare($sql1);
            $query1->bindParam(':id', $_POST['id6']);
            $query1->execute();

            echo "Se Ha Borrado Con Exito.";
            
        } catch (Exception $e) {

            echo 'error: ' . $e;
        }
    }
}
Borrar_controller::borrar();


