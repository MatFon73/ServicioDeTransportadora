function IniciarSesion() {
  var Cedula = document.getElementById("Cedula").value;
  var Pass = document.getElementById("password").value;

  if (Cedula === "" && Pass === "") {
    Swal.fire({
      icon: "warning",
      text: "Debe Llenar Todos Los Campos.",
      title: "Alerta",
    });
    return false;
  }
  if (isNaN(Cedula) == true) {
    Swal.fire({
      icon: "warning",
      text: "El Campo Cedula No Puede Tener Letras.",
      title: "Alerta",
    });
    return false;
  }
  if (Cedula === "") {
    Swal.fire({
      icon: "warning",
      text: "Debe Llenar El Campo De Cedula.",
      title: "Alerta",
    });
    return false;
  }
  if (Pass === "") {
    Swal.fire({
      icon: "warning",
      text: "Debe Llenar El Campo De Contraseña.",
      title: "Alerta",
    });
    return false;
  }

  $.ajax({
    type: "POST",
    url: "Funciones/Php/iniciarSesion_controller.php",
    data: $("#Formulario").serialize(),
    success: function (r) {
      if (r == "Inicio Sesion Administrador.") {
        Swal.fire({
          icon: "success",
          title: "Inicio De Sesion",
          text: r,
        }).then(function () {
          window.location = "Principal.php";
        });
      } else {
        if (r == "Inicio Sesion Operador.") {
          Swal.fire({
            icon: "success",
            title: "Inicio De Sesion",
            text: r,
          }).then(function () {
            window.location = "Secundario.php";
          });
        } else {
          if (r == "Inicio Sesion Consulta.") {
            Swal.fire({
              icon: "success",
              title: "Inicio De Sesion",
              text: r,
            }).then(function () {
              window.location = "Tercero.php";
            });
          } else {
            Swal.fire({
              icon: "error",
              title: "Inicio De Sesion",
              text: r,
            });
          }
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
function CerrarSesion() {
  Swal.fire({
    title: "Cerrar Sesion",
    text: "¿Esta Seguro Que Quiere Cerrar Sesion?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "rgb(71, 123, 158)",
    cancelButtonColor: "rgb(41,43,44)",
    confirmButtonText: "Si, Cerrar!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "Funciones/Php/cerrarSesion_controller.php",
        data: $("#Formulario").serialize(),
        success: function (r) {
          if (r == "Se Cerro Con Exito La Sesion.") {
            Swal.fire({
              icon: "success",
              title: "Cerrar Sesion",
              text: r,
            }).then(function () {
              window.location = "index.php";
            });
          } else {
            Swal.fire({
              icon: "error",
              title: "Cerrar Sesion",
              text: r,
            });
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
  });
}
function Verificar() {
  var Cedula = document.getElementById("Cedula").value;
  var Correo = document.getElementById("Correo").value;

  if (Cedula == "" || Correo == "") {
    Swal.fire({
      title: "Verificar",
      text: "Uno De Los Campos Esta En Blanco",
      icon: "warning",
    });
    return false;
  }
  $.ajax({
    type: "POST",
    url: "Funciones/Php/verificar_controller.php",
    data: $("#Formulario").serialize(),
    success: function (r) {
      if (r == "No Se Puede Comprobar Los Datos") {
        Swal.fire({
          title: "Verificar",
          text: r,
          icon: "warning",
        });
      } else {
        $("#cambiar").html(r);
      }
    },
    error: function (e) {
      $("#cambiar").html(e);
    },
  });
  return false;
}
function Recuperar() {
  var pass = document.getElementById("Contraseña");
  var rpass = document.getElementById("RContraseña");
  var Cedula = document.getElementById("Cedula");

  if (rpass.value == "" || pass.value == "") {
    Swal.fire({
      title: "Verificar",
      text: "Hay Campos En Blanco",
      icon: "warning",
    });
    return false;
  }
  if (pass.value != rpass.value) {
    Swal.fire({
      icon: "warning",
      text: "Las Contraseñas No Son Iguales.",
      title: "Alerta",
    });
    return false;
  }

  if (pass.value == Cedula.value) {
    Swal.fire({
      icon: "warning",
      text: "La Contraseña No Puede Ser Igual Que La Cedula.",
      title: "Alerta",
    });
    return false;
  }

  if (pass.value.length < 8 || rpass.value.length < 8) {
    Swal.fire({
      icon: "warning",
      text: "La Contrasela Es Muy Corta.",
      title: "Alerta",
    });
    return false;
  } else {
    if (pass.value.length > 16 || rpass.value.length > 16) {
      Swal.fire({
        icon: "warning",
        text: "La Contraseña Es Muy Largo",
        title: "Alerta",
      });
      return false;
    }
  }
  $.ajax({
    type: "POST",
    url: "Funciones/Php/Recuperar_controller.php",
    data: $("#Formulario").serialize(),
    success: function (r) {
      Swal.fire({
        title: "Verificar",
        text: r,
        icon: "success",
      }).then(function () {
        window.location = "index.php";
      });
    },
    error: function (e) {
      Swal.fire({
        title: "Verificar",
        text: e,
        icon: "success",
      });
    },
  });
  return false;
}
function bienvenida() {
  $("#bienvenida").show(1000);
  $("#Usuario").hide();
  $("#calendario").hide();
  $("#Conductores").hide();
  $("#Productos").hide();
  $("#Transportadoras").hide();
  $("#Vehiculos").hide();
  $("#Proceso").hide();
}
