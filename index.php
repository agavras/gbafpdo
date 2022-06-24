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

    <!-- section Connexion ////////////////////////////////-->
    <section id="sectionConnexion">

        <form action="validation.php" method="post">
            <!-- username -->
            <label for="UserName">UserName :</label>
            <input type="text" name="UserName" id="UserName" value="" maxlength="255" onClick="this.value=''"
                required />
            <br />
            <!-- password -->
            <label for="Password">Password :</label>
            <input type="password" name="Password" id="Password" value="" maxlength="255" onClick="this.value=''"
                required />
            <br />
            <!-- btn connexion -->
            <input type="submit" value="connexion" />
            <br />

            <!-- inscription -->
            <a href="./alternativeConnexion.php">Mot de passe oublié</a>
            <a href="./inscription.php">inscription</a>
        </form>

    </section>

    <!-- footer de la page ////////////////////////////////-->
    <footer>
        <p> | <a href="http://">Mentions légales</a> | <a href="http://">Contact</a> | </p>
    </footer>

</body>

</html>