//EDITAR_PRODUCTOS.PHP


function eliminar_producto(id){
    cadena = "id=" + id;
    $.ajax({
        type:"POST",
        url:"../consultas/eliminar_productos.php",
        data:cadena,
        success:function(res){
                if(res==1){
                        alertify.success('Se actualizo correctamente los precios correctamente');
                        location.reload();  
                }else{
                        alertify.error("Fallo el procedimiento");
                }
        }
    });
}


function guardar_productos(cadena){
    $.ajax({
        type: "POST",
        url: "../consultas/editar_productos.php",
        data:cadena,
        success: function (res) {
            if(res==1){
                alertify.success("Se actualizo correctamente los productos correctamente");
                location.reload();
            }else{
                alertify.error("Fallo el procedimiento");
                location.reload();
            }
        }
    });
}

function editar_productos(datos){
    dato = datos.split('||');
    id = dato[0];
    marca = dato[1];
    rubro = dato[2];
    modelo = dato[3];
    desc = dato[4];
    color = dato[5];
    cantidad = dato[6];
    precio_p = dato[7];
    precio_c = dato[8];
    precio_m = dato[9];
    img_1 = dato[10];
    img_2 = dato[11];
    img_3 = dato[12];

    $('#id').val(id);
    $('#marca').val(marca);
    $('#rubro').val(rubro);
    $('#modelo').val(modelo);
    $('#desc').val(desc);
    $('#color').val(color);
    $('#cantidad').val(cantidad);
    $('#precio_publico').val(precio_p);
    $('#precio_costo').val(precio_c);
    $('#precio_mayorista').val(precio_m);
    $('#imagen_1').val(img_1);
    $('#imagen_2').val(img_2);
    $('#imagen_3').val(img_3);
}