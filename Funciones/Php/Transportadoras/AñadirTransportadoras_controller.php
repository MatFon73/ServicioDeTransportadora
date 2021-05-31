<?php
require_once '../Conexion.php';

class  crearTransportadoras_controller
{
    public static function insertar()
    {
        //instaciamiento de la clase
        $Conexion = new Conexion();
        $Conexiondb = $Conexion->conectar();
        try {

            //Iniciar una transacción, desactivando autocommit
            $Conexiondb->beginTransaction();

            $query = 'INSERT INTO transportadoras (nombre, descripcion, nit, contacto, direccion, estado) VALUES (:nombre, :descripcion, :nit, :contacto, :direccion, :estado)';

            //Ejecuta una sentencia
            $sql = $Conexiondb->prepare($query);

            $sql->bindParam(':nombre', $_POST['nombre_transportadoras']);
            $sql->bindParam(':descripcion', $_POST['descripcion_transportadoras']);
            $sql->bindParam(':nit', $_POST['nit_transportadora']);
            $sql->bindParam(':contacto', $_POST['contacto_transportadoras']);
            $sql->bindParam(':direccion', $_POST['direccion_transportadoras']);
            $sql->bindParam(':estado', $_POST['estado_transportadoras']);
            
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
crearTransportadoras_controller::insertar();

