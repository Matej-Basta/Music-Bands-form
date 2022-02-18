<?php

require_once "Band.php";
require_once "DB_functions.php";
require_once "DB.php";

$success = connect("localhost", "music", "root", "");

//prepare existing data

var_dump($_GET);

$id = $_GET["id"];

$query = "
    SELECT *
    FROM `bands`
    WHERE `bands`.`id` = ?
";

$band = select_one($query, ["{$id}"], "Band");

//display form
include "form.php";