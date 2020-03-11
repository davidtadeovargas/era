<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Title of the document</title>
	</head>

	<body>

		Felicitaciones <?php echo $model->User->name; ?>, ahora formas parte del equipo Easy Retail Admin, porfavor da click en el siguiente enlace para que valides tu correo electrónico:<br><br>

		<a href="<?php echo $model->link; ?>">Click aquí para validar tu email</a><br><br>

		<a href="http://localhost/download?download=false">En este enlace puedes decargar el instalador de ERA :)</a>

	</body>

</html>