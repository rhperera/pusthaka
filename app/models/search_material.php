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

   /* function author_search($key)
    {
        $query = $this->db->query("SELECT * FROM materials WHERE author LIKE '%".$key."%' and status=1");
        return $query->fetchAll();
    }

    
    function uploader_search($key)
    {
        $query = $this->db->query("SELECT * FROM materials WHERE uploader_id LIKE '%".$key."%' and status=1");
        return $query->fetchAll();
    }*/

    function full_search($title,$author)
    {
        if($title and $author)
        {
            $query=$this->db->query("SELECT * FROM materials WHERE name LIKE '%".$title."%' and author LIKE '%".$author."%'");
            $result=$query->fetchAll();
            return $result;
        }
       
        elseif(!$title and $author)
        {
            $query=$this->db->query("SELECT * FROM materials WHERE author LIKE '%".$author."%'");
            $result=$query->fetchAll();
            return $result;
        }

        elseif($title and !$author)
        {
            $query=$this->db->query("SELECT * FROM materials WHERE name LIKE '%".$title."%'");
            $result=$query->fetchAll();
            return $result;
        }
        elseif(!$title and !$author)
        {
            
            return false;
        }
    }
    
}