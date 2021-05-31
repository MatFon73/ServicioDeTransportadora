<?php
require '../Conexion.php';
class MostrarUsuarios_controller
{
    public static function Mostrar()
    {
        try {

            $Conexion = new Conexion();
            $ConexionDb = $Conexion->conectar();
            $query = "SELECT * FROM vehiculos";

            $busqueda = $_POST['BuscadorVehiculos'];

            if (isset($busqueda)) {

                $r = $busqueda;
                $query = "SELECT * FROM vehiculos WHERE placa LIKE '%" . $r . "%'";

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
                                <th scope="col">Placa</th>
                                <th scope="col">Capacidad</th>
                                <th scope="col">Remolque</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Borrar</th>
                            </tr>';
                    foreach ($arrDatos as $respuesta) {
                        echo "<tr>
                            <input type='text' name='id5' id='id5" . $respuesta['id_vehiculo'] . "' value='" . $respuesta['id_vehiculo'] . "' style='display: none;'>
                            <td scope='col'>" . $count++. "</td>
                            <td scope='col'>" . $respuesta['placa'] . "</td>
                            <td scope='col'>" . $respuesta['capacidad'] . "</td>
                            <td scope='col'>" . $respuesta['remolque'] . "</td>
                            <td scope='col'><center><button onclick='return EditarVehiculos(this)' data-toggle='modal' data-target='#EditarVehiculos' value='" . $respuesta['id_vehiculo'] . "' name = 'Boton' id = 'Boton' titulo='Editar' class='btn btn-dark' type='submit'><i class='fas fa-edit'></button></center></td>
                            <td scope='col'><center><button value='" . $respuesta['id_vehiculo'] . "' name = 'Boton' id = 'Boton' titulo='Borrar' class='btn btn-danger' type='submit' onclick='return BorrarVehiculos(this)'><i class='fas fa-trash-alt'></i></button></center></td>
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