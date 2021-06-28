<?php
function isValid($pattern ,$subject){   //vérifie la regex puis renvoi vrai ou faux
    if (preg_match($pattern, $subject)) {
        return true;
    } else {
        return false;
    }
}

function isSame($value1, $value2){ //compart si les mdp sont identique
    if ($value1 == $value2) {
        return true;
    }
}

function mailExist($element, $array){ //compart le mail avec les mails existant et renvoi vrai si elle n'est pas trouvé
    if (in_array($element, $array)) {
        return false;
    } else { 
        return true;
    }
}
$gender = htmlspecialchars($_POST['gender'] ?? '');
$name = htmlspecialchars($_POST['name'] ?? 'Vide');
$firstname = htmlspecialchars($_POST['firstname'] ?? 'Vide') ;
$email = htmlspecialchars($_POST['email'] ?? 'Vide') ;
$password = htmlspecialchars($_POST['password'] ?? 'Vide') ;
$confirm = htmlspecialchars($_POST['confirm'] ?? 'Vide') ;
$formule = htmlspecialchars($_POST['formule'] ?? '');
$insta = htmlspecialchars($_POST['url-insta'] ?? 'Vide') ;
$username = htmlspecialchars($_POST['username'] ?? '');
$regexUsername = "/^[a-zA-Z0-9]([._-](?![._-])|[a-zA-Z0-9]){3,18}[a-zA-Z0-9]$/";
$regexName = "/^[a-z ,.'-]+$/i";
$regexMail = "/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/";
$regexPassword = "/^(?=.*?[A-Z])(?=.*?[a-z]).{5,}$/";
$regexInsta = "/(?:(?:http|https):\/\/)?(?:www\.)?(?:instagram\.com|instagr\.am)\/([A-Za-z0-9-_\.]+)/im";
$mailArray = ['julien@gmail.com', 'paul@gmail.com', 'habib@hotmail.fr'];

if (isset($_POST['submit'])) { //si submit est dans le post
    $count = 0;
    if (!isset($_POST['gender'])){
        $count++;
        $errorGender = 'Selectionner un gener';
        $classGender = 'is-invalid';
    }
    if (!isValid($regexName, $name)) { // si la regex n'est pas valide
        $errorName = 'Nom incorrect, exemple : Macron'; // mettre un message
        $count++; // incrémente un conter d'erreur
        $className = 'is-invalid';
    }
    if (!isValid($regexName, $firstname)) {
        $errorFirstname = 'Prénom incorrect, exemple : Emmanuel';
        $count++;
        $classFirstname = 'is-invalid';
    }
    if (!isValid($regexUsername, $username)) {
        $errorUsername = 'Identifiant incorrect, exemple : Jeje56';
        $count++;
        $classUsername = 'is-invalid';
    }
    if (!isSame($password, $confirm)) {
        $errorPassword =  'Le mot de passe ne correspond pas';
        $count++;
        $classPassword = 'is-invalid';
    }
    if (!isValid($regexPassword, $password)) {
        $errorMdp = 'Mot de passe incorrect, exemple : 25KhjG';
        $count++;
        $classMdp = 'is-invalid';
    }
    if (!isValid($regexMail, $email)) {
        $errorMail = 'Mail incorrect, exemple : john@gmail.com';
        $count++;
        $classMail = 'is-invalid';
    } elseif (!mailExist($email, $mailArray)) {
        $errorMail = 'Ce mail est déja inscrit';
        $count++;
        $classMail = 'is-invalid';
    } elseif (isset($_COOKIE[$email])) {
        $errorMail = 'Ce mail est déja connecté';
        $count++;
        $classMail = 'is-invalid';
    }
    if (!isset($_POST['formule'])){
        $errorFormule = 'Selectionner une formule';
        $count++;
        $classFormule = 'is-invalid';
    }
    if (!isValid($regexInsta, $insta)) {
        $errorInsta = 'Url incorrect';
        $count++;
        $classInsta = 'is-invalid';
    }
    if (!isset($_POST['cgu'])){
        $errorCgu = 'Obligatoire';
        $count++;
        $classCgu = 'is-invalid';
    }
    if ($count == 0) { // le conteur est à 0
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $user = ['gender' => $gender, 'name' => $name, 'firstname' => $firstname,'username' => $username, 'email' => $email, 'password' => $passwordHash, 'formule' => $formule, 'insta' => $insta];
        $userEncode = json_encode($user);
        setcookie($username, $userEncode );
        header('Location: welcome.php'); // change de page avec le bonne url pour récupéré en GET
        exit(); // stop le script
    }
}
?>