<?php
require '../Conexion.php';
class MostrarUsuarios_controller
{
    public static function Mostrar()
    {
        try {

            $Conexion = new Conexion();
            $ConexionDb = $Conexion->conectar();
            $query = "SELECT * FROM transportadoras";

            $busqueda = $_POST['BuscadorTransportadoras'];

            if (isset($busqueda)) {

                $r = $busqueda;
                $query = "SELECT * FROM transportadoras WHERE nit LIKE '%" . $r . "%'";

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
                                <th scope="col">Descripcion</th>
                                <th scope="col">Nit</th>
                                <th scope="col">Contacto</th>
                                <th scope="col">Diereccion</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Borrar</th>
                            </tr>';
                    foreach ($arrDatos as $respuesta) {
                        echo "<tr>
                            <input type='text' name='id4' id='id4" . $respuesta['id_transportadora'] . "' value='" . $respuesta['id_transportadora'] . "' style='display: none;'>
                            <td scope='col'>" . $count++. "</td>
                            <td scope='col'>" . $respuesta['nombre'] . "</td>
                            <td scope='col'>" . $respuesta['descripcion'] . "</td>
                            <td scope='col'>" . $respuesta['nit'] . "</td>
                            <td scope='col'>" . $respuesta['contacto'] . "</td>
                            <td scope='col'>" . $respuesta['direccion'] . "</td>
                            <td scope='col'>" . $respuesta['estado'] . "</td>
                            <td scope='col'><center><button onclick='return EditarTransportadoras(this)' data-toggle='modal' data-target='#EditarTransportadoras' value='" . $respuesta['id_transportadora'] . "' name = 'Boton' id = 'Boton' titulo='Editar' class='btn btn-dark' type='submit'><i class='fas fa-edit'></button></center></td>
                            <td scope='col'><center><button value='" . $respuesta['id_transportadora'] . "' name = 'Boton' id = 'Boton' titulo='Borrar' class='btn btn-danger' type='submit' onclick='return BorrarTransportadoras(this)'><i class='fas fa-trash-alt'></i></button></center></td>
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

