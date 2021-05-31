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

            $query = 'UPDATE productos SET nombre = :nombre, tipo_producto = :tipo, descripcion = :descripcion, 
            estado = :estado WHERE id_producto = :id';
            $sql = $Conexiondb->prepare($query);
            $sql->bindParam(':id', $_POST['id3']);
            $sql->bindParam(':nombre', $_POST['nombre_producto1']);
            $sql->bindParam(':tipo', $_POST['tipo_producto1']);
            $sql->bindParam(':descripcion', $_POST['descripcion_producto1']);
            $sql->bindParam(':estado', $_POST['estado_producto1']);

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

