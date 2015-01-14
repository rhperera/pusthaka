<?php

class Comment
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
        //var_dump(db);
    }
	
	function get_comment($comment_id)
    {
        $query = $this->db->query("
        SELECT *
        FROM comments
        where comment_id = '$comment_id'"
		);
        return $query->fetchAll();
    }
	
	function delete_comment($material_id , $user_id)
    {
        $query = $this->db->query("
        Delete 
        FROM comments
        where material_id = '$material_id' and user_id = '$user_id'"
		);
        return $query->fetchAll();
    }
	
	function add_comment($material_id , $user_id , $comment_content)
    {
        $query = $this->db->query("
        Insert 
        INTO comments (material_id , user_id , comment_content )
		VALUES ($material_id , $user_id , $comment_content) 
		"
		);
        return $query->fetchAll();
    }
}

?>