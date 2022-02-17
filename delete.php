<?php

require_once "DBBlackbox.php";
require_once "Band.php";

//prepare existing data

$id = $_GET["id"];

$band = find($id, "Band");

//delete it

delete($band->id);

//redirect

header("Location: data.php");