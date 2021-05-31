<?php
require_once '../Conexion.php';

class  Edit_controller
{
    public static function Actulizar()
    {
        //instaciamiento de la clase
        $Conexion = new Conexion();
        $Conexiondb = $Conexion->conectar();

        try {

            $query = 'UPDATE movimientos SET tipo_movimiento = :tipo_movimiento, origen = :origen, destino = :destino, fecha = :fecha, 
            hora = :hora, producto = :producto, estado = :estado, placa = :placa, cedula_usuario = :cedula_usuario,
            cedula_conductor = :cedula_conductor, observacion = :observacion, transportadora = :transportadora  WHERE id_movimiento = :id';

            $sql = $Conexiondb->prepare($query);
            $sql->bindParam(':id', $_POST['id6']);
            $sql->bindParam(':tipo_movimiento', $_POST['tipo_movimiento2']);
            $sql->bindParam(':origen', $_POST['origen_movimiento2']);
            $sql->bindParam(':destino', $_POST['destino_movimiento2']);
            $sql->bindParam(':hora', $_POST['hora_movimiento1']);
            $sql->bindParam(':producto', $_POST['producto_movimiento2']);
            $sql->bindParam(':estado', $_POST['estado_movieminto2']);
            $sql->bindParam(':fecha', $_POST['fecha_movieminto2']);
            $sql->bindParam(':placa', $_POST['placa_movieminto2']);
            $sql->bindParam(':cedula_conductor', $_POST['cedula_conductor2']);
            $sql->bindParam(':cedula_usuario', $_POST['cedula_usuario2']);
            $sql->bindParam(':observacion', $_POST['observacion_movimiento2']);
            $sql->bindParam(':transportadora', $_POST['trasportadora_movimiento2']);

            //ejecucion del SQL
            $sql->execute();

            echo 'Se Ha Actulizado Con Exito.';
        } catch (PDOException $e) {
            //Reconocer un error y revertir los cambios

            echo 'Se Presento El Siguiente Error: ' . $e;
        }
    }
}
Edit_controller::Actulizar();

