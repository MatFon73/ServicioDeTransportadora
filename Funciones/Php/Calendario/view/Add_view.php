<?php
class Add_view
{
    public static function Mostrar()
    {
        echo '<form id="AñadirEvento">
        <div class="form-row">
            <div class="col">
                <label for="tipo movimiento">tipo movimiento</label><br />
                <input name="tipo_movimiento1" id="tipo_movimiento1" class="form-control" autocomplete="off" type="text" placeholder="tipo" />
            </div>
            <div class="col">
                <label for="producto_movimiento1">producto</label>
                <input name="producto_movimiento1" id="producto_movimiento1" class="form-control" autocomplete="off" type="text" placeholder="producto" />
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <label for="origen_movimiento1">origen</label>
                <input name="origen_movimiento1" id="origen_movimiento1" class="form-control" autocomplete="off" type="text" placeholder="origen" />
            </div>
            <div class="col">
                <label for="destino_movimiento1">destino</label>
                <input name="destino_movimiento1" id="destino_movimiento1" class="form-control" autocomplete="off" type="text" placeholder="destino" />
            </div>
        </div>
        <div class="form-row" style="margin-bottom:3%;">
            <div class="col">
                <label for="hora_movimiento1">hora</label>
                <input name="hora_movimiento1" id="hora_movimiento1" class="form-control" autocomplete="off" type="time" placeholder="hora" />
            </div>
            <div class="col">
                <label for="estado_movimiento">estado</label>
                <input name="estado_movimiento1" id="estado_movimiento1" class="form-control" autocomplete="off" type="text" placeholder="estado" />
            </div>
        </div>
    </div>
    <div class="form-row">
            <div class="col">
                <label for="trasportadora_movimiento1">trasportadora</label><br />
                <input name="trasportadora_movimiento1" id="trasportadora_movimiento1" class="form-control" autocomplete="off" type="text" placeholder="trasportadora" />
            </div>
            <div class="col">
                <label for="fecha_movimiento1">Fecha</label>
                <input name="fecha_movimiento1" id="fecha_movimiento1" class="form-control" autocomplete="off" type="date" placeholder="Fecha" />
            </div>
        </div>
        <div class="form-row">
        <div class="col">
            <label for="placa_movimiento1">placa</label><br />
            <input name="placa_movimiento1" id="placa_movimiento1" class="form-control" autocomplete="off" type="text" placeholder="placa" />
        </div>
        <div class="col">
            <label for="observacion_movimiento1">observacion</label>
            <input name="observacion_movimiento1" id="observacion_movimiento1" class="form-control" autocomplete="off" type="text" placeholder="observacion" />
        </div>
    </div>
    <div class="form-row">
            <div class="col">
                <label for="cedula_conductor1">producto cedula conductor</label>
                <input name="cedula_conductor1" id="cedula_conductor1" class="form-control" autocomplete="off" type="text" placeholder="cedula conductor" />
            </div>
        </div>
    <div class="modal-footer">
            <button onclick="return Add()" style="background-color:  rgb(71, 123, 158);" type="button" class="btn btn">Registar</button>
            <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
        </div>
    </form>';
    }
}
Add_view::Mostrar();
