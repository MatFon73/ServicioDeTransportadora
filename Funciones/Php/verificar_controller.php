<?php
require 'Conexion.php';
class Verificar_controller
{
  public static function Contraseña()
  {
    try {
     
        $Conexion = new Conexion();
        $ConexionDb = $Conexion->conectar();

        $Cedula = $_POST['Cedula'];
        $Correo = $_POST['Correo'];

        $sql = 'SELECT * FROM usuarios WHERE cedula = :Cedula AND correo = :Correo';
        $query = $ConexionDb->prepare($sql);
        $query->bindParam(':Cedula', $Cedula);
        $query->bindParam(':Correo', $Correo);
        $query->execute();

        $Filas = $query->rowCount();

        if($Filas >0 ){
          echo'
             <div class="form-row">
                   <div class="col">
                       <label class="mr-sm-2" for="Contraseña" title="Campo Oblicatorio">Contraseña *</label>
                       <input class="form-control" placeholder="Contraseña" type="password" name="Contraseña" id="Contraseña">
                   </div>
                   <div class="col">
                       <label class="mr-sm-2" for="Contraseña" title="Campo Oblicatorio">Repetir Contraseña *</label>
                       <input class="form-control" placeholder="Repetir Contraseña" type="password" name="RContraseña" id="RContraseña">
                   </div>
               </div>
              <center><button titulo="Recuperar" style="margin:2%; background-color: rgb(71, 123, 158);" class="btn btn" type="submit" onclick="return Recuperar()"><i class="fas fa-paper-plane" style="color:black"></i>&nbsp;Actulizar</button></center><br>
           ';
        }else{
            echo "No Se Puede Comprobar Los Datos";
        }

    } catch (PDOException $e) {
      echo 'Error: ' . $e;
    }
  }
}

Verificar_controller::Contraseña();

