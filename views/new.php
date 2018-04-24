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
		<div class="head-group">
			<div class="head">
				<h1>ESIS-OJ</h1>
				<p>
					<a href="today.php">Today</a>|
					<a href="all.php">All</a>|
					<a href="new.php">New</a>|
					<a href="top10.php">Top10</a>|
					<a href="deconnexion.php">Deconnexion</a>
				</p>
			</div>
		</div>
		<div class="content">
			<div class="toutes-publications">
				<h2>Nouvelle publication</h2>
				<form method="post" action="../controllers/add_publication.php" class="add-publication">
					<textarea name="contenu" placeholder="" required></textarea><br />
					<input type="submit" value="Publier" />
				</form>
			</div>
		</div>
		<div class="foot">
			<p>
				ESIS-OJ &copy 2018
			</p>
		</div>
	</body>
</html>