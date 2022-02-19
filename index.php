<?php

require_once "DB_functions.php";
require_once "DB.php";
require_once "Band.php";
require_once "Session.php";

$success = connect("localhost", "music", "root", "");

$session = Session::instance();
// var_dump($session);

$query = "
    SELECT *
    FROM `bands`
    WHERE 1
";

$music_bands = select($query, [], "Band");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php include 'messages.php'; ?>

    <a href="create.php">Create new entry</a>

    <ul>
        <?php foreach($music_bands as $band) : ?>

            <li><strong><?= $band->name ?></strong>
                <ul>
                    <br>
                    <li><strong>Year of formation:</strong> <?= $band->year ?></li>
                    <li><strong>Singer:</strong> <?= $band->singer ?></li>
                    <li><strong>Lead Guitar:</strong> <?= $band->guitar ?></li>
                </ul>
        
        
            </li>

            <form action="delete.php?id=<?= $band->id ?>" method="POST">
                <button onclick="if (!confirm('Do you really want to delete this?')) return false;">Delete</button>
            </form>

             <a href="edit.php?id=<?= $band->id ?>">
                        Edit
            </a>

            <br>
            <br>

        <?php endforeach; ?>
    </ul>
</body>
</html>

