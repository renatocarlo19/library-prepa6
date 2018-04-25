$(document).ready(function() {
  var estado = false;
  $('#btn-toggle').on('click', function() {
    $('.seccionToggle').slideToggle();

    if (estado == true) {
      $(this).text("Elige una categoría");

      estado = false;
    } else {
      $(this).text("Cerrar");
      estado = true;
    }
  });
});
