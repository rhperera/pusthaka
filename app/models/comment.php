<?php

class Comment
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
        //var_dump(db);
    }
}

?>