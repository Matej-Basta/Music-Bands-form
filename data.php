<?php

require_once "DBBlackbox.php";
require_once "Band.php";

$music_bands = select(null, null, "Band");

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
            <br>
            <br>

        <?php endforeach; ?>
    </ul>
    
</body>
</html>

