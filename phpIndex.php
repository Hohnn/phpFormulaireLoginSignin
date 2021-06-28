<?php
if (isset($_POST['login']) && isset($_POST['password']) && isset($_COOKIE[$_POST['login']])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $member = json_decode($_COOKIE[$login]);
    if ($login == $member->username && password_verify($password, $member->password)) {
        session_start();
        $_SESSION['login'] = $login;
        $_SESSION['pwd'] = $password;
        header('location: profil.php');
    } else {
        echo '<body onLoad="alert(\'Membre non reconnu...\')">';
    }
    /* foreach($membersList as $member) {
        if ($login == $member->mail && password_verify($password, $member->password)) {
            session_start();
            $_SESSION['login'] = $login;
            $_SESSION['pwd'] = $password;
            $_SESSION['id'] = $member->id;
            $_SESSION['mail'] = $member->mail;
            $_SESSION['lastname'] = $member->nom;
            $_SESSION['firstname'] = $member->prenom;
            $_SESSION['formule'] = $member->formule;
            $_SESSION['image'] = $member->image;
            header('location: gallery.php');
        } else {
            echo '<body onLoad="alert(\'Membre non reconnu...\')">';
        }
    } */
}



?>