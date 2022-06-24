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
            <p>Nom & Prénom</p>
        </div>
    </header>

    <?php

    // debut de session
    session_start();
    
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
    
    ?>

    <!-- section Connexion ALTERNATIVE ////////////////////////////////-->
    <section id="sectionConnexionAlternative">
        <form action="alternativeConnexion2.php" method="post">
            <!-- username -->
            <label for="UserName">UserName :</label>
            <input type="text" name="UserName" id="UserName" value="" maxlength="255" onClick="this.value=''"
                required />
            <br />
            <!-- btn connexion -->
            <input type="submit" value="Valider" />
            <br />

            <!-- inscription -->
            <a href="./inscription.php">inscription</a>
        </form>

    </section>

    <!-- footer de la page ////////////////////////////////-->
    <footer>
        <p> | <a href="http://">Mentions légales</a> | <a href="http://">Contact</a> | </p>
    </footer>

</body>

</html>