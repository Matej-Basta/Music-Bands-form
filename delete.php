<?php

require_once "./database/DB_functions.php";
require_once "./database/DB.php";
require_once "./classes/Band.php";

$success = connect("localhost", "music", "root", "");

//prepare existing data

$id = $_GET["id"];

$band = Band::findOneBand($id);

//delete it

$band->delete();

//redirect

header("Location: index.php");