<?php

class conductor_controller{
    public static function Mostrar(){
        echo '<div style="display: none;" id="Conductores">
        <div class="container">
            <h2 class="text-center"> Panel De Control De Conductores</h2>
        </div>
        <div style="margin-top: 5%;" class="container">
            <div class="form-row">
                <div class="col"><button style="background-color:rgb(71, 123, 158);" data-toggle="modal" data-target="#AñadirConductores" class="btn btn">Añardir Conductores</button>
                </div>
                <div class="col">
                    <form method="POST" id="BuscarConductores">
                        <input autocomplete="off" onkeyup="return BuscarConductores()" class="form-control" type="number" name="BuscadorConductores" id="BuscadorConductores" placeholder="Buscador Por Cedula">
                    </form>
                </div>
            </div>
        </div>
        <br>
        <div id="ResultadoConductores">
            <h1 class="text-center"><i class="fas fa-exclamation-triangle"></i>&nbsp;No Hay Busqueda</h1>
        </div>
</div>
<main class="container">
    <div id="AñadirConductores" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-users"></i></i>&nbsp;Añadir Conductores</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="Formulario2">
                        <div class="form-row">
                            <div class="col">
                                <label>Nombre</label>
                                <input autocomplete="off" placeholder="Nombre" class="form-control" type="text" name="nombre_conductor" id="nombre_conductor">
                            </div>
                            <div class="col">
                                <label>Apellido</label>
                                <input autocomplete="off" placeholder="Apellido" class="form-control" type="text" name="apellido_conductor" id="apellido_conductor"></div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label>Cedula</label>
                                <input autocomplete="off" placeholder="Cedula" class="form-control" type="text" name="doc_identidad" id="doc_identidad">
                            </div>
                            <div class="col">
                                <label>Correo</label>
                                <input autocomplete="off" placeholder="Correo" class="form-control" type="email" name="correo_conductor" id="correo_conductor"></div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label>Telefono</label>
                                <input autocomplete="off" placeholder="Telefono" class="form-control" type="text" name="telefono_conductor" id="telefono_conductor">
                            </div>
                            <div class="col">
                                <label>Licencia</label>
                                <input autocomplete="off" placeholder="Licencia" class="form-control" type="text" name="tipo_licencia" id="tipo_licencia">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button onclick="return AñadirConductores()" style="background-color:  rgb(71, 123, 158);" type="button" class="btn btn">Registar</button>
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</main>

<main class="container">
    <div id="EditarConductores" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-users"></i>&nbsp;Editar Conductores</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="EditarConductores1">
                        <div id="ModificarConductores">
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button onclick="return ActulizarConductores()" style="background-color:  rgb(71, 123, 158);" type="button" class="btn btn">Actulizar</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
</main>';
    }
}

conductor_controller:: Mostrar();