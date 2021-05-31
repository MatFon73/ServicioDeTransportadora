function AñadirTransportadoras() {
  var nombre = document.getElementById("nombre_transportadoras");
  var nit = document.getElementById("nit_transportadora");
  var descripcion = document.getElementById("descripcion_transportadoras");
  var contacto = document.getElementById("contacto_transportadoras");
  var direccion = document.getElementById("direccion_transportadoras");
  var estado = document.getElementById("estado_transportadoras");

  if (
    nombre.value === "" ||
    descripcion.value === "" ||
    direccion.value === "" ||
    estado.value === "" ||
    contacto.value === "" ||
    nit.value === ""
  ) {
    Swal.fire({
      icon: "warning",
      text: "Debe Llenar Todos Los Campos.",
      title: "Alerta",
    });
    return false;
  }
  $.ajax({
    type: "POST",
    url: "Funciones/Php/Transportadoras/AñadirTransportadoras_controller.php",
    data: $("#Formulario4").serialize(),
    success: function (r) {
      if (r == "Ya Existe Ese Correo.") {
        Swal.fire({
          icon: "error",
          title: "Correo",
          text: r,
        });
      } else {
        if (r == "Ya Existe Ese Cedula.") {
          Swal.fire({
            icon: "error",
            title: "Cedula",
            text: r,
          });
        } else {
          Swal.fire({
            icon: "success",
            title: "Registrado",
            text: r,
          });
          BuscarTransportadoras();
        }
      }
    },
    error: function (e) {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: e,
      });
    },
  });
  return false;
}
function EditarTransportadoras(boton) {
  $.ajax({
    type: "POST",
    url: "Funciones/Php/Transportadoras/MostrarDatos_controller.php",
    data: $("#id4" + boton.value).serialize(),
    success: function (r) {
      $("#ModificarTransportadoras").html(r);
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
function ActulizarTransportadoras() {
  var nombre = document.getElementById("nombre_transportadoras1");
  var nit = document.getElementById("nit_transportadora1");
  var descripcion = document.getElementById("descripcion_transportadoras1");
  var contacto = document.getElementById("contacto_transportadoras1");
  var direccion = document.getElementById("direccion_transportadoras1");
  var estado = document.getElementById("estado_transportadoras1");

  if (
    nombre.value === "" ||
    descripcion.value === "" ||
    direccion.value === "" ||
    estado.value === "" ||
    contacto.value === "" ||
    nit.value === ""
  ) {
    Swal.fire({
      icon: "warning",
      text: "Debe Llenar Todos Los Campos.",
      title: "Alerta",
    });
    return false;
  }
  Swal.fire({
    title: "¿Estas Seguro Que Quiere Editar A Este Transportadoras?",
    text: "Verifique la informacion",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "rgb(71, 123, 158)",
    cancelButtonColor: "rgb(41,43,44)",
    confirmButtonText: "Si, Añadir!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "Funciones/Php/Transportadoras/Editar_controller.php",
        data: $("#EditarTransportadoras1").serialize(),
        success: function (r) {
          Swal.fire({
            icon: "success",
            title: "Actulizado",
            text: r,
          });
          BuscarTransportadoras();
        },
        error: function (e) {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: e,
          });
        },
      });
      return false;
    }
  });
}
function Transportadoras() {
  $("#Transportadoras").show(1000);
  $("#Productos").hide();
  $("#Conductores").hide();
  $("#bienvenida").hide();
  $("#Usuario").hide();
  $("#calendario").hide();
  $("#Vehiculos").hide();
  $("#Proceso").hide();
}
function MostrarTransportadoras() {
  $.ajax({
    type: "POST",
    url: "Funciones/Php/Transportadoras/Transportadoras_controller.php",
    success: function (r) {
      $("#transportadoras").html(r);
    },
    error: function (e) {
      $("#transportadoras").html(e);
    },
  });
  return false;
}
function BuscarTransportadoras() {
  $.ajax({
    url: "Funciones/Php/Transportadoras/MostraTabla_controller.php",
    type: "POST",
    data: $("#BuscadorTransportadoras").serialize(),
    success: function (r) {
      if (r == "1") {
        Swal.fire({
          icon: "warning",
          text: "No Esta En Este Registro.",
          title: "Alerta",
        });
        $("#ResultadoTransportadoras").html(
          '<h1 class="text-center"><i class="fas fa-exclamation-circle"></i>&nbsp;No Hay Registro</h1>'
        );
        return false;
      } else {
        $("#ResultadoTransportadoras").html(r);
      }
    },
  });
  return false;
}
function BorrarTransportadoras(boton) {
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
        url: "Funciones/Php/Transportadoras/Borrar_controller.php",
        data: $("#id4" + boton.value).serialize(),
        success: function (r) {
          Swal.fire("Borrado Con Exito", r, "success");
          BuscarTransportadoras();
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
