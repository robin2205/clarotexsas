function validarIngreso(){
	var expresion=/^[a-zA-Z0-9]*$/;
	//Evaluamos lo que se escribe en usuario
	if(!expresion.test($("#user").val())){
		return false;}
	//Evaluamos lo que se escribe en password
	if(!expresion.test($("#clave").val())){
		return false;}
	return true;
}

function validar_textonumero(e){
	tecla=(document.all)?e.keyCode:e.which;
	if(tecla==8) return true;
	patron=/[A-Za-z0-9\sáéíóúñÁÉÍÓÚ]/;
	tecla_final=String.fromCharCode(tecla);
	return patron.test(tecla_final);
}