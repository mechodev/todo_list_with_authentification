<?php

if (isset($_POST['delete'])) {
        require_once('Connexion.class.php');
        $delete = new Connexion();
        $req=$delete->bdd->query("SELECT * FROM todos");
        $remove=$req->fetch();

        $rm=$delete->bdd->prepare("DELETE FROM todos WHERE id=:id");
        $rm->execute([
            'id'=>$remove['id'],
        ]);
        header("Location: ./todo.php?mess=successful_deleted");
}



//<form action="delete.php" method="post"><button type="submit" name="delete">x</button></form>