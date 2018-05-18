<?php 
require_once('check_connexion.php');
require_once('../models/dao/connexiondb.class.php');
require_once('../models/dao/publication.dao.php');
require_once('../models/structure/publication.class.php');
require_once('../models/dao/commentaire.dao.php');
require_once('../models/structure/commentaire.class.php');
?>
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
				<?php
				if(isset($_GET['id'])){
					$publication = new Publication($_GET['id'],null,null,null,null,null);
					$publication_dao = new PublicationDAO();
					$publication = $publication_dao->getPublication($publication);
					echo'
					<p class="post-like">
						<strong><em>Posté le '.$publication->getDate().'</em></strong> 
						<span class="like-dislike">
							<a href="../contollers/like.php?id='.$publication->getId().'">Like</a>('.$publication->getNblike().') | 
							<a href="../contollers/dislike.php?id='.$publication->getId().'">Dislike</a>('.$publication->getNbdislike().')
						</span>
					</p>
					<p class="post-content">'
					.$publication->getContenu().
					'</p>
					';
					$commentaire_dao = new CommentaireDAO();
					$res = $commentaire_dao->getAllCommentaires($publication);
					echo'
					<h3>'.count($res).' Commentaires</h3>';
					foreach($res as $commentaire){
						echo'
						<p class="post-content-comment">
							'.$commentaire['contenu'].'
						</p>
						<br/>
						<p class="post-like-comment">
							<em>Posté le '.$commentaire['date'].'</em> 
							<span class="like-dislike-comment">
								<a href="../contollers/like.php?id='.$commentaire['id'].'">Like</a>('.$commentaire['nblike'].') | 
								<a href="../contollers/dislike.php?id='.$commentaire['id'].'">Dislike</a>('.$commentaire['nbdislike'].')
							</span>
						</p>';
					}
					echo'
					<form method="post" action="../contollers/add_commentaire.php" class="add-comment">
						<input type="hidden" name="id_publication" value="'.$_GET['id'].'"/>
						<textarea name="contenu" placeholder="Votre commentaire ici" required></textarea><br />
						<input type="submit" value="Ajouter" />
					</form>
					';
				}
				else
					header('Location: all.php');
				?>
			</div>
		</div>
		
		<?php include_once('foot.php'); ?>
	</body>
</html>