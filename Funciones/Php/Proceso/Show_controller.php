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
            $query->bindParam(':fecha', $_POST['Fecha9']);
            $query->bindParam(':placa', $_POST['Placa9']);

            $query->execute();
            $arrDatos = $query->fetchAll(PDO::FETCH_ASSOC);
            $Filas = $query->rowCount();
            $count = 1;

            $query2 = "SELECT * FROM conductores";
            $query2 = $ConexionDb->prepare($query2);
            $query2->execute();
            $arrDatos2 = $query2->fetchAll(PDO::FETCH_ASSOC);

            if ($Filas > 0) {
                echo '<div style="margin-top:3%; position: absolute;width: 72%;">
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
                                <th scope="col">Hora</th>
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
                            <td scope='col'>" . $respuesta['hora'] . "</td>
                        </tr>";
                        }
                    }
                }
                echo '</table>';

                echo '<div>
                <div style="margin-top: 5%;" class="container">
                    <div class="form-row">
                            <form method="POST" id="Formulario10">
                            <div class="form-row">
                                <div class="col" style="margin:1%">
                                    <label for="Placa">Placa</label>
                                    <input autocomplete="off" class="form-control" type="text" name="Placa10" id="Placa10" placeholder="Placa">
                                </div>
                                <div class="col" style="margin:1%">
                                    <label for="Hora">Hora</label>
                                    <input autocomplete="off" class="form-control" type="time" name="Hora10" id="Hora10" placeholder="Hora">
                                </div>
                                <div class="col" style="margin:1%">
                                    <label for="Peso">Peso</label>
                                    <input autocomplete="off" class="form-control" type="number" name="Peso10" id="Peso10" placeholder="Peso">
                                </div>
                                <div class="col" style="margin:1%">
                                    <label for="observacion">Observacion</label>
                                    <input autocomplete="off" class="form-control" type="text" name="observacion10" id="observacion10" placeholder="Observacion">
                                </div>
                                <div class="col" style="margin:1%">
                                    <label for="">&nbsp;</label><br>
                                    <button style="background-color:rgb(71, 123, 158);" onclick="return AddProceso()" class="btn btn">Añadir</button>
                                </div>
                            </div>    
                            </form>
                        </div>
                    </div>
                </div>
                <div id="Respuesta"></div></div>';
            } else {
                echo "1";
            }
        } catch (Exception $e) {

            echo 'error: ' . $e;
        }
    }
}
MostrarConsulta_controller::Mostrar();
