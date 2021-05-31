<?php
require '../Conexion.php';
class MostrarUsuarios_controller
{
    public static function Mostrar()
    {
        try {

            $Conexion = new Conexion();
            $ConexionDb = $Conexion->conectar();
            $query = "SELECT * FROM usuarios";

            $busqueda = $_POST['BuscadorUsuarios'];

            if (isset($busqueda)) {

                $r = $busqueda;
                $query = "SELECT * FROM usuarios WHERE cedula LIKE '%" . $r . "%'";
                $query = $ConexionDb->prepare($query);
                $query->execute();
                $arrDatos = $query->fetchAll(PDO::FETCH_ASSOC);

                $query1 = "SELECT * FROM tipo_usuario";
                $query1 = $ConexionDb->prepare($query1);
                $query1->execute();
                $arrDatos1 = $query1->fetchAll(PDO::FETCH_ASSOC);

                $Filas = $query->rowCount();
                $count = 1;

                if ($Filas > 0) {
                    echo '<div style="position: absolute;width: 72%;">
                            <table  class="table">
                              <tr class = "thead-dark">
                                <th scope="col">#</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Cedula</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Borrar</th>
                            </tr>';
                    foreach ($arrDatos as $respuesta) {
                        foreach ($arrDatos1 as $respuesta1) {
                            if ($respuesta["tipo_usuario"] == $respuesta1["id"]) {
                                echo "<tr>
                            <input type='text' name='id' id='id" . $respuesta['id_usuario'] . "' value='" . $respuesta['id_usuario'] . "' style='display: none;'>
                            <td scope='col'>" . $count++ . "</td>
                            <td scope='col'>" . $respuesta['nombre'] . "</td>
                            <td scope='col'>" . $respuesta['apellido'] . "</td>
                            <td scope='col'>" . $respuesta['correo'] . "</td>
                            <td scope='col'>" . $respuesta['telefono'] . "</td>
                            <td scope='col'>" . $respuesta['cedula'] . "</td>
                            <td scope='col'>" . $respuesta1['tipo'] . "</td>
                            <td scope='col'><center><button onclick='return EditarUsuario(this)' data-toggle='modal' data-target='#EditarUsuario' value='" . $respuesta['id_usuario'] . "' name = 'Boton' id = 'Boton' titulo='Editar' class='btn btn-dark' type='submit'><i class='fas fa-edit'></button></center></td>
                            <td scope='col'><center><button value='" . $respuesta['id_usuario'] . "' name = 'Boton' id = 'Boton' titulo='Borrar' class='btn btn-danger' type='submit' onclick='return BorrarUsuario(this)'><i class='fas fa-trash-alt'></i></button></center></td>
                        </tr>";
                            }
                        }
                    }
                    echo '</table></div>';
                } else {
                    echo "1";
                }
            }
        } catch (Exception $e) {

            echo 'error: ' . $e;
        }
    }
}
MostrarUsuarios_controller::Mostrar();
