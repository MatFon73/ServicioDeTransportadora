<?php

class usuarios_controller{
    public static function Mostrar(){
        echo '<div style="display: none;" id="Usuario">
        <div class="container">
            <h2 class="text-center"> Panel De Control De Usuarios</h2>
        </div>
        <div style="margin-top: 5%;" class="container">
            <div class="form-row">
                <div class="col"><button style="background-color:rgb(71, 123, 158);" data-toggle="modal" data-target="#AñadirUsuario" class="btn btn">Añardir Usurios</button>
                </div>
                <div class="col">
                    <form method="POST" id="BuscarUsuario">
                        <input autocomplete="off" onkeyup="return BuscarUsuario()" class="form-control" type="number" name="BuscadorUsuarios" id="BuscadorUsuarios" placeholder="Buscador Por Cedula">
                    </form>
                </div>
            </div>
        </div>
        <br>
        <div id="ResultadoUsuarios">
            <h1 class="text-center"><i class="fas fa-exclamation-triangle"></i>&nbsp;No Hay Busqueda</h1>
        </div>
</div>
<main class="container">
    <div id="AñadirUsuario" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-users"></i></i>&nbsp;Añadir Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="Formulario">
                        <div class="form-row">
                            <div class="col">
                                <label>Nombre</label>
                                <input autocomplete="off" placeholder="Nombre" class="form-control" type="text" name="Nombre2" id="Nombre2">
                            </div>
                            <div class="col">
                                <label>Apellido</label>
                                <input autocomplete="off" placeholder="Apellido" class="form-control" type="text" name="Apellido2" id="Apellido2"></div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label>Cedula</label>
                                <input autocomplete="off" placeholder="Cedula" class="form-control" type="text" name="Cedula2" id="Cedula2">
                            </div>
                            <div class="col">
                                <label>Correo</label>
                                <input autocomplete="off" placeholder="Correo" class="form-control" type="email" name="Correo2" id="Correo2"></div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label>Telefono</label>
                                <input autocomplete="off" placeholder="Telefono" class="form-control" type="text" name="Telefono2" id="Telefono2">
                            </div>
                            <div class="col">
                                <label>Tipo Usuario</label>
                                <input autocomplete="off" placeholder="Tipo Usuario" class="form-control" type="text" name="Tipousuario2" id="Tipousuario2">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label>Contraseña</label>
                                <input autocomplete="off" placeholder="Contraseña" class="form-control" type="password" name="Contraseña2" id="Contraseña2">
                            </div>
                            <div class="col">
                                <label>Repetir Contraseña</label>
                                <input autocomplete="off" placeholder="Repetir Contraseña" class="form-control" type="password" name="Rcontraseña2" id="Rcontraseña2">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button onclick="return AñadirUsuario()" style="background-color:  rgb(71, 123, 158);" type="button" class="btn btn">Registar</button>
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</main>

<main class="container">
    <div id="EditarUsuario" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-users"></i>&nbsp;Editar Usuarios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="EditarUsuarios">
                        <div id="ModificarUsuario">
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button onclick="return ActulizarUsuarios()" style="background-color:  rgb(71, 123, 158);" type="button" class="btn btn">Actulizar</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
</main>';
    }
}

usuarios_controller:: Mostrar();