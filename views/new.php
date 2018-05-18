<?php require_once('check_connexion.php'); ?>
<!doctype html>
<html>
	<head>
		<title>ESIS-OJ</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="static/css/style.css" />
		<link rel="stylesheet" href="static/css/today.css" />
		<link rel="stylesheet" href="static/css/suite.css" />
	</head>
	<body>
		<?php include_once('head.php'); ?>
		<div class="content">
			<div class="toutes-publications">
				<h2>Nouvelle publication</h2>
				<form method="post" action="../contollers/add_post.php" class="add-publication">
					<textarea name="contenu" placeholder="" required></textarea><br />
					<input type="submit" value="Publier" />
				</form>
			</div>
		</div>
		<?php include_once('foot.php'); ?>
	</body>
</html>