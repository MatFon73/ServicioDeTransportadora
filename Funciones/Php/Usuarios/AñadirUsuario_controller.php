<?php
require_once '../Conexion.php';

class  crearUsuario_controller
{
    public static function insertar()
    {
        //instaciamiento de la clase
        $Conexion = new Conexion();
        $Conexiondb = $Conexion->conectar();

       $foto = "Publicas/perfil/default.jpg";

        $sql0 = ("SELECT COUNT(*) FROM usuarios WHERE Cedula = :Cedula");
        $Cedula = $Conexiondb->prepare($sql0);
        $Cedula->bindParam(':Cedula', $_POST['Cedula2']);
        $Cedula->execute();

        $sql1 = ("SELECT COUNT(*) FROM usuarios WHERE Correo = :correo");
        $correo = $Conexiondb->prepare($sql1);
        $correo->bindParam(':correo', $_POST['Correo2']);
        $correo->execute();

        if ($correo->fetchColumn() > 0) {
            echo 'Ya Existe Ese Correo.';
            exit();
        } else {
            if ($Cedula->fetchColumn() > 0) {
                echo 'Ya Existe Ese Cedula.';
                exit();
            } else {

                try {

                    //Iniciar una transacción, desactivando autocommit
                    $Conexiondb->beginTransaction();

                    $query = 'INSERT INTO usuarios (nombre, apellido, cedula, telefono, correo, clave, tipo_usuario, Foto) VALUES (:Nombre, :Apellido,  :Cedula, :Telefono, :Correo, :Pass, :Tipo, :Foto)';

                    //Ejecuta una sentencia
                    $sql = $Conexiondb->prepare($query);

                    $sql->bindParam(':Nombre', $_POST['Nombre2']);
                    $sql->bindParam(':Apellido', $_POST['Apellido2']);
                    $sql->bindParam(':Correo', $_POST['Correo2']);
                    $sql->bindParam(':Cedula', $_POST['Cedula2']);
                    $sql->bindParam(':Telefono', $_POST['Telefono2']);
                    $sql->bindParam(':Tipo', $_POST['Tipousuario2']);
                    $sql->bindParam(':Foto', $foto);


                    //Encriptado de la contraseña
                    $passwordHash = md5($_POST['Contraseña2']);

                    $sql->bindParam(':Pass', $passwordHash);

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
    }
}
crearUsuario_controller::insertar();

