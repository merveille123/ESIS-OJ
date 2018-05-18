<?php
	session_start();
	if(isset($_SESSION['matricule'])) {
		header('Location: today.php');
	}
?>
<!doctype html>
<html>
	<head>
		<title>ESIS-OJ</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="static/css/style.css" />
	</head>
	<body>
		<div class="head-group">
			<div class="head">
				<h1>ESIS-OJ</h1>
				<form method="post" action="../controllers/new_connexion.php">
					<label>Matricule:</label>
					<label>Mot de passe:</label><br />
					<input type="text" name="matricule" required/>
					<input type="password" name="pwd" required/>
					<input type="submit" value="Connexion" /><br/>
					<?php 
						if(isset($_GET['error'])) {
							if($_GET['error'] == 3)
								echo '<em style="color:yellow">Matricule ou mot de passe incorrect</em>';
						}
					?>
				</form>
			</div>
		</div>
		<div class="content">
			<div class="left-content">
				<p>
					ESIS-OJ est un journal libre ouvert à tous les étudiants
					de l'ESIS. <br /><br />Poster vos appréciations ou critiques, récommandations ou informations.
				</p>
			</div>
			<div class="right-content">
				<h2>Créer un compte</h2>
				<form method="post" action="../controllers/add_compte.php">
					<?php 
						if(isset($_GET['error'])) {
							if($_GET['error'] == 1)
								echo '<em style="color:red">Les deux mots de passe ne sont pas identiques!</em>';
						}
					?>
					<input type="text" name="matricule" placeholder="Matricule" required/><br />
					<input type="password" name="pwd" placeholder="Mot de passe" required/><br />
					<input type="password" name="pwdconf" placeholder="Confirmer mot de passe" required/><br />
					<input type="submit" value="Créer un compte" />
				</form>
			</div>
		</div>
		
		<?php include_once('foot.php'); ?>
	</body>
</html>