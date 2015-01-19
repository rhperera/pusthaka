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
        $query = $this->db->query("SELECT * FROM materials WHERE name LIKE '%".$key."%' or tags LIKE '%".$key."%' and status=1");
        return $query->fetchAll();
    }

    function author_search($key)
    {
        $query = $this->db->query("SELECT * FROM materials WHERE author LIKE '%".$key."%' and status=1");
        return $query->fetchAll();
    }

    
    function uploader_search($key)
    {
        $query = $this->db->query("SELECT * FROM materials WHERE uploader_id LIKE '%".$key."%' and status=1");
        return $query->fetchAll();
    }

    function full_search($title,$author,$username)
    {
        if($title==0)
        {
            $title="";
        }
        if($author==0)
        {
            $author="";
        }
        if($username==0)
        {
            $username="";
        }

        $query=$this->db->query("SELECT * FROM materials WHERE name LIKE '%".$title."%' and author LIKE '%".$author."%' and uploader_id LIKE '%".$username."%'");
        $result=$query->fetchAll();
        return $result;
    }
    
}