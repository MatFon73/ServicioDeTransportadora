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

            $query = 'UPDATE conductores SET doc_identidad = :cedula, tipo_licencia = :licencia, 
            nombre = :nombre, apellido = :apellido, telefono = :telefono,
            correo = :correo WHERE id_conductores = :id';

            $sql = $Conexiondb->prepare($query);
            $sql->bindParam(':id', $_POST['id2']);
            $sql->bindParam(':cedula', $_POST['doc_identidad1']);
            $sql->bindParam(':licencia', $_POST['tipo_licencia1']);
            $sql->bindParam(':nombre', $_POST['nombre_conductor1']);
            $sql->bindParam(':apellido', $_POST['apellido_conductor1']);
            $sql->bindParam(':telefono', $_POST['telefono_conductor1']);
            $sql->bindParam(':correo', $_POST['correo_conductor1']);

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

