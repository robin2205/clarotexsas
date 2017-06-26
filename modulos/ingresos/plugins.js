<script>
$(document).ready(function(){
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
</script>