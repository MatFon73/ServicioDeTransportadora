<?php
require '../Conexion.php';
class MostrarDatos_controller
{
    public static function Mostrar()
    {
        try {

            $Conexion = new Conexion();
            $ConexionDb = $Conexion->conectar();
            $query = "SELECT * FROM Productos WHERE id_producto = :id";
            $query = $ConexionDb->prepare($query);
            $query->bindParam(':id', $_POST['id3']);
            $query->execute();
            $arrDatos = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($arrDatos as $respuesta) {
                echo '<div class="form-row">
                <div class="col">
                <input type="text" name="id3" id="id3' . $respuesta['id_producto'] . '" value="' . $respuesta['id_producto'] . '" style="display: none;">
                    <label>Nombre</label>
                    <input value ="' . $respuesta['nombre'] . '" autocomplete="off" placeholder="Nombre" class="form-control" type="text" name="nombre_producto1" id="nombre_producto1">
                </div>
                <div class="col">
                    <label>Tipo</label>
                    <input value ="' . $respuesta['tipo_producto'] . '" autocomplete="off" placeholder="Tipo" class="form-control" type="number" name="tipo_producto1" id="tipo_producto1"></div>
                </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label>Descripcion</label>
                        <input value ="' . $respuesta['descripcion'] . '" autocomplete="off" placeholder="Descripcion" class="form-control" type="text" name="descripcion_producto1" id="descripcion_producto1"></div>
                    <div class="col">
                        <label>Estado</label>
                        <input value ="' . $respuesta['estado'] . '" autocomplete="off" placeholder="Estado" class="form-control" type="text" name="estado_producto1" id="estado_producto1">
                    </div>
                </div>
                </div>';
            }
        } catch (Exception $e) {

            echo 'error: ' . $e;
        }
    }
}
MostrarDatos_controller::Mostrar();

