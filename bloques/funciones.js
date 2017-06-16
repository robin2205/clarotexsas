// var _Consulta = '';
// var Resultado1 = '';

$(document).ready(function() {
    //Deshabilitamos el focus sobre los botones y campos
    $('button').focus(function(){
        this.blur();
    });
    //Cargamos las funciones que queremos desde el Principio
    TraerUMedidas();
    TraerEstados();
    TraerColoresTelas();


    //ConsultaPrueba();
});

//Esta función se encarga de pedir por medio de AJAX las unidades de Medida
function TraerUMedidas(){
    var Datos=new Object();
    Datos["ConfigAjax"]=['POST','RespuestaAjax.php?mod=master&cmd=TraerUMedidas','false'];
    Resultado=PeticionAjax(Datos);
    if(Resultado!=false && Resultado!=''){
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
function TraerEstados(){
    var Datos=new Object();
    Datos["ConfigAjax"]=['POST','RespuestaAjax.php?mod=master&cmd=TraerEstados','false'];
    Resultado=PeticionAjax(Datos);
    if(Resultado!=false && Resultado!=''){
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
function TraerColoresTelas(){
    var Datos=new Object();
    Datos["ConfigAjax"]=['POST','RespuestaAjax.php?mod=master&cmd=TraerColoresTelas','false'];
    Resultado=PeticionAjax(Datos);
    if(Resultado!=false && Resultado!=''){
        select='';
        select+='<option value="">Seleccione una Opción...</option>';
        $.each(Resultado.Datos,function(indice,valor){
            id=valor.id;
            color=valor.color;
            select+='<option value="'+id+'">'+color+'</option>';
        });
        $("#coloresTela").html(select);
    }
}




function MostrarUsuarios(user) {
    var Datos = new Object();
    Datos["NombreUsuario"] = user;
    Datos["ConfigAjax"] = ['POST', 'RespuestaAjax.php?mod=master&cmd=MostrarUsuarios', 'false'];
    Resultado1 = PeticionAjax(Datos);
    if (Resultado1 != false && Resultado1 != '') {
        TablaUsuario = "";
        TablaUsuario += '<tbody>';
        $.each(Resultado1.Datos, function(indice, valor){
            console.log(valor);            usuario = valor.usuario;
            contrasena = valor.password;
            TablaUsuario += '<tr>';
            TablaUsuario += '   <td>' + usuario + '</td>';
            TablaUsuario += '   <td>' + contrasena + '</td>';
            TablaUsuario += '</tr>'
        });
        TablaUsuario += '</tbody>';
        $("#tabla_usuarios").html(TablaUsuario);
    }
}
/*FUNCION DE PRUEBA
function ConsultaPrueba() {
    var Datos = new Object();
    //var aleatori = $("#orden").val();
    //Datos["IdUsuario"] = idUsuario;
    Datos["ConfigAjax"] = ['POST', 'RespuestaAjax.php?mod=master&cmd=ConsultaPrueba', 'false'];
    var Resultado = PeticionAjax(Datos);
    if (Resultado != false && Resultado != '') {
        _Consulta = Resultado.Datos;
        Tabla = "";
        Tabla += '<tbody>';
        $.each(_Consulta, function(x, item) {
            descripcion = item.descripcion;
            rendimiento = item.rendimiento;
            color = item.color;
            ancho = item.ancho;
            Tabla += '<tr>';
            Tabla += '   <td>' + descripcion + '</td>';
            Tabla += '   <td>' + rendimiento + '</td>';
            Tabla += '   <td>' + color + '</td>';
            Tabla += '   <td>' + ancho + '</td>';
            Tabla += '</tr>'
        });
        Tabla += '</tbody>';
        $("#tabla_resultados").html(Tabla);
    } else {
        return false;
    }
}*/

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
            }
            /*,error: function(XMLHttpRequest, textStatus, errorThrown) {
                errores(XMLHttpRequest, textStatus);
                //AjaxFinalizarIndicadorPeticion();
            },
            complete: function() {
                //hideLightbox_loader();
                //AjaxFinalizarIndicadorPeticion();
            }*/
    });
    return ResultadoPOST;
}
