<?php
require_once '../Conexion.php';

class  crearConductores_controller
{
    public static function insertar()
    {
        //instaciamiento de la clase
        $Conexion = new Conexion();
        $Conexiondb = $Conexion->conectar();

        try {

            //Iniciar una transacción, desactivando autocommit
            $Conexiondb->beginTransaction();

            $query = 'INSERT INTO conductores (doc_identidad, tipo_licencia, nombre, apellido, telefono, correo) VALUES (:cedula, :licencia, :nombre, :apellido, :telefono, :correo)';

            //Ejecuta una sentencia
            $sql = $Conexiondb->prepare($query);

            $sql->bindParam(':cedula', $_POST['doc_identidad']);
            $sql->bindParam(':licencia', $_POST['tipo_licencia']);
            $sql->bindParam(':nombre', $_POST['nombre_conductor']);
            $sql->bindParam(':apellido', $_POST['apellido_conductor']);
            $sql->bindParam(':telefono', $_POST['telefono_conductor']);
            $sql->bindParam(':correo', $_POST['correo_conductor']);


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
crearConductores_controller::insertar();

