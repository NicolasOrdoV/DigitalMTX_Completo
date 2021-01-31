<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<iframe name="form" width="0" height="0" frameborder="0"></iframe>
<form name="form1" method="post" action="">
	<div>
		<label>Codigo</label>
	</div>
	<div>
		<input type="text" name="codigo" id="codigo" onblur="form.location.href='productos.php=id='+this.value">
	</div>
	<div>
		<label>Nombre</label>
	</div>
	<div>
		<input type="text" name="Nombre" id="nombre">
	</div>
	<div>
		<label>Precio</label>
	</div>
	<div>
		<input type="text" name="precio" id="precio">
	</div>
</form>
</body>
</html>