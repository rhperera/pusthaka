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
        $query = $this->db->query("SELECT * FROM materials WHERE name LIKE '%".$key."%' or tags LIKE '%".$key."%'");
        return $query->fetchAll();
    }

    function author_search($key)
    {
        $query = $this->db->query("SELECT * FROM materials WHERE author LIKE '%".$key."%'");
        return $query->fetchAll();
    }

    
    function uploader_search($key)
    {
        $query = $this->db->query("SELECT * FROM materials WHERE uploader_id LIKE '%".$key."%'");
        return $query->fetchAll();
    }
    
}