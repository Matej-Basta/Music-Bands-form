<?php

require_once "DB_functions.php";
require_once "DB.php";
require_once "Band.php";

//connect do database

$success = connect("localhost", "music", "root", "");

var_dump($success);

//prepare empty data

$band = new Band;

//fill the information

$band->hydrateFromRequest();

//save the data

$band->insert();

//redirect

header("Location: data.php");