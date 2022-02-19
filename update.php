<?php

require_once "./database/DB_functions.php";
require_once "./database/DB.php";
require_once "./classes/Band.php";
require_once "./classes/Session.php";

$success = connect("localhost", "music", "root", "");

//prepare existing data
$id = $_GET["id"];

$band = Band::findOneBand($id);

//validate the incoming data
$valid = true;
$errors = [];

if (empty($_POST['name'])) {
    $errors[] = 'The name cannot be left empty';
    $valid = false;
}

if (!is_numeric($_POST['year'])) {
    $errors[] = 'The year must be a number';
    $valid = false;
}


if (!$valid) {
    //informing the user
    Session::instance()->flash("errors", $errors);

    //showing the wrong data
    Session::instance()->flashRequest();

    //stop proceeding
    header('Location: edit.php?id=' . $id);
    exit();
}


//fill it from request
$band->hydrateFromRequest();

//save the data
$band->update();

//inform the user

Session::instance()->flash('success_message', 'Song successfully updated.');

//redirect
header("Location: index.php");