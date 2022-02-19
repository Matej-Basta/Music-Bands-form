<?php

require_once "./classes/Session.php";

function old($key, $default = null)
{
    return Session::instance()->old($key, $default);
}