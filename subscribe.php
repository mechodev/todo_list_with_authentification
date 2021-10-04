<?php
require_once('Connexion.class.php');
$connexion = new Connexion();
$member = $connexion->bdd->query("SELECT * FROM Members");
$donnees = $member->fetch();

if (isset($_POST['create'])) {
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_verify'])) {
        if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['password_verify'])) {
            if ($_POST['password'] == $_POST['password_verify']) {
                $statement = $connexion->bdd->prepare("INSERT INTO Members (username, password) VALUES (:username, :password)");
                $statement->execute(array(
                    'username' => $_POST['username'],
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
                ));
                echo "<p style='text-align:center; font-size: 45px;'>Your account has been succesfull created</p>";
                echo "<p style='text-align:center; font-size: 45px;'>Click <a href='./index.php'>here</a> to log into your account with your identifiers</p> ";
            } else {
                echo "<p style='text-align:center; font-size: 45px;'>sorry! Passwords do not match </p>";
                echo "<p style='text-align:center; font-size: 45px;'><a href='./tp_session.php'>Go back</a></p>";
            }
        } else {
            echo "<p style='text-align:center; font-size: 45px;' >Please put content in empty fields</p>";
            echo "<p style='text-align:center; font-size: 45px;'><a href='./inscription.php'>Go back</a></p>";
        }
    }
}
