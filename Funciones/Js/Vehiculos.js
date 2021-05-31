function AñadirVehiculos() {
  var placa = document.getElementById("placa");
  var capacidad = document.getElementById("capacidad");
  var remolque = document.getElementById("remolque");

  if (
    placa.value === "" ||
    capacidad.value === "" ||
    remolque.value === "" 
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
    url: "Funciones/Php/Vehiculos/AñadirVehiculos_controller.php",
    data: $("#Formulario5").serialize(),
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
          BuscarVehiculos();
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
function EditarVehiculos(boton) {
  $.ajax({
    type: "POST",
    url: "Funciones/Php/Vehiculos/MostrarDatos_controller.php",
    data: $("#id5" + boton.value).serialize(),
    success: function (r) {
      $("#ModificarVehiculos").html(r);
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
function ActulizarVehiculos() {
  var placa = document.getElementById("placa1");
  var capacidad = document.getElementById("capacidad1");
  var remolque = document.getElementById("remolque1");

  if (
    placa.value === "" ||
    capacidad.value === "" ||
    remolque.value === "" 
  ) {
    Swal.fire({
      icon: "warning",
      text: "Debe Llenar Todos Los Campos.",
      title: "Alerta",
    });
    return false;
  } 
  Swal.fire({
    title: "¿Estas Seguro Que Quiere Editar A Este Vehiculo?",
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
        url: "Funciones/Php/Vehiculos/Editar_controller.php",
        data: $("#EditarVehiculos1").serialize(),
        success: function (r) {
          Swal.fire({
            icon: "success",
            title: "Actulizado",
            text: r,
          });
          BuscarVehiculos();
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
function Vehiculos() {
  $("#Vehiculos").show(1000);
  $("#Conductores").hide();
  $("#bienvenida").hide();
  $("#Usuario").hide();
  $("#calendario").hide();
  $("#Productos").hide();
  $("#Transportadoras").hide();
  $("#Proceso").hide();
}
function MostrarVehiculos() {
  $.ajax({
    type: "POST",
    url: "Funciones/Php/Vehiculos/Vehiculos_controller.php",
    success: function (r) {
      $("#vehiculos").html(r);
    },
    error: function (e) {
      $("#vehiculos").html(e);
    },
  });
  return false;
}
function BuscarVehiculos() {
  $.ajax({
    url: "Funciones/Php/Vehiculos/MostraTabla_controller.php",
    type: "POST",
    data: $("#BuscadorVehiculos").serialize(),
    success: function (r) {
      if (r == "1") {
        Swal.fire({
          icon: "warning",
          text: "No Esta En Este Registro.",
          title: "Alerta",
        });
        $("#ResultadoVehiculos").html(
          '<h1 class="text-center"><i class="fas fa-exclamation-circle"></i>&nbsp;No Hay Registro</h1>'
        );
        return false;
      } else {
        $("#ResultadoVehiculos").html(r);
      }
    },
  });
  return false;
}
function BorrarVehiculos(boton) {
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
        url: "Funciones/Php/Vehiculos/Borrar_controller.php",
        data: $("#id5" + boton.value).serialize(),
        success: function (r) {
          Swal.fire("Borrado Con Exito", r, "success");
          BuscarVehiculos();
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

