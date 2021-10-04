<?php
session_start();
require_once('Connexion.class.php');
$login = new Connexion();

if (isset($_POST['login'])) {
    if (!empty($_POST['login_username']) && !empty($_POST['login_password'])) {
        $member = $login->bdd->prepare("SELECT * FROM Members WHERE username=:username");
        $member->execute([
            'username' => $_POST['login_username'],
        ]);
        $donnees = $member->fetch();


        if (is_array($donnees) && count($donnees) > 0) {
            if (password_verify($_POST['login_password'], $donnees['password']) && $_POST['login_username'] == $donnees['username']) {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $_POST['login_username'];
                $_SESSION['guid'] = $donnees['idmember'];
                header('Location: todo.php');
            } else {
                echo "<p style='text-align:center; font-size: 45px;'>Username or password incorrect </p>";
                echo "<p style='text-align:center; font-size: 45px;' ><a href='./index.php'>Go back</a></p>";
            }
        } else {
            echo "<p style='text-align:center; font-size: 45px;'>Username or password incorrect </p>";
            echo "<p style='text-align:center; font-size: 45px;' ><a href='./index.php'>Go back</a></p>";
        }
    } else {
        echo "<p style='text-align:center; font-size: 45px;' >Please put content in empty fields</p>";
        echo "<p style='text-align:center; font-size: 45px;' ><a href='./index.php'>Go back</a></p>";
    }
} else {
    header('Location: index.php');
}


if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: index.php');
}
