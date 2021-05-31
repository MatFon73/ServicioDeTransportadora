function AñadirUsuario() {
  var nombre = document.getElementById("Nombre2");
  var apellido = document.getElementById("Apellido2");
  var correo = document.getElementById("Correo2");
  var Cedula = document.getElementById("Cedula2");
  var pass = document.getElementById("Contraseña2");
  var rpass = document.getElementById("Rcontraseña2");

  if (
    nombre.value === "" ||
    apellido.value === "" ||
    correo.value === "" ||
    pass.value === "" ||
    rpass.value === "" ||
    Cedula.value === ""
  ) {
    Swal.fire({
      icon: "warning",
      text: "Debe Llenar Todos Los Campos.",
      title: "Alerta",
    });
    return false;
  } else {
    if (nombre.value.length > 25) {
      Swal.fire({
        icon: "warning",
        text: "El Nombre Es Muy Largo",
        tittle: "Alerta",
      });
      return false;
    }
    if (apellido.value.length > 25) {
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
  }
  $.ajax({
    type: "POST",
    url: "Funciones/Php/Usuarios/AñadirUsuario_controller.php",
    data: $("#Formulario").serialize(),
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
          BuscarUsuario();
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
function EditarUsuario(boton) {
  $.ajax({
    type: "POST",
    url: "Funciones/Php/Usuarios/MostrarDatos_controller.php",
    data: $("#id" + boton.value).serialize(),
    success: function (r) {
      $("#ModificarUsuario").html(r);
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
function ActulizarUsuarios() {
  var nombre = document.getElementById("Nombre3");
  var apellido = document.getElementById("Apellido3");
  var correo = document.getElementById("Correo3");
  var Cedula = document.getElementById("Cedula3");
  var pass = document.getElementById("Contraseña3");
  var rpass = document.getElementById("Rcontraseña3");

  if (
    nombre.value === "" ||
    apellido.value === "" ||
    correo.value === "" ||
    pass.value === "" ||
    rpass.value === "" ||
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
  }
  Swal.fire({
    title: "¿Estas Seguro Que Quiere Editar A Este Usuario?",
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
        url: "Funciones/Php/Usuarios/Editar_controller.php",
        data: $("#EditarUsuarios").serialize(),
        success: function (r) {
          Swal.fire({
            icon: "success",
            title: "Actulizado",
            text: r,
          });
          BuscarUsuario();
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
function User() {
  $.ajax({
    type: "POST",
    url: "Funciones/Php/Usuarios/user_controller.php",
    success: function (r) {
      if (r == "1") {
        Swal.fire({
          icon: "warning",
          title: "No Puede Acceder",
          text: "No Hay Una Seccion. Inicie Sesion",
        }).then(function () {
          window.location = "index.php";
        });
      } else {
        $("#UserData").html(r);
      }
    },
    error: function (e) {
      $("#UserData").html(e);
    },
  });
  return false;
}
function Usuarios() {
  $("#Usuario").show(1000);
  $("#bienvenida").hide();
  $("#calendario").hide();
  $("#Conductores").hide();
  $("#Productos").hide();
  $("#Transportadoras").hide();
  $("#Proceso").hide();
  $("#Vehiculos").hide();
}
function ActulizarFoto() {
  var formData = new FormData();
  var Imagen = $("#Foto")[0].files[0];
  formData.append("I", Imagen);

  $.ajax({
    type: "POST",
    url: "Funciones/Php/Usuarios/actulizarFoto_controller.php",
    data: formData,
    contentType: false,
    processData: false,
    success: function (r) {
      Swal.fire({
        icon: "success",
        title: "Foto De Perfil",
        text: "Se Actilizado Con Exito",
      }).then(function () {
        $("#perfil").html(
          '<img id="perfil" class="perfil" src="' +
            r +
            '" alt="Foto De perfil" title="perfil">'
        );
      });
    },
    error: function (e) {
      Swal.fire({
        icon: "error",
        title: "Foto De Perfil",
        text: e,
      });
    },
  });
  return false;
}
function MostrarUsuarios() {
  $.ajax({
    type: "POST",
    url: "Funciones/Php/Usuarios/Usuarios_controller.php",
    success: function (r) {
      $("#usuarios").html(r);
    },
    error: function (e) {
      $("#usuarios").html(e);
    },
  });
  return false;
}
function BuscarUsuario() {
  $.ajax({
    url: "Funciones/Php/Usuarios/MostraTabla_controller.php",
    type: "POST",
    data: $("#BuscadorUsuarios").serialize(),
    success: function (r) {
      if (r == "1") {
        Swal.fire({
          icon: "warning",
          text: "No Esta En Este Registro.",
          title: "Alerta",
        });
        $("#ResultadoUsuarios").html(
          '<h1 class="text-center"><i class="fas fa-exclamation-circle"></i>&nbsp;No Hay Registro</h1>'
        );
        return false;
      } else {
        $("#ResultadoUsuarios").html(r);
      }
    },
  });
  return false;
}
function BorrarUsuario(boton) {
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
        url: "Funciones/Php/Usuarios/Borrar_controller.php",
        data: $("#id" + boton.value).serialize(),
        success: function (r) {
          Swal.fire("Borrado Con Exito", r, "success");
          BuscarUsuario();
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

