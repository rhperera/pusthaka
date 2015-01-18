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

    function check_permission($material_id,$user_id)
    {
        $query = $this->db->query("SELECT * FROM view_results where material_id=$material_id and user_id=$user_id");
        $result = $query->fetchAll();
        return $result;
    }

    function request_permission($material_id,$user_id,$uploader_id){
        $query = $this->db->query("INSERT INTO request values('',$material_id,$user_id,$uploader_id)");
        $result = $query->fetchAll();
        return $result;
    }


}