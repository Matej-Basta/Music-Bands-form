<?php

require_once "DB_functions.php";
require_once "DB.php";
require_once "Band.php";

$success = connect("localhost", "music", "root", "");

//prepare existing data

$id = $_GET["id"];

$query = "
    SELECT *
    FROM `bands`
    WHERE `id` = ?
";

$band = select_one($query, ["{$id}"], "Band");

//delete it

$band->delete();

//redirect

header("Location: data.php");