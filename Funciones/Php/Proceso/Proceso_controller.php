<?php

class Consulta_controller
{
    public static function Mostrar()
    {
        echo '<div style="display: none;" id="Proceso">
                <div class="container">
                    <h2 class="text-center">Panel De Proceso</h2>
                </div>
                <div style="margin-top: 5%;" class="container">
                    <div class="form-row">
                            <form method="POST" id="Formulario9">
                            <div class="form-row">
                                <div class="col" style="margin:1%">
                                    <label for="Fehca">Fecha</label>
                                    <input  autocomplete="off" class="form-control" type="date" name="Fecha9" id="Fecha9" placeholder="Fecha">
                                </div>
                                <div class="col" style="margin:1%">
                                    <label for="Placa">Placa</label>
                                    <input autocomplete="off" class="form-control" type="text" name="Placa9" id="Placa9" placeholder="Placa">
                                </div>
                                <div class="col" style="margin:1%">
                                    <label for="">&nbsp;</label><br>
                                    <button style="background-color:rgb(71, 123, 158);" onclick="return ShowProceso()" class="btn btn">Buscar</button>
                                </div>
                            </div>    
                            </form>
                        </div>
                    </div>
                </div>
                <div id="Respuesta9"></div>';
    }
}

Consulta_controller::Mostrar();
