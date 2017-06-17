<script>
$(document).ready(function(){
	var cont=0;
	//Adicionar los colores y cantidades para las telas
	$("#adicionarColor").on('click',function(){
		cont=cont+1;
		var estructura=$('\
			<div class="form-group col-md-6" id="estruno'+cont+'">\
				<label for="coloresTela">Color</label>\
				<select class="form-control" id="coloresTela'+cont+'" name="coloresTela'+cont+'"></select>\
			</div>\
			<div class="form-group col-md-6" id="estrudos'+cont+'">\
				<label for="cantidadTela">Cantidad Comprada</label>\
				<input type="text" class="form-control" name="cantidadTela'+cont+'" id="cantidadTela'+cont+'" onkeypress="return validar_numero(event)" placeholder="Ingrese la Cantidad Comprada" required>\
			</div>').hide();
		$(".coloridoTela").append(estructura);
		estructura.show('slow');
	});

	$("#quitarColor").on('click',function(){
		if(cont>=1){
			$('#estruno'+cont).hide('slow',function(){
				$(this).remove();
			});
			$('#estrudos'+cont).hide('slow',function(){
				$(this).remove();
			});
			cont=cont-1;}
	});

	$("#unidadTela").change(function(){
		if($("#unidadTela").val()==3){
			$("#renTe").show("slow");}
		else{
			$("#renTe").hide("slow");}
	});

	//Adicionar los colores, tallas y cantidades para los Insumos
	$("#adicionarInsumo").on('click',function(){
		cont=cont+1;
		var estructura=$('<div class="form-group col-md-4" id="estruColo'+cont+'">\
							<label for="coloresInsumo">Colores</label>\
							<select class="form-control" id="coloresInsumo'+cont+'" name="coloresInsumo'+cont+'"></select>\
						</div>\
						<div class="form-group col-md-4" id="estruTall'+cont+'">\
							<label for="tallasInsumo">Tallas</label>\
							<select class="form-control" id="tallasInsumo'+cont+'" name="tallasInsumo'+cont+'"></select>\
						</div>\
						<div class="form-group col-md-4" id="estruCant'+cont+'">\
							<label for="cantidadInsumo">Cantidad Comprada</label>\
							<input type="text" class="form-control" name="cantidadInsumo'+cont+'" id="cantidadInsumo'+cont+'" onkeypress="return validar_numero(event)" placeholder="Ingrese la Cantidad Comprada" required>\
						</div>').hide();
		$(".coloridoInsumo").append(estructura);
		estructura.show('slow');
	});

	$("#quitarInsumo").on('click',function(){
		if(cont>=1){
			$('#estruColo'+cont).hide('slow',function(){
				$(this).remove();
			});
			$('#estruTall'+cont).hide('slow',function(){
				$(this).remove();
			});
			$('#estruCant'+cont).hide('slow',function(){
				$(this).remove();
			});
			cont=cont-1;}
	});
});

function validar_textonumero(e){
	tecla=(document.all)?e.keyCode:e.which;
	if(tecla==8) return true;
	patron=/[A-Za-z0-9\sáéíóúñÁÉÍÓÚ]/;
	tecla_final=String.fromCharCode(tecla);
	return patron.test(tecla_final);
}

function validar_texto(e){
	tecla=(document.all)?e.keyCode:e.which;
	if(tecla==8) return true;
	patron=/[A-Za-z\sáéíóúñÁÉÍÓÚ]/;
	tecla_final=String.fromCharCode(tecla);
	return patron.test(tecla_final);
}

function validar_numero(e){
	tecla=(document.all)?e.keyCode:e.which;
	if(tecla==8) return true;
	patron=/^[0-9\.]*$/;
	tecla_final=String.fromCharCode(tecla);
	return patron.test(tecla_final);
}
</script>