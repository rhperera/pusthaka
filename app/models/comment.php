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
}

?>