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
        $this->load_class('User');


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
            $book_id    = $book['material_id'];
            $uploader_id=$book['uploader_id'];

            $query1 = $this->db->query("SELECT full_name, user_name, reg_number from users where user_id = $uploader_id ");
            $users = $query1->fetchAll();

            $user = new User();
            $user->set_full_name($users[0]['full_name']);
            $user->set_user_name($users[0]['user_name']);
            $user->set_reg_number($users[0]['reg_number']);

             $name       =$book['name'];
             $ISBN       =$book['ISBN'];
             $author     =$book['author']; 
             $date       =$book['upload_date'];
             $path       =$book['path'];
             $status     =$book['status'];
             $description=$book['description'];
             $tags       =$book['tags'];
             $privacy    =$book['privacy'];

             $material       = new Material($ISBN,$name,$author,$uploader_id,$date,$path,$status,$description,$tags,$privacy);
             $material->set_id($book_id);
             $pair = array($material,$user);
             $booklist[$i]=$pair;
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


