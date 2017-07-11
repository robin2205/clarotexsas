var cont=0;
$(document).ready(function() {
    //Deshabilitamos el focus sobre los botones y campos
    $('button').focus(function() {
        this.blur();
    });
    //Cargamos las funciones que queremos desde el Principio
    TraerUMedidas();
    TraerEstados();
    TraerTipos();

    //Aquí es donde adicionamos los colores de las Telas
    $("#adicionarColor").on('click',function(){
        cont=cont+1;
        var estructura=$('\
            <div class="form-group col-md-6" id="estruno'+cont+'">\
                <label for="coloresTela">Color *</label>\
                <select class="form-control" id="coloresTela'+cont+'" name="coloresTela'+cont+'" required></select>\
            </div>\
            <div class="form-group col-md-6" id="estrudos'+cont +'">\
                <label for="cantidadTela">Cantidad Comprada *</label>\
                <input type="text" class="form-control" name="cantidadTela'+cont+'" id="cantidadTela'+cont+'" onkeypress="return validar_numero(event)" placeholder="Ingrese la Cantidad Comprada" required>\
            </div>').hide();
        $(".coloridoTela").append(estructura);
        estructura.show('slow');
        TraerColoresTelas(cont);
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
        TraerColoresInsumos(cont);
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

//Esta función se encarga de pedir por medio de AJAX las unidades de Medida
function TraerUMedidas() {
    var Datos=new Object();
    Datos["ConfigAjax"]=['POST','RespuestaAjax.php?mod=master&cmd=TraerUMedidas','false'];
    Resultado=PeticionAjax(Datos);
    if (Resultado!=false && Resultado!='') {
        select='';
        select+='<option value="">Seleccione una Opción...</option>';
        $.each(Resultado.Datos,function(indice,valor){
            id=valor.idunidaddeMedidas;
            descripcion=valor.descripcion;
            select+='<option value="'+id+'">'+descripcion+'</option>';
        });
        $("#unidadInsumo").html(select);
        $("#unidadTela").html(select);
    }
}

//Esta función se encarga de pedir por medio de AJAX las unidades de Medida
function TraerEstados() {
    var Datos=new Object();
    Datos["ConfigAjax"]=['POST','RespuestaAjax.php?mod=master&cmd=TraerEstados','false'];
    Resultado=PeticionAjax(Datos);
    if (Resultado!=false && Resultado!=''){
        select='';
        select+='<option value="">Seleccione una Opción...</option>';
        $.each(Resultado.Datos,function(indice,valor){
            id=valor.idestados;
            descripcion=valor.descripcion;
            select+='<option value="'+id+'">'+descripcion+'</option>';
        });
        $("#estadoInsumo").html(select);
        $("#estadoTela").html(select);
    }
}

//Esta función se encarga de pedir por medio de AJAX los colores de Telas
function TraerColoresTelas(contador) {
    var Datos=new Object();
    Datos["ConfigAjax"]=['POST','RespuestaAjax.php?mod=master&cmd=TraerColoresTelas','false'];
    Resultado=PeticionAjax(Datos);
    if(Resultado!=false && Resultado!='') {
        select='';
        select+='<option value="">Seleccione una Opción...</option>';
        $.each(Resultado.Datos, function(indice,valor) {
            idcolor=valor.id;
            descolor=valor.color;
            select+='<option value="'+idcolor+'">'+descolor+'</option>';
        });
        $('#coloresTela'+contador).html(select);
    }
}

//Esta función se encarga de pedir por medio de AJAX los Tipos de Inventario
function TraerTipos(){
    var Datos=new Object();
    Datos["ConfigAjax"]=['POST','RespuestaAjax.php?mod=master&cmd=TraerTipos','false'];
    Resultado=PeticionAjax(Datos);
    if(Resultado!=false && Resultado!='') {
        select='';
        select+='<option value="">Seleccione una Opción...</option>';
        $.each(Resultado.Datos,function(indice,valor){
            idcolor=valor.idtipoInventario;
            descrip=valor.descripcion;
            select+='<option value="'+idcolor+'">'+descrip+'</option>';
        });
        $('#tipoTela').html(select);
    }
}

//Esta función se encarga de pedir por medio de AJAX los colores de Insumos
function TraerColoresInsumos(contador) {
    var Datos=new Object();
    Datos["ConfigAjax"]=['POST','RespuestaAjax.php?mod=master&cmd=TraerColoresInsumos','false'];
    Resultado=PeticionAjax(Datos);
    if(Resultado!=false && Resultado!='') {
        select='';
        select+='<option value="">Seleccione una Opción...</option>';
        $.each(Resultado.Datos, function(indice,valor) {
            idcolor=valor.id;
            descolor=valor.color;
            select+='<option value="'+idcolor+'">'+descolor+'</option>';
        });
        $('#coloresInsumo'+contador).html(select);
    }
}

//Esta función se encarga de guardar los inventarios de telas
function GuardarTelas(){
    if($("#descripcionTela").val()!="" && $("#costoTela").val()!="" && $("#unidadTela").val()!="" && $("#anchoTela").val()!="" && $("#tipoTela").val()!="" && $("#estadoTela").val()!=""){
        var colores = new Array();
        var cantidades = new Array();
        //Creamos un array para guardar los colores
        colores[0]=[cont-1];
        cantidades[0]=[cont-1];
        for(var i=0;i<=cont-1;i++){
            colores[i]=$('#coloresTela'+(i+1)).val();
            cantidades[i]=$('#cantidadTela'+(i+1)).val();
        }
        /*CREAMOS UN OBJETO PARA ENVIAR LOS DATOS QUE VAMOS A ALMACENAR AL CONTROLADOR*/
        var DatosGuardar=new Object();
        //Capturamos los campos
        descripcion=$("#descripcionTela").val();
        costo=$("#costoTela").val();
        unidad=$("#unidadTela").val();
        ancho=$("#anchoTela").val();
        rendimiento=$("#rendimientoTela").val();
        tipoI=$("#tipoTela").val();
        estado=$("#estadoTela").val();
        /*INSERTAMOS LOS DATOS EN EL OBJETO*/
        DatosGuardar["descripcion"]=descripcion;
        DatosGuardar["costo"]=costo;
        DatosGuardar["unidad"]=unidad;
        DatosGuardar["ancho"]=ancho;
        DatosGuardar["rendimiento"]=rendimiento;
        DatosGuardar["tipoI"]=tipoI;
        DatosGuardar["estado"]=estado;
        DatosGuardar["colores"]=colores;
        DatosGuardar["cantidades"]=cantidades;
        DatosGuardar["ConfigAjax"]=['POST','RespuestaAjax.php?mod=master&cmd=GuardarTela','false'];
        Resultado=PeticionAjax(DatosGuardar);
        if(Resultado!=false && Resultado!=''){
            console.log(Resultado.Datos);
            alert(Resultado.Datos);
        }
    }
}

//Esta función es la encargada de realizar la petición AJAX
function PeticionAjax(Datos){
    var ResultadoPOST=false;
    var Config=Datos['ConfigAjax'];
    var _Type=Config[0];
    var _Url=Config[1];
    var _Async=eval(Config[2]);
    Datos['ConfigAjax']='';
    $.ajax({
        type:_Type,
        url:_Url,
        async:_Async,
        global:true,
        dataType:'json',
        data:Datos,
        success:function(data){
            ResultadoPOST=data;
            //AjaxFinalizarIndicadorPeticion();
        },
        error:function(XMLHttpRequest,textStatus,errorThrown){
                errores(XMLHttpRequest,textStatus);
                //AjaxFinalizarIndicadorPeticion();
            }
            /*,
                        complete: function() {
                            //hideLightbox_loader();
                            //AjaxFinalizarIndicadorPeticion();
                        }*/
    });
    return ResultadoPOST;
}

function errores(jqXHR,exception) {
    if(jqXHR.responseText!=''){
        alert('Error Interno');
        console.log(jqXHR.responseText);}
    if(jqXHR.status==404){
        alert('No se ha podido conectar al destino');}
    else if(jqXHR.status==500){
        alert('Error interno del servicio');}
    else if(exception=='parsererror'){}
    else if (exception=='timeout') {
        alert('Se ha superado el tiempo de espera');}
    else if(exception=='abort'){
        alert('Petición cancelada');}
    else if(jqXHR.status==405){
        alert('La peticón no es correcta para dominios externos');}
}
