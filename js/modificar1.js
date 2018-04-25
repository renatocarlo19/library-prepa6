$(document).ready(function() {

  $(".eliminar").click(function() {
    $(this).parent('td').parent('tr').remove();
    var imagen = $(this).parent('td').parent('tr').find('.imagen').val();

    $.post('./ejecuta.php', {
      Caso: 'Eliminar',
      Id: $(this).attr('data-id'),
      Imagen: imagen
    }, function(e) {
      alert(e);
    });
  });



});
