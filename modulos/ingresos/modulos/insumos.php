<form id="formularioInsumos">
	<h1>Ingreso de Insumos</h1>
	<hr>
	<div class="form-group col-md-12">
		<label for="descripcionInsumo">Descripción</label>
		<input type="text" class="form-control" name="descripcionInsumo" id="descripcionInsumo" placeholder="Ingrese la Descripción del Insumo" required autofocus>
	</div>
	<div class="form-group col-md-6">
		<label for="costoInsumo">Costo</label>
		<input type="text" class="form-control" name="costoInsumo" id="costoInsumo" placeholder="Ingrese el Costo del Insumo" required>
	</div>
	<div class="form-group col-md-6">
		<label for="cantidadInsumo">Cantidad Comprada</label>
		<input type="text" class="form-control" name="cantidadInsumo" id="cantidadInsumo" placeholder="Ingrese la Cantidad Comprada" required>
	</div>
	<div class="form-group col-md-6">
		<label for="unidadInsumo">Unidad de Medida</label>
		<select class="form-control" name="unidadInsumo" id="unidadInsumo" required></select>
	</div>
	<div class="form-group col-md-6">
		<label for="estadoInsumo">Estado</label>
		<select class="form-control" name="estadoInsumo" id="estadoInsumo" required></select>
	</div>
	<div class="form-group col-md-6">
		<label for="coloresInsumo">Colores</label>
		<select class="form-control" id="coloresInsumo" name="coloresInsumo" multiple>
		    <option value="#">Rojo</option>
		    <option value="#">Blanco</option>
		    <option value="#">Negro</option>
		    <option value="#">Gris Jaspe</option>
		    <option value="#">Verde</option>
		    <option value="#">Azul O</option>
		</select>
	</div>
	<div class="form-group col-md-6">
		<label for="tallasInsumo">Tallas</label>
		<select class="form-control" id="tallasInsumo" name="tallasInsumo" multiple>
		    <option value="#">02</option>
		    <option value="#">04</option>
		    <option value="#">06</option>
		    <option value="#">08</option>
		    <option value="#">10</option>
		    <option value="#">12</option>
		</select>
	</div>
	<div class="form-group col-md-12">
		<input type="submit" name="guardarInsumo" class="btn btn-primary" value="Guardar">
		<a href="modulos.php?name=ingresos" class="btn btn-success">Cancelar</a>
	</div>
</form>