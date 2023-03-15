<!DOCTYPE html>
<html>
<head>
	<title>Iniciar Test</title>
</head>
<body>
	<h1>Test <?php echo $test; ?></h1>
	<p>Haz clic en el botón para iniciar el test <?php echo $test ?>:</p>
        <a href="index.php?section=<?php echo $test?>&action=show_quest&num=1">Iniciar</a>
</body>
</html>
