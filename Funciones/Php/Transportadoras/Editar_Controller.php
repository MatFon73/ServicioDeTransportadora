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

            $query = 'UPDATE transportadoras SET nombre = :nombre, descripcion = :descripcion, nit = :nit, 
            contacto = :contacto, direccion = :direccion, estado = :estado WHERE id_transportadora = :id';
            $sql = $Conexiondb->prepare($query);
            $sql->bindParam(':id', $_POST['id4']);
            $sql->bindParam(':nombre', $_POST['nombre_transportadoras1']);
            $sql->bindParam(':descripcion', $_POST['descripcion_transportadoras1']);
            $sql->bindParam(':nit', $_POST['nit_transportadora1']);
            $sql->bindParam(':contacto', $_POST['contacto_transportadoras1']);
            $sql->bindParam(':direccion', $_POST['direccion_transportadoras1']);
            $sql->bindParam(':estado', $_POST['estado_transportadoras1']);

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

