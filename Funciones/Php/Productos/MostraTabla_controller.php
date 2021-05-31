<?php
require '../Conexion.php';
class MostrarProducto_controller
{
    public static function Mostrar()
    {
        try {

            $Conexion = new Conexion();
            $ConexionDb = $Conexion->conectar();
            $query = "SELECT * FROM Productos";

            $busqueda = $_POST['BuscadorProductos'];

            if (isset($busqueda)) {

                $r = $busqueda;
                $query = "SELECT * FROM Productos WHERE nombre LIKE '%" . $r . "%'";
                $query = $ConexionDb->prepare($query);
                $query->execute();
                $arrDatos = $query->fetchAll(PDO::FETCH_ASSOC);
                $Filas = $query->rowCount();
                $count = 1;

                $query2 = "SELECT * FROM tipo_producto";
                $query2 = $ConexionDb->prepare($query2);
                $query2->execute();
                $arrDatos2 = $query2->fetchAll(PDO::FETCH_ASSOC);

                if ($Filas > 0) {
                    echo '<div style="position: absolute;width: 72%;">
                            <table  class="table">
                              <tr class = "thead-dark">
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Borrar</th>
                            </tr>';
                    foreach ($arrDatos as $respuesta) {
                        foreach ($arrDatos2 as $respuesta2) {
                            if ($respuesta["tipo_producto"] == $respuesta2["id_tipo_producto"]) {

                                echo "<tr>
                            <input type='text' name='id3' id='id3" . $respuesta['id_producto'] . "' value='" . $respuesta['id_producto'] . "' style='display: none;'>
                            <td scope='col'>" . $count++ . "</td>
                            <td scope='col'>" . $respuesta['nombre'] . "</td>
                            <td scope='col'>" . $respuesta2['nombre'] . "</td>
                            <td scope='col'>" . $respuesta['descripcion'] . "</td>
                            <td scope='col'>" . $respuesta['estado'] . "</td>
                            <td scope='col'><center><button onclick='return EditarProductos(this)' data-toggle='modal' data-target='#EditarProductos' value='" . $respuesta['id_producto'] . "' name = 'Boton' id = 'Boton' titulo='Editar' class='btn btn-dark' type='submit'><i class='fas fa-edit'></button></center></td>
                            <td scope='col'><center><button value='" . $respuesta['id_producto'] . "' name = 'Boton' id = 'Boton' titulo='Borrar' class='btn btn-danger' type='submit' onclick='return BorrarProductos(this)'><i class='fas fa-trash-alt'></i></button></center></td>
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
MostrarProducto_controller::Mostrar();

