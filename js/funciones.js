//EDITAR_PRODUCTOS.PHP


function eliminar_producto(id){
    cadena = "id=" + id;
    $.ajax({
        type:"POST",
        url:"../consultas/eliminar_productos.php",
        data:cadena,
        success:function(res){
                if(res==1){
                        alertify.success('hola muddda');
                        alertify.success('Se actualizo correctamente los precios correctamente');
                        location.reload();  
                }else{
                        alertify.error("Fallo el procedimiento");
                }
        }
    });
}

//llamar partes
fetch('../tabla_productos/nuevo_producto.php')
.then(response => response.text())
.then(html => {
    // Inserta el contenido del modal nuevo producto en el contenedor
    document.getElementById('llamar_nuevo_producto').innerHTML = html;
})
.catch(error => console.error('Error al cargar el modal:', error));

fetch('../tabla_productos/tabla_productos.php')
.then(response => response.text())
.then(html => {
    // Inserta el contenido del tabla productos en el contenedor
    document.getElementById('llamar_tabla_productos').innerHTML = html;
})
.catch(error => console.error('Error al cargar el tabla productos:', error));


$(document).ready(function () {
    // ...

    $('#tbl_productos').on('click', '.btn_guardar', function () {
        var productId = $(this).data('product-id');
        var modalId = 'modal-editar-producto-' + productId;
        var form = $('#' + modalId + ' form');
        var formData = form.serialize();

        $.ajax({
            type: 'POST',
            url: '../consultas/editar_productos.php',
            data: formData,
            success: function (response) {
                var result = JSON.parse(response);

                if (result.success) {
                    alertify.success(result.message);
                    // Cerrar el modal después de la actualización
                    $('#' + modalId).modal('hide');
                } else {
                    alertify.error(result.message);
                }
            }
        });
    });
});


