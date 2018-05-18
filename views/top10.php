<?php 
require_once('check_connexion.php');
require_once('../models/dao/connexiondb.class.php');
require_once('../models/dao/publication.dao.php');
?>
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
			<div class="toutes-publications">
				<h2>Top Ten of All</h2>
				<?php
				$publication_dao = new PublicationDAO();
				$res = $publication_dao->top10();
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
				?>
			</div>
		</div>
		<?php include_once('foot.php'); ?>
	</body>
</html>