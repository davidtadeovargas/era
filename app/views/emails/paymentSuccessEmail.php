<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>En hora buena, ya tienes tu licencia</title>
	</head>

	<body>

		Felicitaciones por la compra de tu producto, aquí están tus datos de compra:<br><br>
		Usuario: <?php echo $model->user; ?><br><br>
		<?php echo $model->licenses; ?>
		<br><br>
		Gracias!		

	</body>

</html>