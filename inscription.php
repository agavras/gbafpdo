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

    <!-- section Inscription ////////////////////////////////-->
    <section id="sectionInscription">

        <form action="registration.php" method="post">
            <!-- username -->
            <label for="UserName">UserName :</label>
            <input type="text" name="UserName" id="UserName" value="" maxlength="255" onClick="this.value=''"
                required />
            <br />
            <!-- password -->
            <label for="Password">Password :</label>
            <input type="text" name="Password" id="Password" value="" maxlength="255" onClick="this.value=''"
                required />
            <br />
            <!-- NOM -->
            <label for="Nom">Nom :</label>
            <input type="text" name="Nom" id="Nom" value="" maxlength="255" onClick="this.value=''" required />
            <br />
            <!-- PRENOM -->
            <label for="Prenom">Prénom :</label>
            <input type="text" name="Prenom" id="Prenom" value="" maxlength="255" onClick="this.value=''" required />
            <br />
            <!-- QUESTION -->
            <label for="Question">Question :</label>
            <!-- <input type="text" name="Question" id="Question" value="" maxlength="255" onClick="this.value=''"
                required /> -->
            <select id="Question" name="Question">
                <option value="">Veuillez sélectionner une question de sécurité</option>
                <option value="0">Dans quelle ville êtes-vous né(e) ?</option>
                <option value="1">Quel est le deuxième prénom de l’aîné(e) de votre fratrie ?</option>
                <option value="2">Quel est le premier concert auquel vous avez assisté ?</option>
                <option value="3">Quels étaient le fabricant et le modèle de votre première voiture ?</option>
                <option value="4">Dans quelle ville vos parents se sont-ils rencontrés ?</option>
            </select>
            <br />
            <!-- REPONSE -->
            <label for="Reponse">Réponse :</label>
            <input type="text" name="Reponse" id="Reponse" value="" maxlength="255" onClick="this.value=''" required />
            <br />


            <!-- btn connexion -->
            <input type="submit" value="valider" />
            <br />

            <!-- connexion -->
            <a href="./index.php">connexion</a>
        </form>

    </section>

    <!-- footer de la page ////////////////////////////////-->
    <footer>
        <p> | <a href="http://">Mentions légales</a> | <a href="http://">Contact</a> | </p>
    </footer>

</body>

</html>