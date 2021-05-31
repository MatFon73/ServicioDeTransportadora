<?php
require '../../Conexion.php';
class Edit_view
{
    public static function Mostrar()
    {
        try {

            $Conexion = new Conexion();
            $ConexionDb = $Conexion->conectar();
            $query = "SELECT * FROM movimientos WHERE id_movimiento = :id";
            $query = $ConexionDb->prepare($query);
            $query->bindParam(':id', $_POST['id6']);
            $query->execute();
            $arrDatos = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($arrDatos as $respuesta) {
                echo '
             <form id="EditarEvento">
                 <div class="form-row">
                     <div class="col">
                     <input style="display:none" type="text" name="id6" id="id6"' . $respuesta["id_movimiento"] . '" value="' . $respuesta['id_movimiento'] . '" > </td>
                         <label for="fecha">Fecha</label><br />
                         <input value="' . $respuesta['fecha'] . '" name="fecha_movieminto2" id="fecha_movieminto2" class="form-control" autocomplete="off" type="date" placeholder="Fecha" />
                     </div>
                     <div class="col">
                         <label for="producto">Producto</label>
                         <input value="' . $respuesta['producto'] . '" name="producto_movimiento2" id="producto_movimiento2" class="form-control" autocomplete="off" type="text" placeholder="Producto" />
                     </div>
                 </div>
                 <div class="form-row">
                     <div class="col">
                         <label for="placa">Placa</label>
                         <input value="' . $respuesta['placa'] . '" name="placa_movieminto2" id="placa_movieminto2" class="form-control" autocomplete="off" type="text" placeholder="Placa" />
                     </div>
                     <div class="col">
                         <label for="transportadora">Transportadora</label>
                         <input value="' . $respuesta['transportadora'] . '" name="trasportadora_movimiento2" id="trasportadora_movimiento2" class="form-control" autocomplete="off" type="text" placeholder="Transportadora" />
                     </div>
                 </div>
                 <div class="form-row">
                     <div class="col">
                         <label for="destino">Destino</label>
                         <input value="' . $respuesta['destino'] . '" name="destino_movimiento2" id="destino_movimiento2" class="form-control" autocomplete="off" type="text" placeholder="Destino" />
                     </div>
                     <div class="col">
                         <label for="origen">Origen</label>
                         <input value="' . $respuesta['origen'] . '" name="origen_movimiento2" id="origen_movimiento2" class="form-control" autocomplete="off" type="text" placeholder="Origen" />
                     </div>
                 </div>
                 <div class="form-row">
                     <div class="col">
                         <label for="cedula_usuario">Cedula Usuario</label>
                         <input value="' . $respuesta['cedula_usuario'] . '" name="cedula_usuario2" id="cedula_usuario2" class="form-control" autocomplete="off" type="text" placeholder="Cedula De Usuario" />
                     </div>
                     <div class="col">
                         <label for="cedula_conductor">Cedula Conductor</label>
                         <input value="' . $respuesta['cedula_conductor'] . '" name="cedula_conductor2" id="cedula_conductor2" class="form-control" autocomplete="off" type="text" placeholder="Cedula De Conductor" />
                     </div>
                 </div>
                 <div class="form-row">
                     <div class="col">
                         <label for="observacion">Observacion</label>
                         <input value="' . $respuesta['observacion'] . '" name="observacion_movimiento2" id="observacion_movimiento2" class="form-control" autocomplete="off" type="text" placeholder="Observacion" />
                     </div>
                     <div class="col">
                         <label for="tipo_movimiento">Tipo Movimiento</label>
                         <input value="' . $respuesta['tipo_movimiento'] . '" name="tipo_movimiento2" id="tipo_movimiento2" class="form-control" autocomplete="off" type="text" placeholder="Tipo De Movimiento" />
                     </div>
                 </div>
                 <div class="form-row" style="margin-bottom:3%;">
                     <div class="col">
                         <label for="hora">hora</label>
                         <input value="' . $respuesta['hora'] . '" name="hora_movimiento1" id="hora_movimiento1" class="form-control" autocomplete="off" type="text" placeholder="Hora" />
                     </div>
                     <div class="col">
                         <label for="Estado">Estado</label>
                         <input value="' . $respuesta['estado'] . '" name="estado_movieminto2" id="estado_movieminto2" class="form-control" autocomplete="off" type="text" placeholder="Estado" />
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button onclick="return Edit()" style="background-color:  rgb(71, 123, 158);" type="button" class="btn btn">Registar</button>
                     <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                 </div>
             </div>
             </form>
         </div>';
            }
        } catch (Exception $e) {

            echo 'error: ' . $e;
        }
    }
}
Edit_view::Mostrar();
