<?php

class Connexion
{
    public $bdd = null;

    public function __construct()
    {
        try {
            $this->bdd = new PDO('mysql:server=localhost;dbname=to_do_list', 'root', '');
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "ERROR: " . $exception->getMessage();
        }

    }


}

return new Connexion();
