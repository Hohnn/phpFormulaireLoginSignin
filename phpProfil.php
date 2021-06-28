<?php

session_start();

if (!isset($_SESSION['login'])) {
    header('location: index.php');
    return false;
}

if (isset($_POST['deconnexion'])) {
    session_unset();
    session_destroy();
    header('location: index.php');
}


function listInfo(){
    $member = json_decode($_COOKIE[$_SESSION['login']]);
    foreach($member as $key => $info){ 
        if($key != 'password'){ ?>
    
        <div class="desc py-2"><?= $info ?></div>
<?php
        }
    }
}
