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
    dato=datos.split('||');
	id=dato[0];
	marca=dato[1];
	rubro=dato[2];
	modelo=dato[3];
	color=dato[4];
	desc=dato[5];
	precio_p=dato[6];
	precio_c=dato[7];
	precio_m=dato[8];
	img_1=dato[9];
	img_2=dato[10];
	img_3=dato[11];
	
	$('#id').val(id);
	$('#marca').val(marca);
	$('#rubro').val(rubro);
	$('#modelo').val(modelo);
	$('#color').val(color);
	$('#desc').val(desc);
	$('#precio_publico').val(precio_p);
	$('#precio_costo').val(precio_c);
	$('#precio_mayorista').val(precio_m);
	$('#imagen_1').val(img_1);
	$('#imagen_2').val(img_2);
	$('#imagen_3').val(img_3);
}