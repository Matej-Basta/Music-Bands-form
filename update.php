<?php

require_once "DBBlackbox.php";
require_once "Band.php";

//prepare existing data
$id = $_GET["id"];

$band = find($id, "Band");

//fill it from request
$band->hydrateFromRequest();

//save the data
update($band->id, $band);

//redirect
header("Location: data.php");