<?php

class cerrarSesion_controller
{
  public static function Cerrar()
  {
    try {
      session_start();

      $cerrar = session_destroy();

      if(isset($_SESSION['Autentificar'])){
        if ($cerrar === true) {
          echo 'Se Cerro Con Exito La Sesion.';
          exit();
        } else {
          echo 'Error Al Cerrar Sesion.';
        }
      }else{
        echo 'No Hay Una Sesion';
      }
      
    } catch (PDOException $e) {
      echo 'Error: ' . $e;
    }
  }
}

cerrarSesion_controller::Cerrar();

