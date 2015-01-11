<?php

class Permissions
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    function single_material_permission($user_id,$material_id)
    {
    	$query = $this->db->query("INSERT INTO view_results values(".$user_id.",".$material_id.")");
    	return $query;
    }


}