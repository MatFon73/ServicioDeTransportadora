<?php
require_once '../Conexion.php';
session_start();
class  Añadir_controller
{
    public static function insertar()
    {
        //instaciamiento de la clase
        $Conexion = new Conexion();
        $Conexiondb = $Conexion->conectar();
        try {

            //Iniciar una transacción, desactivando autocommit
            $Conexiondb->beginTransaction();

            $query = 'INSERT INTO movimientos (tipo_movimiento, origen, destino, fecha, hora, producto, estado, cedula_usuario, placa, cedula_conductor, observacion, transportadora) 
            VALUES (:tipo_movimiento, :origen, :destino, :fecha, :hora, :producto, :estado, :cedula_usuario, :placa, :cedula_conductor, :observacion, :transportadora)';

            //Ejecuta una sentencia
            $sql = $Conexiondb->prepare($query);

            $sql->bindParam(':tipo_movimiento', $_POST['tipo_movimiento1']);
            $sql->bindParam(':origen', $_POST['origen_movimiento1']);
            $sql->bindParam(':destino', $_POST['destino_movimiento1']);
            $sql->bindParam(':hora', $_POST['hora_movimiento1']);
            $sql->bindParam(':producto', $_POST['producto_movimiento1']);
            $sql->bindParam(':estado', $_POST['estado_movimiento1']);
            $sql->bindParam(':fecha', $_POST['fecha_movimiento1']);
            $sql->bindParam(':cedula_usuario', $_SESSION['Autentificar']);
            $sql->bindParam(':placa', $_POST['placa_movimiento1']);
            $sql->bindParam(':cedula_conductor', $_POST['cedula_conductor1']);
            $sql->bindParam(':observacion', $_POST['observacion_movimiento1']);
            $sql->bindParam(':transportadora', $_POST['trasportadora_movimiento1']);

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
Añadir_controller::insertar();
