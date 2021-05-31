<?php
require '../Conexion.php';
class MostrarDatos_controller
{
    public static function Mostrar()
    {
        try {

            $Conexion = new Conexion();
            $ConexionDb = $Conexion->conectar();
            $query = "SELECT * FROM transportadoras WHERE id_transportadora = :id";
            $query = $ConexionDb->prepare($query);
            $query->bindParam(':id', $_POST['id4']);
            $query->execute();
            $arrDatos = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($arrDatos as $respuesta) {
                echo '<div class="form-row">
                <div class="col">
                <input type="text" name="id4" id="id4' . $respuesta['id_transportadora'] . '" value="' . $respuesta['id_transportadora'] . '" style="display: none;">
                    <label>Nombre</label>
                    <input value ="' . $respuesta['nombre'] . '" autocomplete="off" placeholder="Nombre" class="form-control" type="text" name="nombre_transportadoras1" id="nombre_transportadoras1">
                </div>
                <div class="col">
                    <label>Descripcion</label>
                    <input value ="' . $respuesta['descripcion'] . '" autocomplete="off" placeholder="Descripcion" class="form-control" type="text" name="descripcion_transportadoras1" id="descripcion_transportadoras1"></div>
                </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label>Nit</label>
                    <input value ="' . $respuesta['nit'] . '" autocomplete="off" placeholder="Nit" class="form-control" type="number" name="nit_transportadora1" id="nit_transportadora1"></div>
                    <div class="col">
                        <label>Contacto</label>
                        <input value ="' . $respuesta['contacto'] . '" autocomplete="off" placeholder="Contacto" class="form-control" type="number" name="contacto_transportadoras1" id="contacto_transportadoras1">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label>Direccion</label>
                    <input value ="' . $respuesta['direccion'] . '" autocomplete="off" placeholder="Direccion" class="form-control" type="text" name="direccion_transportadoras1" id="direccion_transportadoras1"></div>
                    <div class="col">
                        <label>Estado</label>
                        <input value ="' . $respuesta['estado'] . '" autocomplete="off" placeholder="Estado" class="form-control" type="text" name="estado_transportadoras1" id="estado_transportadoras1">
                    </div>
                </div>';
            }
        } catch (Exception $e) {

            echo 'error: ' . $e;
        }
    }
}
MostrarDatos_controller::Mostrar();

