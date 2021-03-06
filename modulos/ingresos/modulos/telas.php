<form id="formularioTelas" onsubmit="return validarTelas();">
	<div class="form-group col-md-12" id="divDescripcion">
		<label for="descripcionTela">Descripción *</label>
		<input type="text" class="form-control" name="descripcionTela" id="descripcionTela" onkeypress="return validar_textonumero(event)" placeholder="Ingrese la Descripción de la Tela" required autofocus>
	</div>
	<div class="form-group col-md-6" id="divCosto">
		<label for="costoTela">Costo *</label>
		<input type="text" class="form-control" name="costoTela" id="costoTela" onkeypress="return validar_numero(event)" placeholder="Ingrese el Costo de la Tela" required>
	</div>
	<div class="form-group col-md-6">
		<label for="unidadTela">Unidad de Medida *</label>
		<select class="form-control" name="unidadTela" id="unidadTela" required></select>
	</div>
	<div class="form-group col-md-6" id="divAncho">
		<label for="anchoTela">Ancho *</label>
		<input type="text" class="form-control" name="anchoTela" id="anchoTela" onkeypress="return validar_numero(event)" placeholder="Ingrese el Ancho de la Tela" required>
	</div>
	<div class="form-group col-md-6" style="display:none;" id="renTe">
		<label for="rendimientoTela">Rendimiento</label>
		<input type="text" class="form-control" name="rendimientoTela" id="rendimientoTela" onkeypress="return validar_numero(event)" placeholder="Ingrese el Rendimiento de la Tela si es necesario">
	</div>
	<div class="col-md-12 coloridoTela">
		<div class="btn-group col-md-12">
			<button type="button" class="btn btn-info" id="adicionarColor"><i class="fa fa-plus"></i> Color</button>
			<button type="button" class="btn btn-danger" id="quitarColor"><i class="fa fa-minus"></i> Quitar</button>
		</div><br><br>
	</div>
	<div class="form-group col-md-6">
		<label for="tipoTela">Tipo *</label>
		<select class="form-control" name="tipoTela" id="tipoTela" required></select>
	</div>
	<div class="form-group col-md-6">
		<label for="estadoTela">Estado *</label>
		<select class="form-control" name="estadoTela" id="estadoTela" required></select>
	</div>
	<div class="form-group col-md-12">
		<button class="btn btn-primary" name="guardarInsumo" onclick="GuardarTelas();">Guardar</button>
		<a href="modulos.php?name=ingresos" class="btn btn-success">Cancelar</a>
	</div>
</form>