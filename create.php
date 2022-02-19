<?php

require_once "./DB/DB_functions.php";
require_once "./DB/DB.php";
require_once "./classes/Band.php";

//preparing empty data

$band = new Band;

//display form

include_once "form.php";