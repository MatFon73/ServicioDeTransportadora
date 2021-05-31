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

            //Iniciar una transacción, desactivando autocommit
            $Conexiondb->beginTransaction();
            $query2 = "SELECT * FROM movimientos WHERE fecha = :fecha AND placa = :placa";
            $query2 = $Conexiondb->prepare($query2);
            $query2->execute();
            $Respuesta = $query2->fetch();

            $moviemiento = "";

            if($Respuesta["tipo_movimiento"] == "Salida"){
                $moviemiento = "Entrada";
            }else{
                if($Respuesta["tipo_movimiento"] == "Entrada"){
                    $moviemiento = "Salida";
                }
            }

            $query = 'UPDATE movimientos SET tipo_movimiento  = :movimiento WHERE fecha = :fecha AND placa = :placa';

            //Ejecuta una sentencia
            $sql = $Conexiondb->prepare($query);

            
            $sql->bindParam(':placa', $_POST['Placa9']);
            $sql->bindParam(':fecha', $_POST['Fecha9']);
            $sql->bindParam(':movimiento', $moviemiento);

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

