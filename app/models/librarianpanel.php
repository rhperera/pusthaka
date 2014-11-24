<?php
    

class LibrarianPanel
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    protected function load_class($name)
    {
        require_once('../app/libraries/'.$name.'.php');
    }

    function get_inactives()
    {
        $query = $this->db->query("
        SELECT COUNT(material_id)
        AS inactive_books
        FROM materials
        WHERE status=0;
        ");

        return $query->fetchAll();
    }

    function get_inactive_list()
    {
        $this->load_class('Material');

        $query = $this->db->query("
        SELECT *
        FROM materials
        WHERE status=0
        ");
        
        $books = $query->fetchAll();
        $booklist = array();
        $i=0;
        foreach($books as $book)
        {
             $name       =$book['name'];
             $ISBN       =$book['ISBN'];
             $author     =$book['author'];
             $uploader_id=$book['uploader_id'];
             $date       =$book['upload_date'];
             $path       =$book['path'];
             $status     =$book['status'];

             $material       = new Material($ISBN,$name,$author,$uploader_id,$date,$path,$status);
             $material->set_id($book['material_id']);
             $booklist[$i]=$material;
             $i++;  
        }
        
        return $booklist;
    }

    function activate_book($id)
    {
        $query = $this->db->query("
        UPDATE materials
        SET status=1
        WHERE material_id=$id;
        ");

        return $query;
    }
}

?>


