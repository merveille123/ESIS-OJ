<?php require_once('check_connexion.php'); 
	 require_once('../models/structure/publication.class.php');
	 require_once('../models/dao/connexiondb.class.php');
	 require_once('../models/dao/publication.dao.php');
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
		<?php include_once('head.php'); 
		 if(isset($_GET['idPublication'])){
			$id=$_GET['idPublication'];
			$pubDao=new PublicationDao();
			$comDao=new CommentaireDao();
			$commentaire=$comDao->getAllCommentaires($id);
			$publication=$pubDao->getPublication($id);
			$compte=$comDao->compteCommentaire($id);
		 }
		?>
		<div class="content">
			<div class="toutes-publications">
				<p class="post-like">
				<?php
				 echo"
					<strong><em>Posté le ".$publication->getDate()."</em></strong> 
					<span class='like-dislike'>
					<a href='../contollers/like.php?pg=suite&idPublication=".$id."'>Like</a>(".$publication->getNbLike().") | 
					<a href='../contollers/dislike.php?pg=suite&idPublication=".$id."'>Dislike</a>(".$publication->getNbDislike().")
					</span>
				</p>
				<p class='post-content'>".$publication->getContenu()."
					
				</p>";
				
				echo" <h3>".$compte." Commentaires</h3>";
				
				    while($ligne=$commentaire->fetch()){
						echo "<p class='post-content-comment'>".$ligne['contenu']."</p><br/>
							<p class='post-like-comment'>
							<em>Posté." .$ligne['date']."</em> 
							<span class='like-dislike-comment'>
								<a href='../contollers/like.php?num=".$id."&id=".$ligne['id']."'>Like</a>(".$ligne['nblike'].") | 
								<a href='../contollers/dislike.php?num=".$id."&id=".$ligne['id']."'>Dislike</a>(".$ligne['nbdislike'].")
							</span>
						</p>
						
						";
					}
				?>
            
				<div id="commentaire">
				<form method="post" action="../contollers/add_commentaire.php" class="add-comment">
					<textarea name="contenu" placeholder="Votre commentaire ici" required></textarea><br />
					<?php echo '<input type="hidden" name="idPublication" value="'.$id.'" />';?>
					<input type="submit" value="Ajouter" />
				</form>
				</div>
			</div>
		</div>
		<footer>
		<?php include_once('foot.php'); ?>
		</footer>
		
	</body>
</html>