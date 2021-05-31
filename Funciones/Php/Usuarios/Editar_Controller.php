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

            $query = 'UPDATE usuarios SET nombre = :nombre, apellido = :apellido, correo = :correo, 
            cedula = :Cedula, clave = :pass, tipo_usuario = :tipo, telefono = :telefono WHERE id_usuario = :id';
            $sql = $Conexiondb->prepare($query);
            $sql->bindParam(':id', $_POST['id1']);
            $sql->bindParam(':nombre', $_POST['Nombre3']);
            $sql->bindParam(':apellido', $_POST['Apellido3']);
            $sql->bindParam(':correo', $_POST['Correo3']);
            $sql->bindParam(':Cedula', $_POST['Cedula3']);
            $sql->bindParam(':tipo', $_POST['tipousuario3']);
            $sql->bindParam(':telefono', $_POST['telefono3']);

            //Encriptado de la contraseña
            $passwordHash = md5($_POST['Contraseña3']);
            $sql->bindParam(':pass', $passwordHash);

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

