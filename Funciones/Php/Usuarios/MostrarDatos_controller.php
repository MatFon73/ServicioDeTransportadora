<?php
require '../Conexion.php';
class MostrarDatos_controller
{
    public static function Mostrar()
    {
        try {

            $Conexion = new Conexion();
            $ConexionDb = $Conexion->conectar();
            $query = "SELECT * FROM usuarios WHERE id_usuario = :id";
            $query = $ConexionDb->prepare($query);
            $query->bindParam(':id', $_POST['id']);
            $query->execute();
            $arrDatos = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($arrDatos as $respuesta) {
                echo '<div class="form-row">
                <div class="col">
                <input type="text" name="id1" id="id1' . $respuesta['id_usuario'] . '" value="' . $respuesta['id_usuario'] . '" style="display: none;">
                    <label>Nombre</label>
                    <input value ="' . $respuesta['nombre'] . '" autocomplete="off" placeholder="Nombre" class="form-control" type="text" name="Nombre3" id="Nombre3">
                </div>
                <div class="col">
                    <label>Apellido</label>
                    <input value ="' . $respuesta['apellido'] . '" autocomplete="off" placeholder="Apellido" class="form-control" type="text" name="Apellido3" id="Apellido3"></div>
                </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label>Cedula</label>
                    <input value ="' . $respuesta['cedula'] . '" autocomplete="off" placeholder="Cedula" class="form-control" type="text" name="Cedula3" id="Cedula3"></div>
                    <div class="col">
                        <label>Correo</label>
                        <input value ="' . $respuesta['correo'] . '" autocomplete="off" placeholder="Correo" class="form-control" type="text" name="Correo3" id="Correo3">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label>Telefono</label>
                    <input value ="' . $respuesta['telefono'] . '" autocomplete="off" placeholder="Telefono" class="form-control" type="text" name="telefono3" id="telefono3"></div>
                    <div class="col">
                        <label>Tipo De Usuario</label>
                        <input value ="' . $respuesta['tipo_usuario'] . '" autocomplete="off" placeholder="text" class="form-control" type="text" name="tipousuario3" id="tipousuario3">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label>Contraseña</label>
                    <input autocomplete="off" placeholder="Contraseña" class="form-control" type="password" name="Contraseña3" id="Contraseña3"></div>
                    <div class="col">
                        <label>Repetir Contraseña</label>
                        <input autocomplete="off" placeholder="Repetir Contraseña" class="form-control" type="password" name="Rcontraseña3" id="Rcontraseña3">
                    </div>
                </div>';
            }
        } catch (Exception $e) {

            echo 'error: ' . $e;
        }
    }
}
MostrarDatos_controller::Mostrar();

