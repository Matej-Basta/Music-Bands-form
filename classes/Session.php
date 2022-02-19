<?php

class Session
{
    //static
    public static $instance = null;

    public static function instance()
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }


    //normal
    public $data = null;

    public $old_request = [];

    public function __construct()
    {
        session_start();
        $this->data = $_SESSION;

        if (isset($_SESSION["flashed_data"])) {
            $this->data = array_merge($this->data, $_SESSION["flashed_data"]);
            unset($_SESSION["flashed_data"]);
        }

        if (isset($_SESSION["flashed_request"])) {
            $this->old_request = array_merge($this->old_request, $_SESSION["flashed_request"]);
            unset($_SESSION["flashed_request"]);
        }
    }

    public function set($key, $value)
    {
        $this->data[$key] = $value;

        $_Session[$key] = $value;
    }

    public function get($key, $default = null)
    {
        return $this->data[$key] ?? $default;
    }

    public function flash($key, $value)
    {
        if (!isset($_SESSION["flashed_data"])) {
            $_SESSION["flashed_data"] = [];
        }
        $_SESSION["flashed_data"][$key] = $value;
    }

    public function flashRequest()
    {
        $_SESSION["flashed_request"] = $_REQUEST;
    }

    public function old($key, $default = null)
    {
        return $this->old_request[$key] ?? $default;
    }
}