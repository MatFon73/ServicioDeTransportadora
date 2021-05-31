<?php

class Transportadoras_controller{
    public static function Mostrar(){
        echo '<div style="display: none;" id="Transportadoras">
        <div class="container">
            <h2 class="text-center"> Panel De Control De Transportadoras</h2>
        </div>
        <div style="margin-top: 5%;" class="container">
            <div class="form-row">
                <div class="col"><button style="background-color:rgb(71, 123, 158);" data-toggle="modal" data-target="#AñadirTransportadoras" class="btn btn">Añardir Transportadoras</button>
                </div>
                <div class="col">
                    <form method="POST" id="BuscarTransportadoras">
                        <input autocomplete="off" onkeyup="return BuscarTransportadoras()" class="form-control" type="number" name="BuscadorTransportadoras" id="BuscadorTransportadoras" placeholder="Buscador Por Nit">
                    </form>
                </div>
            </div>
        </div>
        <br>
        <div id="ResultadoTransportadoras">
            <h1 class="text-center"><i class="fas fa-exclamation-triangle"></i>&nbsp;No Hay Busqueda</h1>
        </div>
</div>
<main class="container">
    <div id="AñadirTransportadoras" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-users"></i></i>&nbsp;Añadir Transportadoras</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="Formulario4">
                        <div class="form-row">
                            <div class="col">
                                <label>Nombre</label>
                                <input autocomplete="off" placeholder="Nombre" class="form-control" type="text" name="nombre_transportadoras" id="nombre_transportadoras">
                            </div>
                            <div class="col">
                                <label>Descripcion</label>
                                <input autocomplete="off" placeholder="Descripcion" class="form-control" type="text" name="descripcion_transportadoras" id="descripcion_transportadoras"></div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label>Nit</label>
                                <input autocomplete="off" placeholder="Nit" class="form-control" type="number" name="nit_transportadora" id="nit_transportadora">
                            </div>
                            <div class="col">
                                <label>Contacto</label>
                                <input autocomplete="off" placeholder="Contacto" class="form-control" type="number" name="contacto_transportadoras" id="contacto_transportadoras"></div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label>Direccion</label>
                                <input autocomplete="off" placeholder="Direccion" class="form-control" type="text" name="direccion_transportadoras" id="direccion_transportadoras">
                            </div>
                            <div class="col">
                                <label>Estado</label>
                                <input autocomplete="off" placeholder="Estado" class="form-control" type="text" name="estado_transportadoras" id="estado_transportadoras">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button onclick="return AñadirTransportadoras()" style="background-color:  rgb(71, 123, 158);" type="button" class="btn btn">Registar</button>
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</main>

<main class="container">
    <div id="EditarTransportadoras" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-users"></i>&nbsp;Editar Transportadoras</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="EditarTransportadoras1">
                        <div id="ModificarTransportadoras">
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button onclick="return ActulizarTransportadoras()" style="background-color:  rgb(71, 123, 158);" type="button" class="btn btn">Actulizar</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
</main>';
    }
}

Transportadoras_controller:: Mostrar();