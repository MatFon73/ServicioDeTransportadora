<?php
require_once '../Conexion.php';
class Mostrar_controller
{
    public static function Datos()
    {
        $Conexion = new Conexion();
        $ConexionDb = $Conexion->conectar();
        $query = "SELECT * FROM movimientos WHERE fecha = :Fecha ";
        $query = $ConexionDb->prepare($query);
        $query->bindParam(':Fecha', $_POST['dia']);
        $query->execute();
        $arrDatos = $query->fetchAll(PDO::FETCH_ASSOC);

        $query2 = "SELECT * FROM usuarios";
        $query2 = $ConexionDb->prepare($query2);
        $query2->execute();
        $arrDatos2 = $query2->fetchAll(PDO::FETCH_ASSOC);

        $query3 = "SELECT * FROM conductores";
        $query3 = $ConexionDb->prepare($query3);
        $query3->execute();
        $arrDatos3 = $query3->fetchAll(PDO::FETCH_ASSOC);


        $Filas = $query->rowCount();


        try {
            if ($Filas < 1) {
                echo 'No hay eventos.';
            } else {
                foreach ($arrDatos as $respuesta) {
                    foreach ($arrDatos2 as $respuesta2) {
                        foreach ($arrDatos3 as $respuesta3) {
                        if($respuesta['cedula_usuario'] == $respuesta2['cedula'] && $respuesta['cedula_conductor'] == $respuesta3["doc_identidad"]){
                            echo '
                            <div style="" class="container-fluid">
                            <div class="row">
                            <div class="col-md-12">';
                            echo '<div style="padding:0px; background:white; class="jumbotron card card-block">
                                <h2>
                                    '.$respuesta2["nombre"]." ".$respuesta2["apellido"].'
                                </h2>
                                <p>
                                    Obervacion: '.$respuesta['observacion'].'<br>
                                    Conductor: '.$respuesta3["nombre"]." ".$respuesta2["apellido"].'
                                </p>';
                            }
                        }
                    }
                
                    echo "
                    <p><table class='table'>
                <tr class = 'thead-dark'>
                  <th scope='col'>Tipo Movimiento</th>
                  <th scope='col'>Origen</th>
                  <th scope='col'>Destino</th>
                  <th scope='col'>Hora</th>
                  <th scope='col'>Producto</th>
                  <th scope='col'>Estado</th>
                  <th scope='col'>Placa</th>
                  <th scope='col'>Conductor</th>
                  <th scope='col'>Trasportadora</th>
                </tr><tr>
                    <td scope='col' '><input type='text' name='id6' id='id6" . $respuesta['id_movimiento'] . "' value='" . $respuesta['id_movimiento'] . "' style='display: none;> </td>
                    <td scope='col'>" . $respuesta['tipo_movimiento'] . "</td>
                    <td scope='col'>" . $respuesta['origen'] . "</td>
                    <td scope='col'>" . $respuesta['destino'] . "</td>
                    <td scope='col'>" . $respuesta['hora'] . "</td>
                    <td scope='col'>" . $respuesta['producto'] . "</td>
                    <td scope='col'>" . $respuesta['estado'] . "</td>
                    <td scope='col'>" . $respuesta['placa'] . "</td>
                    <td scope='col'>" . $respuesta['cedula_conductor'] . "</td>
                    <td scope='col'>" . $respuesta['transportadora'] . "</td>
                    </tr></table></p>
                    <div>
                        <p>
                            <button style='margin:1%; font-size:10px; float:right;' onclick='return Editview(this)' data-toggle='modal' data-target='#Vista' value='" . $respuesta['id_movimiento'] . "' name = 'Boton' id = 'Boton' titulo='Editar' class='btn btn-dark' type='submit'><i class='fas fa-edit'></i></button>
                            <button style='margin:1%; font-size:10px; float:right;' value='" . $respuesta['id_movimiento'] . "' name = 'Boton' id = 'Boton' titulo='Borrar' class='btn btn-danger' type='submit' onclick='return Borrar(this)'><i class='fas fa-trash-alt'></i></button>
                        </p>
			        </div>
                </div>
		    </div>
	    </div>
   </div>";
                }
                echo '';
            }
        } catch (Exception $e) {

            echo 'error: ' . $e;
        }
    }
}
Mostrar_controller::Datos();
