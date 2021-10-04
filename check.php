<?php
if (isset($_POST['id'])) {


    if (!empty($_POST['id'])) {
        require_once('Connexion.class.php');
        $add = new Connexion();
        $id = $_POST['id'];

        $push = $add->bdd->prepare("SELECT id, checked FROM todos WHERE id=:id");
        $push->execute([
            'id' => $id,
        ]);

        $todo = $push->fetch();
        $uId=$todo['id'];
        $checked=$todo['checked'];

        $uChecked= $checked ? 0: 1;

        $res=$add->bdd->query("UPDATE todos SET checked=$uChecked WHERE id=$uId");


        echo $checked;
    } else {
        echo "ERROR";
    }
} else {
    header("Location: ./todo.php?mess=error");
}
