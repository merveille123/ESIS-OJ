<!doctype html>
<?php 
//session_start();
require_once('check_connexion.php');
require_once('../models/dao/connexiondb.class.php');
require_once('../models/dao/publication.dao.php');

?>
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
			<?php
			   $pubDao=new PublicationDao();
			   $data=$pubDao->getAllPublication();
			   while ($ligne=$data->fetch()){
					echo "	<p class='post-content'>".
					 getPartOfPublication($ligne['contenu'])."...
					<a href='suite.php?idPub=".$ligne['id']."'>Lire la suite</a>
					<br/>
					<p class='post-like'>
						<em>Posté le ".$ligne['date']."</em> 
						<span class='like-dislike'>
							<a href='../contollers/like.php?pg=all&idPub=".$ligne['id']."'>Like</a>(".$ligne['nblike'].") | 
							<a href='../contollers/dislike.php?pg=all&idPub=".$ligne['id']."'>Dislike</a>(".$ligne['nbdislike'].")
						</span>
					</p>
				</p>";
			   }	
			?>
				
			</div>
		</div>
		<div class="foot">
			<p>
				ESIS-OJ &copy 2018
			</p>
		</div>
	</body>
</html>