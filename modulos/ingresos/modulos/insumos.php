<form id="formularioInsumos">
	<h1>Ingreso de Insumos</h1>
	<hr>
	<div class="form-group col-md-12">
		<label for="descripcionInsumo">Descripción</label>
		<input type="text" class="form-control" name="descripcionInsumo" id="descripcionInsumo" onkeypress="return validar_textonumero(event)" placeholder="Ingrese la Descripción del Insumo" required autofocus>
	</div>
	<div class="form-group col-md-6">
		<label for="costoInsumo">Costo</label>
		<input type="text" class="form-control" name="costoInsumo" id="costoInsumo" onkeypress="return validar_numero(event)" placeholder="Ingrese el Costo del Insumo" required>
	</div>
	<div class="form-group col-md-6">
		<label for="unidadInsumo">Unidad de Medida</label>
		<select class="form-control" name="unidadInsumo" id="unidadInsumo" required></select>
	</div>
	<div class="col-md-12 coloridoInsumo">
		<div class="btn-group col-md-12">
			<button type="button" class="btn btn-info" id="adicionarInsumo"><i class="fa fa-plus"></i> Color</button>
			<button type="button" class="btn btn-danger" id="quitarInsumo"><i class="fa fa-minus"></i> Quitar</button>
		</div><br><br>
	</div>
	<div class="form-group col-md-6">
		<label for="estadoInsumo">Estado</label>
		<select class="form-control" name="estadoInsumo" id="estadoInsumo" required></select>
	</div>
	<div class="form-group col-md-12">
		<input type="submit" name="guardarInsumo" class="btn btn-primary" value="Guardar">
		<a href="modulos.php?name=ingresos" class="btn btn-success">Cancelar</a>
	</div>
</form>