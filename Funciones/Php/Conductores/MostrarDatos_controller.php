<?php
require '../Conexion.php';
class MostrarDatos_controller
{
    public static function Mostrar()
    {
        try {

            $Conexion = new Conexion();
            $ConexionDb = $Conexion->conectar();
            $query = "SELECT * FROM conductores WHERE id_conductores = :id";
            $query = $ConexionDb->prepare($query);
            $query->bindParam(':id', $_POST['id2']);
            $query->execute();
            $arrDatos = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($arrDatos as $respuesta) {
                echo '<div class="form-row">
                <div class="col">
                <input type="text" name="id2" id="id2' . $respuesta['id_conductores'] . '" value="' . $respuesta['id_conductores'] . '" style="display: none;">
                    <label>Nombre</label>
                    <input value ="' . $respuesta['nombre'] . '" autocomplete="off" placeholder="Nombre" class="form-control" type="text" name="nombre_conductor1" id="nombre_conductor1">
                </div>
                <div class="col">
                    <label>Apellido</label>
                    <input value ="' . $respuesta['apellido'] . '" autocomplete="off" placeholder="Apellido" class="form-control" type="text" name="apellido_conductor1" id="apellido_conductor1"></div>
                </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label>Cedula</label>
                    <input value ="' . $respuesta['doc_identidad'] . '" autocomplete="off" placeholder="Cedula" class="form-control" type="text" name="doc_identidad1" id="doc_identidad1"></div>
                    <div class="col">
                        <label>Correo</label>
                        <input value ="' . $respuesta['correo'] . '" autocomplete="off" placeholder="Correo" class="form-control" type="text" name="correo_conductor1" id="correo_conductor1">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label>Telefono</label>
                        <input autocomplete="off" value="'.$respuesta['telefono'].'" placeholder="Telefono" class="form-control" type="text" name="telefono_conductor1" id="telefono_conductor1"></div>
                    <div class="col">
                        <label>Licencia</label>
                        <input autocomplete="off" value="'.$respuesta['tipo_licencia'].'" placeholder="Licencia" class="form-control" type="text" name="tipo_licencia1" id="tipo_licencia1">
                    </div>
                </div>';
            }
        } catch (Exception $e) {

            echo 'error: ' . $e;
        }
    }
}
MostrarDatos_controller::Mostrar();

