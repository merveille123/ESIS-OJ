<!doctype html>
<html>
	<head>
		<title>ESIS-OJ</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="static/css/style.css" />
		<link rel="stylesheet" href="static/css/today.css" />
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
				<h2>Toutes les publications</h2>
				<p class="post-content">
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas
					porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, 
					purus lectus malesuada libero...
					<a href="suite.php">Lire la suite</a>
				</p>
				<br/>
				<p class="post-like">
					<em>Posté le 02/10/2018</em> 
					<span class="like-dislike">
						<a href="like.php">Like</a>(25) | 
						<a href="dislike.php">Dislike</a>(1)
					</span>
				</p>
				<p>
					<?php 
						    require_once('../controllers/new_connexion.php');
							$req="SELECT * FROM publication WHERE publication.idEtudaint=etudiant.id";
							$data=dbquery($req);
						
							while($d= $data->fetch())
							{
								echo '
								 <p class="idee">
								 <strong>['.$d['nom'].'] </strong> : '.$d['contenu'].'<br>
								 <em class="dp" >Postee le '.$d['date'].'</em>
								</p>';
							}
					
					   		echo '<a href="suite.php">Lire la suite</a>';
					?>
				</p>
				<br/>
				<p class="post-like">
					<em>Posté le 02/10/2018</em> 
					<span class="like-dislike">
						<a href="like.php">Like</a>(25) | 
						<a href="dislike.php">Dislike</a>(1)
					</span>
				</p>
				<p>
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas
					porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, 
					purus lectus malesuada libero...
					<a href="suite.php">Lire la suite</a>
				</p>
				<br/>
				<p class="post-like">
					<em>Posté le 02/10/2018</em> 
					<span class="like-dislike">
						<a href="like.php">Like</a>(25) | 
						<a href="dislike.php">Dislike</a>(1)
					</span>
				</p>
			</div>
		</div>
		<div class="foot">
			<p>
				ESIS-OJ &copy 2018
			</p>
		</div>
	</body>
</html>