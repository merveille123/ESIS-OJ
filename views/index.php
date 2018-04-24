<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="static/css/style.css" >
    <title>ESIS-OJ</title>
</head>
<body>
    <nav>
        <h1>ESIS-OJ</h1>
        <form id="formulaire" action="">
            <label for="">Matricule</label>
            <label id="pwd" for="">Mot de passe</label><br>
            <input type="text">
            <input type="password">
            <input type="button" value="connexion" >
        </form>
    </nav>
    <div id="corps">
        <div id="comment" >
            <h4> ESIS-OJ est un un journal libre  <br>ouvert à tous les etudiants de l'ESIS<br>  poster 100 informations,recommadation<br>  ou des informations 
             </h4>
    </div>
        <form id="formulaire" action="">
                <h3> creer un compte</h3>
                <input type="text" name="matricule" placeholder="matricule" ><br>
                <br> <input type="password" name="motdepasse" placeholder="mot de passe" ><br>
                <br><input type="password" name="motdepasse" placeholder=" cofirmer mot de passe" ><br>
                <br><input type="button" value="creer un compte" id="connect" >
        </form>
    </div>
    <footer> 
        <h3>ESIS-OJ &copy 2018</h3>
    </footer>
</body>
</html>