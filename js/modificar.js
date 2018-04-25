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

  $(".modificar").click(function() {

    var nombre = $(this).parent('td').parent('tr').find('.nombre').val();
    var descripcion = $(this).parent('td').parent('tr').find('.descripcion').val();
    var precio = $(this).parent('td').parent('tr').find('.precio').val();
    var mas_vendido = $(this).parent('td').parent('tr').find('.mas_vendido').val();
    var autor = $(this).parent('td').parent('tr').find('.autor').val();
    var tema = $(this).parent('td').parent('tr').find('.tema').val();

    $.post('./ejecuta.php', {
      Caso: 'Modificar',
      Id: $(this).attr('data-id'),
      Nombre: nombre,
      Descripcion: descripcion,
      Precio: precio,
      Mas_vendido: mas_vendido,
      Autor: autor,
      Tema: tema

    }, function(e) {
      alert(e);


    });
  });
});
