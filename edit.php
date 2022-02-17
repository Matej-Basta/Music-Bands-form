<?php

require_once "Band.php";
require_once "DBBlackbox.php";

//prepare existing data

var_dump($_GET);

$id = $_GET["id"];

$band = find($id, "Band");


//display form
include "form.php";