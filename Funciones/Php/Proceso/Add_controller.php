<?php
require_once '../Conexion.php';

class  crearProceso_controller
{
    public static function insertar()
    {
        //instaciamiento de la clase
        $Conexion = new Conexion();
        $Conexiondb = $Conexion->conectar();
        try {

            //Iniciar una transacción, desactivando autocommitIntegrity constraint violation: 1048 Column 'Placa' cannot be null
            $Conexiondb->beginTransaction();

            $query = 'INSERT INTO proceso (Placa, Hora, Peso, Observacion) VALUES (:placa, :hora, :peso, :observacion)';

            //Ejecuta una sentencia
            $sql = $Conexiondb->prepare($query);


            $sql->bindParam(':placa', $_POST['Placa10']);
            $sql->bindParam(':hora', $_POST['Hora10']);
            $sql->bindParam(':peso', $_POST['Peso10']);
            $sql->bindParam(':observacion', $_POST['observacion10']);
     
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
crearProceso_controller::insertar();

