<?php
require 'Conexion.php';
class Recuperar_controller
{
  public static function Contraseña()
  {
    try {
     
        $Conexion = new Conexion();
        $ConexionDb = $Conexion->conectar();

        $Cedula = $_POST['Cedula'];

        $query = 'UPDATE usuarios SET clave = :pass WHERE cedula = :Cedula';
        $sql = $ConexionDb->prepare($query);
        $sql->bindParam(':Cedula', $Cedula);
        $passwordHash = md5($_POST['Contraseña']);
        $sql->bindParam(':pass', $passwordHash);

        //ejecucion del SQL

        echo "Se Ha Actulizado Con Exito.";
        $sql->execute();
    } catch (PDOException $e) {
      echo 'Error: ' . $e;
    }
  }
}

Recuperar_controller::Contraseña();

