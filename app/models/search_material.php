<?php

class Search_material
{
     protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    function simple_search($key)
    {
        $query = $this->db->query("SELECT * FROM materials WHERE name LIKE '%".$key."%'");
        return $query->fetchAll();
    }
    
}