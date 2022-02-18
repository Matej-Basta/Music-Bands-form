<?php

require_once "Band.php";
require_once "DB_functions.php";
require_once "DB.php";
require_once "Session.php";

$success = connect("localhost", "music", "root", "");

//prepare existing data

$session = Session::instance();
// var_dump($session);

$id = $_GET["id"];

$band = Band::findOneBand($id);

//display form
include "form.php";