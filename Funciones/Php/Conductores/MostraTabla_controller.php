<?php
require '../Conexion.php';
class MostrarUsuarios_controller
{
    public static function Mostrar()
    {
        try {

            $Conexion = new Conexion();
            $ConexionDb = $Conexion->conectar();
            $query = "SELECT * FROM conductores";

            $busqueda = $_POST['BuscadorConductores'];

            if (isset($busqueda)) {

                $r = $busqueda;
                $query = "SELECT * FROM conductores WHERE doc_identidad LIKE '%" . $r . "%'";

                $query = $ConexionDb->prepare($query);
                $query->execute();
                $arrDatos = $query->fetchAll(PDO::FETCH_ASSOC);

                $Filas = $query->rowCount();
                $count = 1;

                if ($Filas > 0) {
                    echo '<div style="position: absolute;width: 72%;">
                            <table  class="table">
                              <tr class = "thead-dark">
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Tipo De Licencia</th>
                                <th scope="col">Cedula</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Borrar</th>
                            </tr>';
                    foreach ($arrDatos as $respuesta) {
                        echo "<tr>
                            <input type='text' name='id2' id='id2" . $respuesta['id_conductores'] . "' value='" . $respuesta['id_conductores'] . "' style='display: none;'>
                            <td scope='col'>" . $count++. "</td>
                            <td scope='col'>" . $respuesta['nombre'] . "</td>
                            <td scope='col'>" . $respuesta['apellido'] . "</td>
                            <td scope='col'>" . $respuesta['correo'] . "</td>
                            <td scope='col'>" . $respuesta['telefono'] . "</td>
                            <td scope='col'>" . $respuesta['tipo_licencia'] . "</td>
                            <td scope='col'>" . $respuesta['doc_identidad'] . "</td>
                            <td scope='col'><center><button onclick='return EditarConductores(this)' data-toggle='modal' data-target='#EditarConductores' value='" . $respuesta['id_conductores'] . "' name = 'Boton' id = 'Boton' titulo='Editar' class='btn btn-dark' type='submit'><i class='fas fa-edit'></button></center></td>
                            <td scope='col'><center><button value='" . $respuesta['id_conductores'] . "' name = 'Boton' id = 'Boton' titulo='Borrar' class='btn btn-danger' type='submit' onclick='return BorrarConductores(this)'><i class='fas fa-trash-alt'></i></button></center></td>
                        </tr>";
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

