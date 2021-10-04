<?php

if (isset($_POST['submit'])) {

    if (!empty($_POST['title'])) {
        require_once('Connexion.class.php');
        $add = new Connexion();
        $title = $_POST['title'];

        $push=$add->bdd->prepare("INSERT INTO todos(title) VALUES (:title)");
        $push->execute([
            'title'=>$title,
        ]);
        header("Location: ./todo.php?mess=success");
    }
    else {
        header("Location: ./todo.php?mess=error");
    }
}
