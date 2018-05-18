<?php require_once('check_connexion.php'); 
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
				<?php include_once('head.php'); 
				$pubDao=new PublicationDao();
				$top10=$pubDao->top10();
				
				if($top10!=null){
							while ($ligne=$top10->fetch()){
								echo "	<p class='post-content'>".
								getPartOfPublication($ligne['contenu'])."...
								<a href='suite.php?idPublication=".$ligne['id']."'>Lire la suite</a>
								<br/>
								<p class='post-like'>
									<em>Posté le ".$ligne['date']."</em> 
									<span class='like-dislike'>
										<a href='../contollers/like.php?pg=top10&idPublication=".$ligne['id']."'>Like</a>(".$ligne['nblike'].") | 
										<a href='../contollers/dislike.php?pg=top10&idPublication=".$ligne['id']."'>Dislike</a>(".$ligne['nbdislike'].")
									</span>
								</p>
							</p>";
						}
				}
				else{
					require_once('NoPublicationToday.php'); 
				}
				?>
			</div>
		</div>
		
		<?php include_once('foot.php'); ?>
		
	</body>
</html>