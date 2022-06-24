<?php
session_start();
if(!isset($_SESSION["username"])) {
    header("location:index.php");
}
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

    <!-- section ajout de commentaire /////////////////////-->
    <section id="sectionAjoutDeCommentaire">

        <form action="acteur1.php" method="post">
            <!-- message -->
            <label for="Message">Message :</label>
            <input type="text" name="Message" id="Message" value="" maxlength="255" required />
            <br />

            <!-- btn envoyer -->
            <input type="submit" value="envoyer" />
            <br />

            <!-- connexion -->
            <a href="./acteur1.php">retour</a>
        </form>

    </section>

    <!-- footer de la page ////////////////////////////////-->
    <footer>
        <p> | <a href="http://">Mentions légales</a> | <a href="http://">Contact</a> | </p>
    </footer>

</body>

</html>