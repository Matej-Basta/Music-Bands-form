<?php

require_once "DB_functions.php";
require_once "DB.php";
require_once "Band.php";

$success = connect("localhost", "music", "root", "");

//prepare existing data
$id = $_GET["id"];

$band = Band::findOneBand($id);


//fill it from request
$band->hydrateFromRequest();

//save the data
$band->update();

//redirect
header("Location: data.php");