<?php 
require_once('check_connexion.php');
require_once('../models/dao/connexiondb.class.php');
require_once('../models/dao/publication.dao.php');?>
<!doctype html>
<html>
	<head>
		<title>ESIS-OJ</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="static/css/style.css" />
		<link rel="stylesheet" href="static/css/today.css" />
	</head>
	<body>
		<?php include_once('head.php'); ?>
		<div class="content">
			<?php
			$publication_dao = new PublicationDAO();
			$res = $publication_dao->getTodayPublication();
			if (count($res) != 0){
				echo'
				<div class="toutes-publications">
					<h2>Top 10</h2>';
				foreach($res as $publication){
					echo
					'<p class="post-content">'
						.$publication['contenu'].
						'<br/>
						<a href="suite.php?id='.$publication['id'].'">Lire la suite</a>
					</p>
					<br/>
					<p class="post-like">
						<em>Posté le '.$publication['date'].'</em> 
						<span class="like-dislike">
							<a href="../contollers/like.php?id='.$publication['id'].'">Like</a>('.$publication['nblike'].') | 
							<a href="../contollers/dislike.php?id='.$publication['id'].'">Dislike</a>('.$publication['nbdislike'].');
						</span>
					</p>
					';
				}
				echo'
				</div>
				';
			}
			else {
				echo'	
				<div class="aucune-publication">
					<h2>Aucune publication du jour</h2>
					<br/><a href="new.php">Publier</a>
				</div>
				';	
			}
			?>
		</div>
		<?php include_once('foot.php'); ?>
	</body>
</html>