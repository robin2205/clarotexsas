<html>
	<head>
		<title>Clarotex S.A.S</title>
		<link href="styles/es_login.css" rel="stylesheet" type="text/css" media="screen"/>
		<link type="text/css" rel="stylesheet" href="styles/bootstrap.min.css">
		<link rel="icon" href="images/icono.png" type="image/x-icon">
	</head>
	<body>
		<div class="login-page">
			<div class="form">
				<form class="login-form" name="form" action="<?=htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" onsubmit="return validarIngreso()">
					<h1>Ingreso al Sistema</h1>
					<input id="user" name="user" type="text" placeholder="Ingrese el Usuario" autofocus required onkeypress="return validar_textonumero(event)" oninvalid="setCustomValidity('El campo Usuario es obligatorio')" oninput="setCustomValidity('')"/>
					<input id="clave" name="clave" type="password" placeholder="Ingrese la Contraseña" required onkeypress="return validar_textonumero(event)" oninvalid="setCustomValidity('El campo Contraseña es obligatorio')" oninput="setCustomValidity('')"/>
					<?php
					if(!empty($errores)):?>
						<div class="alert alert-danger alert-dismissable" role="alert">
							<a href="#" class="close" data-dismiss="alert" arial-label="close">X</a>
							<i class="fa fa-exclamation-triangle" aria-hidden="true"></i><?=$errores;?>
						</div>
					<?php endif;?>
					<button>Ingresar</button>
				</form>
			</div>
		</div>
		<script src="script/jquery-1.10.2.min.js"></script>
		<script src="script/bootstrap.min.js"></script>
		<script src="modulos/login/plugins.js"></script>
	</body>
</html>
