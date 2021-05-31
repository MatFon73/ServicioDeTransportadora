<?php
require '../Conexion.php';
class MostrarConsulta_controller
{
    public static function Mostrar()
    {
        try {

            $Conexion = new Conexion();
            $ConexionDb = $Conexion->conectar();

            $query = "SELECT * FROM movimientos WHERE placa = :placa and fecha = :fecha";
            $query = $ConexionDb->prepare($query);
            $query->bindParam(':fecha', $_POST['Fecha']);
            $query->bindParam(':placa', $_POST['Placa']);
            $query->execute();
            $arrDatos = $query->fetchAll(PDO::FETCH_ASSOC);
            $Filas = $query->rowCount();
            $count = 1;

            $query2 = "SELECT * FROM conductores";
            $query2 = $ConexionDb->prepare($query2);
            $query2->execute();
            $arrDatos2 = $query2->fetchAll(PDO::FETCH_ASSOC);

            if ($Filas > 0) {
                echo '<div style="position: absolute;width: 72%;">
                            <table  class="table">
                              <tr class = "thead-dark">
                                <th scope="col">#</th>
                                <th scope="col">Nombre Del Conductor</th>
                                <th scope="col">Tipo Movimiento</th>
                                <th scope="col">Origen</th>
                                <th scope="col">Destino</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Transportadora</th>
                            </tr>';
                foreach ($arrDatos as $respuesta) {
                    foreach ($arrDatos2 as $respuesta2) {
                        if ($respuesta2['doc_identidad'] == $respuesta['cedula_conductor']) {
                            echo "<tr>
                            <td scope='col'>" . $count++ . "</td>
                            <td scope='col'>" . $respuesta2['nombre'] ." ". $respuesta2['apellido']."</td>
                            <td scope='col'>" . $respuesta['tipo_movimiento'] . "</td>
                            <td scope='col'>" . $respuesta['origen'] . "</td>
                            <td scope='col'>" . $respuesta['destino'] . "</td>
                            <td scope='col'>" . $respuesta['estado'] . "</td>
                            <td scope='col'>" . $respuesta['producto'] . "</td>
                            <td scope='col'>" . $respuesta['transportadora'] . "</td>
                        </tr>";
                        }
                    }
                }
                echo '</table></div>';
            } else {
                echo "1";
            }
        } catch (Exception $e) {

            echo 'error: ' . $e;
        }
    }
}
MostrarConsulta_controller::Mostrar();
