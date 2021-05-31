function AñadirConductores() {
  var nombre = document.getElementById("nombre_conductor");
  var apellido = document.getElementById("apellido_conductor");
  var correo = document.getElementById("correo_conductor");
  var Cedula = document.getElementById("doc_identidad");
  var tipo = document.getElementById("tipo_licencia");
  var telefono = document.getElementById("telefono_conductor");

  if (
    nombre.value === "" ||
    apellido.value === "" ||
    correo.value === "" ||
    telefono.value === "" ||
    tipo.value === "" ||
    Cedula.value === ""
  ) {
    Swal.fire({
      icon: "warning",
      text: "Debe Llenar Todos Los Campos.",
      title: "Alerta",
    });
    return false;
  } else {
    if (nombre.value.length > 15) {
      Swal.fire({
        icon: "warning",
        text: "El Nombre Es Muy Largo",
        tittle: "Alerta",
      });
      return false;
    }

    if (
      nombre.value.indexOf(" ") !== -1 ||
      apellido.value.indexOf(" ") !== -1
    ) {
      Swal.fire({
        icon: "warning",
        text: "Apellido Y Nombre No Pueden Tener Espacios.",
        title: "Alerta",
      });
      return false;
    }

    if (apellido.value.length > 15) {
      Swal.fire({
        icon: "warning",
        text: "El Apellido Es Muy Largo",
        title: "Alerta",
      });
      return false;
    }

    if (correo.value.length > 30) {
      Swal.fire({
        icon: "warning",
        text: "El Correo Es Muy Largo",
        title: "Alerta",
      });
      return false;
    }

    //evalua la forma de un correo
    if (!/\w+@\w+\.+\w/.test(correo.value)) {
      Swal.fire({
        icon: "warning",
        text: "Correo No Valido.",
        title: "Alerta",
      });
      return false;
    }

    if (Cedula.value.length > 15) {
      Swal.fire({
        icon: "warning",
        text: "Cedula Es Muy Larga.",
        title: "Error",
      });
      return false;
    }
    if (isNaN(Cedula.value) == true) {
      Swal.fire({
        icon: "warning",
        text: "El Campo Cedula No Puede Tener Letras.",
        title: "Alerta",
      });
      return false;
    }
  }
  $.ajax({
    type: "POST",
    url: "Funciones/Php/Conductores/AñadirConductores_controller.php",
    data: $("#Formulario2").serialize(),
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
          BuscarConductores();
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
function EditarConductores(boton) {
  $.ajax({
    type: "POST",
    url: "Funciones/Php/Conductores/MostrarDatos_controller.php",
    data: $("#id2" + boton.value).serialize(),
    success: function (r) {
      $("#ModificarConductores").html(r);
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
function ActulizarConductores() {
  var nombre = document.getElementById("nombre_conductor1");
  var apellido = document.getElementById("apellido_conductor1");
  var correo = document.getElementById("correo_conductor1");
  var Cedula = document.getElementById("doc_identidad1");
  var tipo = document.getElementById("tipo_licencia1");
  var telefono = document.getElementById("telefono_conductor1");

  if (
    nombre.value === "" ||
    apellido.value === "" ||
    correo.value === "" ||
    telefono.value === "" ||
    tipo.value === "" ||
    Cedula.value === ""
  ) {
    Swal.fire({
      icon: "warning",
      text: "Debe Llenar Todos Los Campos.",
      title: "Alerta",
    });
    return false;
  } else {
    if (nombre.value.length > 15) {
      Swal.fire({
        icon: "warning",
        text: "El Nombre Es Muy Largo",
        tittle: "Alerta",
      });
      return false;
    }

    if (
      nombre.value.indexOf(" ") !== -1 ||
      apellido.value.indexOf(" ") !== -1
    ) {
      Swal.fire({
        icon: "warning",
        text: "Apellido Y Nombre No Pueden Tener Espacios.",
        title: "Alerta",
      });
      return false;
    }

    if (apellido.value.length > 15) {
      Swal.fire({
        icon: "warning",
        text: "El Apellido Es Muy Largo",
        title: "Alerta",
      });
      return false;
    }

    if (correo.value.length > 30) {
      Swal.fire({
        icon: "warning",
        text: "El Correo Es Muy Largo",
        title: "Alerta",
      });
      return false;
    }

    //evalua la forma de un correo
    if (!/\w+@\w+\.+\w/.test(correo.value)) {
      Swal.fire({
        icon: "warning",
        text: "Correo No Valido.",
        title: "Alerta",
      });
      return false;
    }

    if (Cedula.value.length > 15) {
      Swal.fire({
        icon: "warning",
        text: "Cedula Es Muy Larga.",
        title: "Error",
      });
      return false;
    }
    if (isNaN(Cedula.value) == true) {
      Swal.fire({
        icon: "warning",
        text: "El Campo Cedula No Puede Tener numero.",
        title: "Alerta",
      });
      return false;
    }
  }
  Swal.fire({
    title: "¿Estas Seguro Que Quiere Editar A Este Conductor?",
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
        url: "Funciones/Php/Conductores/Editar_controller.php",
        data: $("#EditarConductores1").serialize(),
        success: function (r) {
          Swal.fire({
            icon: "success",
            title: "Actulizado",
            text: r,
          });
          BuscarConductores();
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
function Conductores() {
  $("#Conductores").show(1000);
  $("#bienvenida").hide();
  $("#Usuario").hide();
  $("#calendario").hide();
  $("#Productos").hide();
  $("#Transportadoras").hide();
  $("#Vehiculos").hide();
  $("#Proceso").hide();
}
function MostrarConductores() {
  $.ajax({
    type: "POST",
    url: "Funciones/Php/Conductores/Conductores_controller.php",
    success: function (r) {
      $("#conductores").html(r);
    },
    error: function (e) {
      $("#conductores").html(e);
    },
  });
  return false;
}
function BuscarConductores() {
  $.ajax({
    url: "Funciones/Php/Conductores/MostraTabla_controller.php",
    type: "POST",
    data: $("#BuscadorConductores").serialize(),
    success: function (r) {
      if (r == "1") {
        Swal.fire({
          icon: "warning",
          text: "No Esta En Este Registro.",
          title: "Alerta",
        });
        $("#ResultadoConductores").html(
          '<h1 class="text-center"><i class="fas fa-exclamation-circle"></i>&nbsp;No Hay Registro</h1>'
        );
        return false;
      } else {
        $("#ResultadoConductores").html(r);
      }
    },
  });
  return false;
}
function BorrarConductores(boton) {
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
        url: "Funciones/Php/Conductores/Borrar_controller.php",
        data: $("#id2" + boton.value).serialize(),
        success: function (r) {
          Swal.fire("Borrado Con Exito", r, "success");
          BuscarConductores();
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

