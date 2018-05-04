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
		<?php
		$pubDao=new PublicationDao();
		$today=$pubDao->toDay();
		//$echo $today->fetch()[0]['contenu'];
		if($pubDao->toDay()->fetch()){
			echo"<div class='content'>
			<div class='toutes-publications'>";
					while ($ligne=$today->fetch()){
						$date=date($ligne['date']);
						echo "	<p class='post-content'>".
						getPartOfPublication($ligne['contenu'])."...
						<a href='suite.php?idPublication=".$ligne['id']."'>Lire la suite</a>
						<br/>
						<p class='post-like'>
							<span class='like-dislike'>
								<a href='../contollers/like.php?pg=today&idPublication=".$ligne['id']."'>Like</a>(".$ligne['nblike'].") | 
								<a href='../contollers/dislike.php?pg=today&idPublication=".$ligne['id']."'>Dislike</a>(".$ligne['nbdislike'].")
							</span>
						</p>
					";
				}
				echo"</div></div>";
		}
		else{
			require_once('NoPublicationToday.php'); 
		}
		?>
		
		
		
		<?php include_once('foot.php'); ?>
	</body>
</html>