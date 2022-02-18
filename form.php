<?php

require_once "helpers.php";

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

    <form action="<?= empty($_GET['id']) ? 'store.php' : ('update.php?id=' . $_GET['id']) ?>" method="post">
        <input type="text" name="name" placeholder="Name" value="<?= old('name', $band->name) ?>">
        <input type="number" name="year" placeholder="Year" value="<?= old('year', $band->year) ?>">
        <input type="text" name="singer" placeholder="Singer" value="<?= old('singer', $band->singer) ?>">
        <input type="text" name="guitar" placeholder="Guitar" value="<?= old('guitar', $band->guitar) ?>">
        <button>Save</button>
    </form>
</body>
</html>