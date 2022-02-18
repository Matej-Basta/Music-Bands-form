<?php

require_once "DB_functions.php";
require_once "DB.php";

class Band
{
    public static function findOneBand($key)
    {
        $success = connect("localhost", "music", "root", "");

        $query = "
            SELECT *
            FROM `bands`
            WHERE `bands`.`id` = ?
        ";

        return select_one($query, ["{$key}"], "Band");
    }
    
    public $id = null;
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

    public function insert()
    {
        $query = "
            INSERT
            INTO `bands`
            (`name`, `year`, `singer`, `guitar`)
            VALUES
            (?, ?, ?, ?)
        ";

        insert($query, ["{$this->name}", "{$this->year}", "{$this->singer}", "{$this->guitar}"]);

        $query2 = "
            SELECT `id`
            FROM `bands`
            WHERE `name`= ?
            ORDER BY `id` DESC
            LIMIT 1
        ";

        $id = select($query2, ["{$this->name}"]);

        $this->id = $id[0]->id;
    }

    public function update()
    {
        $query = "
            UPDATE `bands`
            SET `name` = ?,
            `year` = ?,
            `singer` = ?,
            `guitar`= ?
            WHERE `id` = ?
        ";

        update($query, ["{$this->name}", "{$this->year}", "{$this->singer}", "{$this->guitar}", "{$this->id}"]);
    }

    public function delete()
    {
        $query = "
            DELETE
            FROM `bands`
            WHERE `id` = ?
        ";

        delete($query, ["{$this->id}"]);
    }
}