<?php include "phpSignin.php" ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Logo Photo</title>
</head>

<body class="accueil signin">

    <h1 class="mb-5">FORMULAIRE</h1>
    <div class="myForm mydark">
        <form action="signin.php" method="post">
            <div class="mb-3">
                <label for="gender" class="form-label">Genre</label>
                <select id="gender" class="form-select <?= $classGender ?? '' ?>" name="gender" value="<?= $_POST['gender'] ?? ''; ?>">
                    <option selected disabled hidden>Vous êtes...</option>
                    <option>Homme</option>
                    <option>Femme</option>
                    <option>Non spécifié</option>
                </select>
                <div class="form-text"><?= $errorGender ?? '' ?></div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input placeholder="Nom" type="text" class="form-control <?= isset($className) ? $className : '' ?>" id="name" name="name"  value="<?= (isset($_POST['name'])) ? htmlspecialchars($_POST['name']) : ''; ?>"> <!-- si il ya le name dans POSt affiche le sinon met rien -->
                <div class="form-text"><?= $errorName ?? '' ?></div> <!-- affiche le message d'erreur -->
            </div>
            <div class="mb-3">
                <label for="firstname" class="form-label">Prénom</label>
                <input placeholder="Prénom" type="text" class="form-control <?= isset($classFirstname) ? $classFirstname : '' ?>" id="firstname" name="firstname"  value="<?= (isset($_POST['firstname'])) ? htmlspecialchars($_POST['firstname']) : ''; ?>">
                <div class="form-text"><?= $errorFirstname ?? '' ?></div>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Prénom</label>
                <input placeholder="Identifiant" type="text" class="form-control <?= isset($classUsername) ? $classUsername : '' ?>" id="username" name="username"  value="<?= (isset($_POST['username'])) ? htmlspecialchars($_POST['username']) : ''; ?>">
                <div class="form-text"><?= $errorUsername ?? '' ?></div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Adresse mail</label>
                <input placeholder="Email" type="email" class="form-control <?= isset($classMail) ? $classMail : '' ?>" id="email" name="email" aria-describedby="emailHelp"  value="<?= (isset($_POST['email'])) ? htmlspecialchars($_POST['email']) : ''; ?>">
                <div class="form-text"><?= $errorMail ?? '' ?></div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input placeholder="Mot de passe" type="password" class="form-control <?= isset($classMdp) ? $classMdp : '' ?>" id="password" name="password" >
                <div class="form-text"><?= $errorMdp ?? '' ?></div>
            </div>
            <div class="mb-3">
                <label for="confirm" class="form-label">Confirmation du mot de passe</label>
                <input placeholder="Confirmation" type="password" class="form-control <?= isset($classPassword) ? $classPassword : '' ?>" id="password2" name="confirm" >
                <div class="form-text"><?= $errorPassword ?? '' ?></div>
            </div>
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input <?= isset($classFormule) ? $classFormule : '' ?>" type="radio" name="formule" value="mouette" id="mouette" >
                    <label class="form-check-label" for="mouette">
                        Mouette ( 0€ )
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input <?= isset($classFormule) ? $classFormule : '' ?>" type="radio" name="formule" value="goeland" id="goeland">
                    <label class="form-check-label" for="goeland">
                        Goeland ( 0,99€ )
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input <?= isset($classFormule) ? $classFormule : '' ?>" type="radio" name="formule" value="albatros" id="albatros">
                    <label class="form-check-label" for="albatros">
                        Albatros ( 5€ )
                    </label>
                </div>
                <div class="form-text"><?= $errorFormule ?? '' ?></div>

            </div>
            <div class="mb-3">
                <label for="url-insta" class="form-label">URL Instagram</label>
                <input placeholder="URL Instagram" type="url" class="form-control <?= isset($classInsta) ? $classInsta : '' ?>" id="url-insta" name="url-insta" value="<?= (isset($_POST['url-insta'])) ? htmlspecialchars($_POST['url-insta']) : ''; ?>">
                <div class="form-text"><?= $errorInsta ?? '' ?></div>
            </div>
            <div class="mb-3" >
                <div class="form-check">
                    <input class="form-check-input <?= isset($classCgu) ? $classCgu : '' ?>" type="checkbox" name="cgu" value="check" id="cgu" >
                    <label class="form-check-label" for="cgu">
                        Accepter les conditions générale d'utilisation
                    </label>
                <div class="form-text"><?= $errorCgu ?? '' ?></div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" id="btn" name="submit">S'INSCRIRE</button>
        </form>
    </div>
</body>

</html>