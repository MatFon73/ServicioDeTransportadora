<?php
require_once '../Conexion.php';

class  crearProductos_controller
{
    public static function insertar()
    {
        //instaciamiento de la clase
        $Conexion = new Conexion();
        $Conexiondb = $Conexion->conectar();

        try {

            //Iniciar una transacción, desactivando autocommit
            $Conexiondb->beginTransaction();

            $query = 'INSERT INTO productos (nombre, tipo_producto, descripcion, estado) VALUES (:nombre, :tipo, :descripcion, :estado)';

            //Ejecuta una sentencia
            $sql = $Conexiondb->prepare($query);

            $sql->bindParam(':nombre', $_POST['nombre_producto']);
            $sql->bindParam(':tipo', $_POST['tipo_producto']);
            $sql->bindParam(':descripcion', $_POST['descripcion_producto']);
            $sql->bindParam(':estado', $_POST['estado_producto']);

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
crearProductos_controller::insertar();

