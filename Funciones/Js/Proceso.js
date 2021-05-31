function ShowProceso() {
  var Fecha = document.getElementById("Fecha9");
  var Placa = document.getElementById("Placa9");

  if (Fecha.value === "" || Placa.value === "") {
    Swal.fire({
      icon: "warning",
      text: "Debe Llenar Todos Los Campos.",
      title: "Alerta",
    });
    return false;
  }
  $.ajax({
    url: "Funciones/Php/Proceso/Show_controller.php",
    type: "POST",
    data: $("#Formulario9").serialize(),
    success: function (r) {
      if (r == "1") {
        Swal.fire({
          icon: "warning",
          text: "No hay Nada Sobre Eso.",
          title: "Alerta",
        });
        $("#Respuesta9").html(
          '<h1 class="text-center"><i class="fas fa-exclamation-circle"></i>&nbsp;No Hay Registro</h1>'
        );
        return false;
      } else {
        $("#Respuesta9").html(r);
      }
    },
    error: function (e) {
      $("#Respuesta9").html('<h6 class="text-center"></i>&nbsp;' + e + "</h6>");
      return false;
    },
  });
  return false;
}
function Proceso() {
  $("#Proceso").show(1000);
  $("#Conductores").hide();
  $("#bienvenida").hide();
  $("#Usuario").hide();
  $("#calendario").hide();
  $("#Productos").hide();
  $("#Transportadoras").hide();
  $("#Vehiculos").hide();
}
function MostrarProceso() {
  $.ajax({
    type: "POST",
    url: "Funciones/Php/Proceso/Proceso_controller.php",
    success: function (r) {
      $("#proceso").html(r);
    },
    error: function (e) {
      $("#proceso").html(e);
    },
  });
  return false;
}
function AddProceso() {
  var placa = document.getElementById("Placa10");
  var peso = document.getElementById("Peso10");
  var hora = document.getElementById("Hora10");

  if (
    placa.value === "" ||
    peso.value === "" ||
    hora.value === "" 
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
    url: "Funciones/Php/Proceso/Add_controller.php",
    data: $("#Formulario10").serialize(),
    success: function (r) {
      Update()
      Swal.fire({
        icon: "success",
        title: "Registrado",
        text: r,
      });
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
function Update(){
  $.ajax({
    type: "POST",
    url: "Funciones/Php/Proceso/Update_controller.php",
    data: $("#Formulario9").serialize,
    success: function () {
      
    },
    error: function () {
    },
  });
  return false;
}