<?php

require_once 'db.php';

function getLoadTime () {
    $timestart=microtime(true);
    $timeend=microtime(true);
    $time=$timeend-$timestart;
    return $time;
}

$mysqli = getMySQLiConnection();

$data = $mysqli->query("SELECT * FROM `users`");

if($mysqli->connect_error){
    die('Erreur : ' .$mysqli->connect_error);
}

?>

<html>
    <head>
        <title>USER CRUD</title>
    </head>
    <body>
        <h1>Créer un utilisateur</h1>
        <form action="createUser.php" method="post">
            <label for="type">Type</label>
            <input type="text" name="type" id="type">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom">
            <label for="email">Email</label>
            <input type="text" name="email" id="email">
            <input type="submit" value="Créer">
        </form>
        <h1>Supprimer un utilisateur</h1>
        <form action="deleteUser.php" method="post">
            <label for="id">ID</label>
            <input type="text" name="id" id="id">
            <input type="submit" value="Supprimer">
        </form>

        <h1>Liste des utilisateurs</h1>
        <?php
            foreach ($data as $row) {
                echo "<p>
                 ID :  " . $row['id_users'] . "<br>
                 Type : " .  $row['type'] . "<br>
                 Adresse : " . $row['adresse'] . "<br>
                 Nom : " . $row['nom'] . "<br>
                 Email : " .  $row['email'] . "<br>
                 </p>";
            }
        ?>
    </body>
</html>