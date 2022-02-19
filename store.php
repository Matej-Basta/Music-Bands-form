<?php

require_once "DB_functions.php";
require_once "DB.php";
require_once "./classes/Band.php";
require_once "./classes/Session.php";

//connect do database

$success = connect("localhost", "music", "root", "");

var_dump($success);

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
    header('Location: create.php');
    exit();
}

//prepare empty data

$band = new Band;

//fill the information

$band->hydrateFromRequest();

//save the data

$band->insert();

//inform the user

Session::instance()->flash('success_message', 'Band successfully inserted.');

//redirect

header("Location: index.php");