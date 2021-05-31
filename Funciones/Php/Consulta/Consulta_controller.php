<?php

class Consulta_controller
{
    public static function Mostrar()
    {
        echo '<div style="display: none;" id="Consultar">
                <div class="container">
                    <h2 class="text-center"> Panel De Consulta</h2>
                </div>
                <div style="margin-top: 5%;" class="container">
                    <div class="form-row">
                            <form method="POST" id="Formulario">
                            <div class="form-row">
                                <div class="col" style="margin:1%">
                                    <label for="Fehca">Fecha</label>
                                    <input  autocomplete="off" class="form-control" type="date" name="Fecha" id="Fecha" placeholder="Fecha">
                                </div>
                                <div class="col" style="margin:1%">
                                    <label for="Placa">Placa</label>
                                    <input autocomplete="off" class="form-control" type="text" name="Placa" id="Placa" placeholder="Placa">
                                </div>
                                <div class="col" style="margin:1%">
                                    <label for="">&nbsp;</label><br>
                                    <button style="background-color:rgb(71, 123, 158);" onclick="return Show()" class="btn btn">Buscar</button>
                                </div>
                            </div>    
                            </form>
                        </div>
                    </div>
                </div>
                <div id="Respuesta"></div>';
    }
}

Consulta_controller::Mostrar();
