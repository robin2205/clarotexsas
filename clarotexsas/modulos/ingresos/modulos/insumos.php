<form id="formularioInsumos">
	<h1>Ingreso de Insumos</h1>
	<hr>
	<div class="form-group col-md-12">
		<label for="descripcion">Descripción</label>
		<input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese la Descripción del Insumo" required autofocus>
	</div>
	<div class="form-group col-md-6">
		<label for="costo">Costo</label>
		<input type="text" class="form-control" name="costo" id="costo" placeholder="Ingrese el Costo del Insumo" required>
	</div>
	<div class="form-group col-md-6">
		<label for="cantidad">Cantidad Comprada</label>
		<input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="Ingrese la Cantidad Comprada" required>
	</div>
	<div class="form-group col-md-6">
		<label for="unidad">Unidad de Medida</label>
		<select class="form-control" name="unidad" id="unidad" required>
			<option value="">Seleccione una Opción...</option>
		</select>
	</div>
	<div class="form-group col-md-6">
		<label for="estado">Estado</label>
		<select class="form-control" name="estado" id="estado" required>
			<option value="">Seleccione una Opción...</option>
		</select>
	</div>
	<div class="form-group col-md-6">
		<label for="colores">Colores</label>
		<select class="form-control" id="colores" name="colores" multiple>
		    <option value="#">Rojo</option>
		    <option value="#">Blanco</option>
		    <option value="#">Negro</option>
		    <option value="#">Gris Jaspe</option>
		    <option value="#">Verde</option>
		    <option value="#">Azul O</option>
		</select>
	</div>
	<div class="form-group col-md-6">
		<label for="tallas">Tallas</label>
		<select class="form-control" id="tallas" name="tallas" multiple>
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