function Show() {
  var Fecha = document.getElementById("Fecha");
  var Placa = document.getElementById("Placa");
  if (Fecha.value === "" || Placa.value === "") {
    Swal.fire({
      icon: "warning",
      text: "Debe Llenar Todos Los Campos.",
      title: "Alerta",
    });
    return false;
  }
  $.ajax({
    url: "Funciones/Php/Consulta/Show_controller.php",
    type: "POST",
    data: $("#Formulario").serialize(),
    success: function (r) {
      if(r == "1"){
        Swal.fire({
          icon: "warning",
          text: "No hay Nada Sobre Eso.",
          title: "Alerta",
        });
        $("#Respuesta").html(
          '<h1 class="text-center"><i class="fas fa-exclamation-circle"></i>&nbsp;No Hay Registro</h1>'
        );
        return false;
      }else{
        $("#Respuesta").html(r);
      }
    },
    error: function (e) {
      $("#Respuesta").html('<h6 class="text-center"></i>&nbsp;' + e + "</h6>");
      return false;
    },
  });
  return false;
}
function Consultar() {
    $("#Consultar").show(1000);
    $("#bienvenida").hide();
}
function MostrarConsultar() {
    $.ajax({
      type: "POST",
      url: "Funciones/Php/Consulta/Consulta_controller.php",
      success: function (r) {
        $("#consultar").html(r);
      },
      error: function (e) {
        $("#consultar").html(e);
      },
    });
    return false;
  }