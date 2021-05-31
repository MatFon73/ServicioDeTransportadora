<?php
require '../Conexion.php';
class MostrarDatos_controller
{
    public static function Mostrar()
    {
        try {

            $Conexion = new Conexion();
            $ConexionDb = $Conexion->conectar();
            $query = "SELECT * FROM vehiculos WHERE id_vehiculo = :id";
            $query = $ConexionDb->prepare($query);
            $query->bindParam(':id', $_POST['id5']);
            $query->execute();
            $arrDatos = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($arrDatos as $respuesta) {
                echo '<div class="form-row">
                <div class="col">
                <input type="text" name="id5" id="id5' . $respuesta['id_vehiculo'] . '" value="' . $respuesta['id_vehiculo'] . '" style="display: none;">
                    <label>Placa</label>
                    <input value ="' . $respuesta['placa'] . '" autocomplete="off" placeholder="Placa" class="form-control" type="text" name="placa1" id="placa1">
                </div>
                <div class="col">
                    <label>Capacidad</label>
                    <input value ="' . $respuesta['capacidad'] . '" autocomplete="off" placeholder="Capacidad" class="form-control" type="text" name="capacidad1" id="capacidad1"></div>
                </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label>Remolque</label>
                    <input value ="' . $respuesta['remolque'] . '" autocomplete="off" placeholder="Remolque" class="form-control" type="text" name="remolque1" id="remolque1"></div>
                </div>
                ';
            }
        } catch (Exception $e) {

            echo 'error: ' . $e;
        }
    }
}
MostrarDatos_controller::Mostrar();