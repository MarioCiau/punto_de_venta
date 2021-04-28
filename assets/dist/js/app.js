$(document).ready(function () {
  $("#v2").attr("disabled", "disabled");
  $("#v3").attr("disabled", "disabled");
  $("#v4").attr("disabled", "disabled");
  $("#id_cliente").keyup(function (e) {
    let search = $("#id_cliente").val();
    $.ajax({
      url: "phpAjax/cliente.php",
      type: "POST",
      data: { search },
      success: function (response) {
        if (response != "404") {
          let data = JSON.parse(response);
          $("#v2").removeAttr("disabled");
          $("#v3").removeAttr("disabled");
          $("#v4").removeAttr("disabled");
          $("#v1").val(data[0].id);
          $("#v2").val(data[0].nombre);
          $("#v3").val(data[0].telefono);
          $("#v4").val(data[0].direccion);
          $("#nuevo_cliente").slideUp();
        } else {
          $("#v1").val("");
          $("#v2").val("");
          $("#v3").val("");
          $("#v4").val("");
          $("#v2").attr("disabled", "disabled");
          $("#v3").attr("disabled", "disabled");
          $("#v4").attr("disabled", "disabled");
          $("#nuevo_cliente").slideDown();
        }
      },
    });
  });

  $("#busqueda").keyup(function (e) {
    let busqueda = $("#busqueda").val();
    $.ajax({
      url: "phpAjax/cliente.php",
      type: "POST",
      data: { busqueda },
      success: function (response) {
        if (response != "404") {
          let data = JSON.parse(response);
          // $("#v2").removeAttr("disabled");
          // $("#v3").removeAttr("disabled");
          // $("#v4").removeAttr("disabled");
          // $("#v1").val(data[0].id);
          $("#busqueda").attr("show")
          $("#busqueda_resultado").val(data[0].nombre);
          // $("#v3").val(data[0].telefono);
          // $("#v4").val(data[0].direccion);
          // $("#nuevo_cliente").slideUp();
          console.log(data[0].nombre);
        } else {
          // $("#v1").val("");
          // $("#v2").val("");
          // $("#v3").val("");
          // $("#v4").val("");
          // $("#v2").attr("disabled", "disabled");
          // $("#v3").attr("disabled", "disabled");
          // $("#v4").attr("disabled", "disabled");
          // $("#nuevo_cliente").slideDown();
        }
      },
    });
  });

  $("#r2").attr("disabled", "disabled");
  $("#r3").attr("disabled", "disabled");
  $("#r4").attr("disabled", "disabled");
  $("#r5").attr("disabled", "disabled");
  $("#venta").keyup(function (e) {
    let venta = $("#venta").val();
    $.ajax({
      url: "phpAjax/cliente.php",
      type: "POST",
      data: { venta },
      success: function (response) {
        if (response != "404") {
          let data = JSON.parse(response);
          $("#r2").removeAttr("disabled");
          $("#r3").removeAttr("disabled");
          $("#r4").removeAttr("disabled");
          $("#r5").removeAttr("disabled");
          $("#r1").val(data[0].id);
          $("#c1").val(data[0].cliente_id);
          $("#r2").val(data[0].fecha);
          $("#r3").val(data[0].total);
          $("#r4").val(data[0].enganche);
          $("#r5").val(data[0].saldo);
        } else {
          $("#r1").val("");
          $("#c1").val("");
          $("#r2").val("");
          $("#r3").val("");
          $("#r4").val("");
          $("#r5").val("");
          $("#r2").attr("disabled", "disabled");
          $("#r3").attr("disabled", "disabled");
          $("#r4").attr("disabled", "disabled");
          $("#r5").attr("disabled", "disabled");
        }
      },
    });
  });

  $("#id_producto").keyup(function (e) {
    let product = $("#id_producto").val();
    $.ajax({
      url: "phpAjax/cliente.php",
      type: "POST",
      data: { product },
      success: function (response) {
        if (response != "404") {
          let data = JSON.parse(response);
          $("#nombre").html(data[0].nombre);
          $("#precio").html(data[0].precio);
          $("#stock").html(data[0].stock);
          $("#cant_producto").removeAttr("disabled");
          $("#cant_producto").val("0");
        } else {
          $("#nombre").html("");
          $("#precio").html("");
          $("#stock").html("");
        }
      },
    });
  });

  $("#cant_producto").keyup(function (e) {
    e.preventDefault();
    var precio_total = $(this).val() * $("#precio").html();
    var existencia = parseInt($("#stock").html());
    $("#precio_total").html(precio_total);
    // Ocultat el boton Agregar si la cantidad es menor que 1
    if (
      $(this).val() < 1 ||
      isNaN($(this).val()) ||
      $(this).val() > existencia
    ) {
      $("#add_product_venta").slideUp();
    } else {
      $("#add_product_venta").slideDown();
    }
  });

  $("#add_product_venta").click(function (e) {
    let id = $("#id_producto").val();
    let nombre = $("#nombre").html();
    let cantidad = $("#cant_producto").val();
    let precio = $("#precio").html();
    let total = $("#precio_total").html();

    $("#detalle_venta").slideDown();
    $("#getId").html(id);
    $("#getNombre").html(nombre);
    $("#getStock").html(cantidad);
    $("#getPrecio").html(precio);
    $("#getTotal").html(total);

    $("#anular_venta").slideDown();
  });
});

function generarReporte(id) {
  $.ajax({
    url: "phpAjax/cliente.php",
    type: "POST",
    data: { id },
    success: function (response) {
      $(location).attr("href", "phpAjax/generarReporte.php");
    },
  });
}

function generarPagos(id2) {
  $.ajax({
    url: "phpAjax/cliente.php",
    type: "POST",
    data: { id2 },
    success: function (response) {
      $(location).attr("href", "phpAjax/generarPagos.php");
    },
  });
}

function generarTotales() {
  $(location).attr("href", "phpAjax/generarTotales.php");
}
