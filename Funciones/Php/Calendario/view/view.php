<?php

class view
{
    public static function Mostrar()
    {
        echo '<main class="container">
    <div id="Vista" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Evento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="add_view"></div>
                    <div id="edit_view"></div>
                </div>
            </div>
        </div>
    </div>
</main>';
    }
}
view::Mostrar();
