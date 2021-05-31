<?php
class Calendario_controller
{
  public static function Mostrar()
  {
    echo '<div style="display: none;" id="Calendario">
        <div class="grid-container">
        <div class="Evento">
          <div class="titulo">
            <button
              style="
                background-color: rgb(71, 123, 158);
                border-radius: 7px 7px 7px 7px;
                float: right;margin-right: 2%;z-index:-1;
              "
              data-toggle="modal"
              data-target="#Vista"
              class="btn btn"
              title="Añadir Evento"
              onclick="Addview()"
            >
              +
            </button>
            <p class="text-center"style="width: 30%; position: relative; top: 15%">Evento</p>
          </div>
          <div id="view" style="margin: 4%"></div>
          <div id="editar" style="margin: 4%"></div>
          <div id="mensajes" style="margin: 2%">
            <p>No Hya Envetos</p>
          </div>
        </div>
        <div class="calendar">
          <div class="calendar__info">
            <div class="calendar__prev" id="prev-month">&#9664;</div>
            <div class="calendar__month" id="month"></div>
            <div class="calendar__year" id="year"></div>
            <div class="calendar__next" id="next-month">&#9654;</div>
          </div>
  
          <div class="calendar__week">
            <div class="calendar__day calendar__item2">Lun</div>
            <div class="calendar__day calendar__item2">Mar</div>
            <div class="calendar__day calendar__item2">Mie</div>
            <div class="calendar__day calendar__item2">Jue</div>
            <div class="calendar__day calendar__item2">Vie</div>
            <div class="calendar__day calendar__item2">Sáb</div>
            <div class="calendar__day calendar__item2">Dom</div>
          </div>
          <div class="calendar__dates" id="dates"></div>
        </div>
      </div>
      </div>';
  }
}
Calendario_controller::Mostrar();
