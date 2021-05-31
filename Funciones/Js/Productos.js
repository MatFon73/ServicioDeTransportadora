function AñadirProductos() {
  var nombre = document.getElementById("nombre_producto");
  var tipo = document.getElementById("tipo_producto");
  var descripcion = document.getElementById("descripcion_producto");
  var estado = document.getElementById("estado_producto");

  if (
    nombre.value === "" ||
    descripcion.value === "" ||
    tipo.value === "" ||
    estado.value === "" 
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

    if (tipo.value.length > 1) {
      Swal.fire({
        icon: "warning",
        text: "El Tipo Es Muy Largo",
        title: "Alerta",
      });
      return false;
    }

    if (descripcion.value.length > 30) {
      Swal.fire({
        icon: "warning",
        text: "El Descripcion Es Muy Largo",
        title: "Alerta",
      });
      return false;
    }

    if (estado.value.length > 5) {
      Swal.fire({
        icon: "warning",
        text: "Estado Es Muy Larga.",
        title: "Error",
      });
      return false;
    }
  }
  $.ajax({
    type: "POST",
    url: "Funciones/Php/Productos/AñadirProductos_controller.php",
    data: $("#Formulario3").serialize(),
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
          BuscarProductos();
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
function EditarProductos(boton) {
  $.ajax({
    type: "POST",
    url: "Funciones/Php/Productos/MostrarDatos_controller.php",
    data: $("#id3" + boton.value).serialize(),
    success: function (r) {
      $("#ModificarProductos").html(r);
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
function ActulizarProductos() {
  var nombre = document.getElementById("nombre_producto1");
  var tipo = document.getElementById("tipo_producto1");
  var descripcion = document.getElementById("descripcion_producto1");
  var estado = document.getElementById("estado_producto1");

  if (
    nombre.value === "" ||
    descripcion.value === "" ||
    tipo.value === "" ||
    estado.value === "" 
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

    if (tipo.value.length > 1) {
      Swal.fire({
        icon: "warning",
        text: "El tipo Es Muy Largo",
        title: "Alerta",
      });
      return false;
    }

    if (descripcion.value.length > 30) {
      Swal.fire({
        icon: "warning",
        text: "El Descripcion Es Muy Largo",
        title: "Alerta",
      });
      return false;
    }

    if (estado.value.length > 5) {
      Swal.fire({
        icon: "warning",
        text: "Estado Es Muy Larga.",
        title: "Error",
      });
      return false;
    }
  }
  Swal.fire({
    title: "¿Estas Seguro Que Quiere Editar A Este Producto?",
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
        url: "Funciones/Php/Productos/Editar_controller.php",
        data: $("#EditarProductos1").serialize(),
        success: function (r) {
          Swal.fire({
            icon: "success",
            title: "Actulizado",
            text: r,
          });
          BuscarProductos();
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
function Productos() {
  $("#Productos").show(1000);
  $("#Conductores").hide();
  $("#bienvenida").hide();
  $("#Usuario").hide();
  $("#calendario").hide();
  $("#Transportadoras").hide();
  $("#Vehiculos").hide();
  $("#Proceso").hide();
}
function MostrarProductos() {
  $.ajax({
    type: "POST",
    url: "Funciones/Php/Productos/Productos_controller.php",
    success: function (r) {
      $("#productos").html(r);
    },
    error: function (e) {
      $("#productos").html(e);
    },
  });
  return false;
}
function BuscarProductos() {
  $.ajax({
    url: "Funciones/Php/Productos/MostraTabla_controller.php",
    type: "POST",
    data: $("#BuscadorProductos").serialize(),
    success: function (r) {
      if (r == "1") {
        Swal.fire({
          icon: "warning",
          text: "No Esta En Este Registro.",
          title: "Alerta",
        });
        $("#ResultadoProductos").html(
          '<h1 class="text-center"><i class="fas fa-exclamation-circle"></i>&nbsp;No Hay Registro</h1>'
        );
        return false;
      } else {
        $("#ResultadoProductos").html(r);
      }
    },
  });
  return false;
}
function BorrarProductos(boton) {
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
        url: "Funciones/Php/Productos/Borrar_controller.php",
        data: $("#id3" + boton.value).serialize(),
        success: function (r) {
          Swal.fire("Borrado Con Exito", r, "success");
          BuscarProductos();
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

