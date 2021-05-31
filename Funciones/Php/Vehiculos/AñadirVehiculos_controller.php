<?php
require_once '../Conexion.php';

class  crearVehiculo_controller
{
    public static function insertar()
    {
        //instaciamiento de la clase
        $Conexion = new Conexion();
        $Conexiondb = $Conexion->conectar();

        try {

            //Iniciar una transacción, desactivando autocommit
            $Conexiondb->beginTransaction();

            $query = 'INSERT INTO vehiculos (placa, capacidad, remolque) VALUES (:placa, :capacidad, :remolque)';

            //Ejecuta una sentencia
            $sql = $Conexiondb->prepare($query);

            $sql->bindParam(':placa', $_POST['placa']);
            $sql->bindParam(':capacidad', $_POST['capacidad']);
            $sql->bindParam(':remolque', $_POST['remolque']);

            //ejecucion del SQL
            $sql->execute();

            //Consignar los cambios
            $Conexiondb->commit();

            echo 'Se Ha Registrado Con Exito.';
        } catch (PDOException $e) {
            //Reconocer un error y revertir los cambios
            $Conexiondb->rollBack();

            echo 'Se Presento El Siguiente Error: ' . $e;
        }
    }
}
crearVehiculo_controller::insertar();