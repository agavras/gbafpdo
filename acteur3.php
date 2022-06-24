<?php
session_start();
if(!isset($_SESSION["username"])) {
    header("location:index.php");
}

// Connexion au serveur
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=gbafpdo;charset=utf8', 'root', '2421lw21PHP'); // attention un mot de passe a été défini pour l'accès à la base de données
}
// Gestion des erreurs
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$sth = $bdd->prepare("SELECT description FROM acteur where id_acteur=3");
$sth->execute();
$desc3 = $sth->fetch();
// print_r($desc1[0]);
    $sth = $bdd->prepare("SELECT logo FROM acteur where id_acteur=3");
    $sth->execute();
    $img3 = $sth->fetch();
    // print_r($img1[0]);
    
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>EcfGBAF</title>
</head>

<body>

    <!-- header de la page ////////////////////////////////-->
    <header>
        <div id="cadreLogoGBAF">
            <a href="./accueil.php">
                <img src="./assets/img/gbaf.webp" alt="logo gbaf">
            </a>
        </div>
        <div id="cadreIdUtilisateur">
            <a href="./parametresDuCompte.php">
                <img src="./assets/img/user.webp" alt="icon utilisateur">
            </a>
            <p><?php echo $_SESSION["username"]; ?></p>
            <a href="./logout.php">
                <button>x</button>
            </a>
        </div>
    </header>

    <!-- section présentation ACTEUR //////////////////////-->
    <section id="presentationActeur">
        <?php echo '<img src="./assets/img/'.$img3[0].'" alt="logo partenaire">' ?>
        <h3><?php echo $desc3[0] ?></h3>
    </section>

    <!-- section acteurs //////////////////////////////////-->
    <section id="commentairesActeur">
        <div id="div1Commentaires">
            <h2>x commentaires</h2>
            <button id="btnNouveauCommentaire">Nouveau commentaires</button>
            <h2>x likes</h2>
            <button id="btnLike">L</button>
            <button id="btnDislike">D</button>
        </div>
        <div id="commentairesPHP">
            <p>Prénom</p>
            <p>Date</p>
            <p>Texte Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi voluptates neque rem
                exercitationem vitae suscipit reiciendis aliquid, laudantium culpa repellat libero ea natus consequatur
                sit dolores modi repudiandae quasi delectus!</p>
        </div>

    </section>

    <!-- footer de la page ////////////////////////////////-->
    <footer>
        <p> | <a href="http://">Mentions légales</a> | <a href="http://">Contact</a> | </p>
    </footer>

</body>

</html>