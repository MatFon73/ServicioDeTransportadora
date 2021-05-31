<?php
class Vehiculos_controller{
    public static function Mostrar(){
        echo '<div style="display: none;" id="Vehiculos">
        <div class="container">
            <h2 class="text-center"> Panel De Control De Vehiculos</h2>
        </div>
        <div style="margin-top: 5%;" class="container">
            <div class="form-row">
                <div class="col"><button style="background-color:rgb(71, 123, 158);" data-toggle="modal" data-target="#AñadirVehiculos" class="btn btn">Añardir Usurios</button>
                </div>
                <div class="col">
                    <form method="POST" id="BuscarVehiculos">
                        <input autocomplete="off" onkeyup="return BuscarVehiculos()" class="form-control" type="text" name="BuscadorVehiculos" id="BuscadorVehiculos" placeholder="Buscador Por Placa">
                    </form>
                </div>
            </div>
        </div>
        <br>
        <div id="ResultadoVehiculos">
            <h1 class="text-center"><i class="fas fa-exclamation-triangle"></i>&nbsp;No Hay Busqueda</h1>
        </div>
</div>
<main class="container">
    <div id="AñadirVehiculos" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-users"></i></i>&nbsp;Añadir Vehiculos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="Formulario5">
                        <div class="form-row">
                            <div class="col">
                                <label>Placa</label>
                                <input autocomplete="off" placeholder="Placa" class="form-control" type="text" name="placa" id="placa">
                            </div>
                            <div class="col">
                                <label>Capacidad</label>
                                <input autocomplete="off" placeholder="Capacidad" class="form-control" type="text" name="capacidad" id="capacidad"></div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label>Remolque</label>
                                <input autocomplete="off" placeholder="Remolque" class="form-control" type="text" name="remolque" id="remolque">
                            </div>
                        </div>
                        
                </div>
                <div class="modal-footer">
                    <button onclick="return AñadirVehiculos()" style="background-color:  rgb(71, 123, 158);" type="button" class="btn btn">Registar</button>
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</main>

<main class="container">
    <div id="EditarVehiculos" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-users"></i>&nbsp;Editar Vehiculos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="EditarVehiculos1">
                        <div id="ModificarVehiculos">
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button onclick="return ActulizarVehiculos()" style="background-color:  rgb(71, 123, 158);" type="button" class="btn btn">Actulizar</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
</main>';
    }
}
Vehiculos_controller:: Mostrar();