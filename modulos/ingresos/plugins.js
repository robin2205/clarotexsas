<script>
var conteo=0;
$(document).ready(function(){
	$("#adicionarColor").on('click',function(){
		conteo=conteo+1;
	});

	$("#unidadTela").change(function(){
		if($("#unidadTela").val()==3){
			$("#renTe").show("slow");}
		else{
			$("#renTe").hide("slow");}
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

//Esta función válida la información de las Telas
function validarTelas(){
	//Capturamos los campos
	descripcion=$("#descripcionTela").val();
	costo=$("#costoTela").val();
	ancho=$("#anchoTela").val();
	rendimiento=$("#rendimientoTela").val();

	//Creamos la expresión regular
	var expresion=/^[a-zA-Z0-9\sáéíóúñÁÉÍÓÚ]*$/;
	var expresion2=/^[0-9\.]*$/;
	//Válidamos que las cajas no esten vacias
	if(descripcion!=""){
		//Capturamos los caracteres
		var caracteres=descripcion.length;
		//Evaluamos lo que se escribe en las diferentes cajas
		if(!expresion.test(descripcion)){
			$("#divDescripcion").after('<div class="col-md-12">\
											<div class="alert alert-danger alert-dismissable">\
											    <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>\
											    <strong>Error!</strong> No se permiten Caracteres Especiales.\nPor favor verifique la información ingresada en el campo Descripción.\
										  	</div>\
										</div>');
			return false;}}
	if(costo!=""){
		//Capturamos los caracteres
		var caracteres=costo.length;
		//Evaluamos lo que se escribe en las diferentes cajas
		if(!expresion2.test(costo)){
			$("#divCosto").after('<div class="col-md-6">\
											<div class="alert alert-danger alert-dismissable">\
											    <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>\
											    <strong>Error!</strong> No se permiten Caracteres Especiales ni Letras.\nPor favor verifique la información ingresada en el campo Costo.\
										  	</div>\
										</div>');
			return false;}}
	if(ancho!=""){
		//Capturamos los caracteres
		var caracteres=ancho.length;
		//Evaluamos lo que se escribe en las diferentes cajas
		if(!expresion2.test(ancho)){
			$("#divAncho").after('<div class="col-md-6">\
											<div class="alert alert-danger alert-dismissable">\
											    <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>\
											    <strong>Error!</strong> No se permiten Caracteres Especiales ni Letras.\nPor favor verifique la información ingresada en el campo Ancho.\
										  	</div>\
										</div>');
			return false;}}
	if(rendimiento!=""){
		//Capturamos los caracteres
		var caracteres=rendimiento.length;
		//Evaluamos lo que se escribe en las diferentes cajas
		if(!expresion2.test(rendimiento)){
			$("#renTe").after('<div class="col-md-6">\
											<div class="alert alert-danger alert-dismissable">\
											    <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>\
											    <strong>Error!</strong> No se permiten Caracteres Especiales ni Letras.\nPor favor verifique la información ingresada en el campo Rendimiento.\
										  	</div>\
										</div>');
			return false;}}
	if(conteo>0){
		for(var i=1;i<=conteo;i++){
			cantidadTela=$('#cantidadTela'+i).val();
			if(cantidadTela!=""){
				//Capturamos los caracteres
				var caracteres=cantidadTela.length;
				//Evaluamos lo que se escribe en las diferentes cajas
				if(!expresion2.test(cantidadTela)){
					$('#cantidadTela'+i).after('<div class="col-md-6">\
													<div class="alert alert-danger alert-dismissable">\
													    <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>\
													    <strong>Error!</strong> No se permiten Caracteres Especiales ni Letras.\nPor favor verifique la información ingresada en el campo Cantidad.\
												  	</div>\
												</div>');
					return false;}}}
	}
	//Esta función nos retorna un valor verdadero
	return true;
}
</script>