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

$sth = $bdd->prepare("SELECT description FROM acteur where id_acteur=1");
$sth->execute();
$desc1 = $sth->fetch();
// print_r($desc1[0]);
    $sth = $bdd->prepare("SELECT logo FROM acteur where id_acteur=1");
    $sth->execute();
    $img1 = $sth->fetch();
    // print_r($img1[0]);
$sth = $bdd->prepare("SELECT description FROM acteur where id_acteur=2");
$sth->execute();
$desc2 = $sth->fetch();
// print_r($desc2[0]);
    $sth = $bdd->prepare("SELECT logo FROM acteur where id_acteur=2");
    $sth->execute();
    $img2 = $sth->fetch();
    // print_r($img1[0]);   
$sth = $bdd->prepare("SELECT description FROM acteur where id_acteur=3");
$sth->execute();
$desc3 = $sth->fetch();
// print_r($desc3[0]);
    $sth = $bdd->prepare("SELECT logo FROM acteur where id_acteur=3");
    $sth->execute();
    $img3 = $sth->fetch();
    // print_r($img1[0]);   
$sth = $bdd->prepare("SELECT description FROM acteur where id_acteur=4");
$sth->execute();
$desc4 = $sth->fetch();
// print_r($desc4[0]);
    $sth = $bdd->prepare("SELECT logo FROM acteur where id_acteur=4");
    $sth->execute();
    $img4 = $sth->fetch();
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

    <!-- section présentation /////////////////////////////-->
    <section id="sectionPresentation">
        <h1>texte présentation du GBAF et du site</h1>
    </section>

    <!-- section acteurs //////////////////////////////////-->
    <section id="sectionActeurs">
        <h2>texte acteurs et partenaires</h2>
        <div class="conteneurActeurs">
            <!-- acteur1 -->
            <div class="contenuActeur">
                <?php echo '<img src="./assets/img/'.$img1[0].'" alt="logo partenaire">' ?>
                <div>
                    <h3><?php echo $desc1[0] ?></h3>
                </div>
                <a href="./acteur1.php">
                    <button>lire la suite</button>
                </a>
            </div>
            <!-- acteur2 -->
            <div class="contenuActeur">
                <?php echo '<img src="./assets/img/'.$img2[0].'" alt="logo partenaire">' ?>
                <div>
                    <h3><?php echo $desc2[0] ?></h3>
                </div>
                <a href="./acteur2.php">
                    <button>lire la suite</button>
                </a>
            </div>
            <!-- acteur3 -->
            <div class="contenuActeur">
                <?php echo '<img src="./assets/img/'.$img3[0].'" alt="logo partenaire">' ?>
                <div>
                    <h3><?php echo $desc3[0] ?></h3>
                </div>
                <a href="./acteur3.php">
                    <button>lire la suite</button>
                </a>
            </div>
            <!-- acteur4 -->
            <div class="contenuActeur">
                <?php echo '<img src="./assets/img/'.$img4[0].'" alt="logo partenaire">' ?>
                <div>
                    <h3><?php echo $desc4[0] ?></h3>
                </div>
                <a href="./acteur4.php">
                    <button>lire la suite</button>
                </a>
            </div>
        </div>
    </section>

    <!-- footer de la page ////////////////////////////////-->
    <footer>
        <p> | <a href="http://">Mentions légales</a> | <a href="http://">Contact</a> | </p>
    </footer>

</body>

</html>