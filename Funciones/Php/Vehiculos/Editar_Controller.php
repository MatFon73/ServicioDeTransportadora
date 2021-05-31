<?php
require_once '../Conexion.php';

class  Editar_controller
{
    public static function Actulizar()
    {
        //instaciamiento de la clase
        $Conexion = new Conexion();
        $Conexiondb = $Conexion->conectar();

        try {

            $query = 'UPDATE vehiculos SET placa = :placa, capacidad = :capacidad, remolque = :remolque WHERE id_vehiculo = :id';
            $sql = $Conexiondb->prepare($query);
            $sql->bindParam(':id', $_POST['id5']);
            $sql->bindParam(':placa', $_POST['placa1']);
            $sql->bindParam(':capacidad', $_POST['capacidad1']);
            $sql->bindParam(':remolque', $_POST['remolque1']);

            //ejecucion del SQL
            $sql->execute();

            echo 'Se Ha Actulizado Con Exito.';
        } catch (PDOException $e) {
            //Reconocer un error y revertir los cambios

            echo 'Se Presento El Siguiente Error: ' . $e;
        }
    }
}
Editar_controller::Actulizar();

