<?php

require_once "DBBlackbox.php";
require_once "Band.php";

//prepare empty data

$band = new Band;

//fill the information

$band->hydrateFromRequest();

//save the data

$id = insert($band);

$band->id = $id;

//redirect

header("Location: data.php");