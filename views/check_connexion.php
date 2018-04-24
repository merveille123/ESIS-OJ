<?php
	session_start();
	if(!isset($_SESSION['matricule'])) {
		header('Location: index.php');
	}
?>