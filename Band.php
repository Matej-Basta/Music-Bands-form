<?php

class Band
{
    public $name = null;
    public $year = null;
    public $singer = null;
    public $guitar = null;

    public function hydrateFromRequest()
    {
        $this->name = $_POST["name"] ?? $this->name;
        $this->year = $_POST["year"] ?? $this->year;
        $this->singer = $_POST["singer"] ?? $this->singer;
        $this->guitar = $_POST["guitar"] ?? $this->guitar;
    }
}