function view() {
  $.ajax({
    type: "POST",
    url: "Funciones/Php/Calendario/view/view.php",
    success: function (r) {
      $("#view").html(r);
    },
    error: function (e) {
      $("#view").html(e);
    },
  });
  return false;
}
function Addview() {
  $.ajax({
    type: "POST",
    url: "Funciones/Php/Calendario/view/Add_view.php",
    success: function (r) {
      $("#add_view").html(r);
      $("#add_view").show();
      $("#edit_view").hide();
    },
    error: function (e) {
      $("#add_view").html(e);
    },
  });
  return false;
}
function Editview(boton) {
  $.ajax({
    type: "POST",
    url: "Funciones/Php/Calendario/view/Edit_view.php",
    data: $("#id6" + boton.value).serialize(),
    success: function (r) {
      $("#edit_view").html(r);
      $("#edit_view").show();
      $("#add_view").hide();
    },
    error: function (e) {
      alert(e);
      Swal.fire({
        icon: "Error",
        text: e,
        title: "Ocurrrio Un Error",
      });
    },
  });
  return false;
}
function Show(boton) {
  $.ajax({
    url: "Funciones/Php/Calendario/Show_controller.php",
    type: "POST",
    data: $("#dia" + boton.value).serialize(),
    success: function (r) {
      $("#mensajes").html(r);
    },
    error: function (e) {
      $("#mensajes").html(
        '<h6 class="text-center"></i>&nbsp;' + e + "</h6>"
      );
      return false;
    },
  });
  return false;
}
function Add() {
  Swal.fire({
    title: "¿Estas Seguro Que Quiere Añadir A Este Evento?",
    text: "Esto No Se Puede Deshacer",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "rgb(71, 123, 158)",
    cancelButtonColor: "rgb(41,43,44)",
    confirmButtonText: "Si, Añadir!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "Funciones/Php/Calendario/Add_controller.php",
        data: $("#AñadirEvento").serialize(),
        success: function (r) {
          Swal.fire({
            icon: "success",
            text: r,
            title: "Se Añadir Con Exito",
          });
        },
        error: function (e) {
          Swal.fire({
            icon: "Error",
            text: e,
            title: "Ocurrrio Un Error",
          });
        },
      });
      return false;
    }
  });
}
function Borrar(boton) {
  Swal.fire({
    title: "¿Estas Seguro?",
    text: "Esto No Se Puede Deshacer",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "rgb(71, 123, 158)",
    cancelButtonColor: "rgb(41,43,44)",
    confirmButtonText: "Si, Borrar!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "Funciones/Php/Calendario/Delete_controller.php",
        data: $("#id6" + boton.value).serialize(),
        success: function (r) {
          Swal.fire("Borrado Con Exito", r, "success");
        },
        error: function (e) {
          Swal.fire({
            icon: "Error",
            text: e,
            title: "Ocurrrio Un Error",
          });
        },
      });
      return false;
    }
  });
}
function Edit() {
  $.ajax({
    type: "POST",
    url: "Funciones/Php/Calendario/Edit_controller.php",
    data: $("#EditarEvento").serialize(),
    success: function (r) {
      Swal.fire({
        icon: "success",
        text: r,
        title: "Se Actulizado Con Exito.",
      });
    },
    error: function (e) {
      Swal.fire({
        icon: "Error",
        text: e,
        title: "Ocurrrio Un Error",
      });
    },
  });
  return false;
}
function Calendario() {
  $("#calendario").show(1000);
  $("#bienvenida").hide();
  $("#Usuario").hide();
  $("#Conductores").hide();
  $("#Productos").hide();
  $("#Transportadoras").hide();
  $("#Vehiculos").hide();
  $("#Proceso").hide();
}
