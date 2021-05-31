<?php

class Productos_controller
{
    public static function Mostrar()
    {
        echo '<div style="display: none;" id="Productos">
        <div class="container">
            <h2 class="text-center"> Panel De Control De Productos</h2>
        </div>
        <div style="margin-top: 5%;" class="container">
            <div class="form-row">
                <div class="col"><button style="background-color:rgb(71, 123, 158);" data-toggle="modal" data-target="#AñadirProductos" class="btn btn">Añardir Productos</button>
                </div>
                <div class="col">
                    <form method="POST" id="BuscarProductos">
                        <input autocomplete="off" onkeyup="return BuscarProductos()" class="form-control" type="text" name="BuscadorProductos" id="BuscadorProductos" placeholder="Buscador Por Nombre">
                    </form>
                </div>
            </div>
        </div>
        <br>
        <div id="ResultadoProductos">
            <h1 class="text-center"><i class="fas fa-exclamation-triangle"></i>&nbsp;No Hay Busqueda</h1>
        </div>
</div>
<main class="container">
    <div id="AñadirProductos" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-users"></i></i>&nbsp;Añadir Productos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="Formulario3">
                        <div class="form-row">
                            <div class="col">
                                <label>Nombre</label>
                                <input autocomplete="off" placeholder="Nombre" class="form-control" type="text" name="nombre_producto" id="nombre_producto">
                            </div>
                            <div class="col">
                                <label>Tipo</label>
                                <input autocomplete="off" placeholder="Tipo" class="form-control" type="number" name="tipo_producto" id="tipo_producto"></div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label>Descripcion</label>
                                <input autocomplete="off" placeholder="Descripcion" class="form-control" type="text" name="descripcion_producto" id="descripcion_producto">
                            </div>
                            <div class="col">
                                <label>Estado</label>
                                <input autocomplete="off" placeholder="Estado" class="form-control" type="text" name="estado_producto" id="estado_producto"></div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button onclick="return AñadirProductos()" style="background-color:  rgb(71, 123, 158);" type="button" class="btn btn">Registar</button>
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</main>

<main class="container">
    <div id="EditarProductos" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-users"></i>&nbsp;Editar Productos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="EditarProductos1">
                        <div id="ModificarProductos">
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button onclick="return ActulizarProductos()" style="background-color:  rgb(71, 123, 158);" type="button" class="btn btn">Actulizar</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
</main>';
    }
}

Productos_controller::Mostrar();
