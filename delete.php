<?php
if (isset($_POST['id'])) {


    if (!empty($_POST['id'])) {
        require_once('Connexion.class.php');
        $add = new Connexion();
        $id = $_POST['id'];

        $push = $add->bdd->prepare("DELETE FROM todos WHERE id=:id");
        $push->execute([
            'id' => $id,
        ]);
        echo "1";
    } else {
        echo "0";
    }
} else {
    header("Location: ./todo.php?mess=error");
}
