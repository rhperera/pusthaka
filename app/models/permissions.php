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
    	$query = $this->db->query("INSERT INTO view_results values(".$material_id.",".$user_id.")");
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

    function check_request($material_id,$user_id,$uploader_id)
    {
        $query = $this->db->query("SELECT * FROM request 
            where material_id=$material_id and user_id=$user_id and uploader_id=$uploader_id");
        $result = $query->fetchAll();
        return $result;
    }

    function get_all_requests($uploader_id)
    {
        $query = $this->db->query("SELECT * FROM request 
            where uploader_id=$uploader_id");
        $result = $query->fetchAll();
        return $result;
    }

    function delete_request($material_id,$user_id)
    {
        $query = $this->db->query("DELETE FROM request where material_id=$material_id and user_id=$user_id");
        $result = $query->fetchAll();
        return $result;
    }

    function get_request_details($data)
    {
        $booklist = array();
        $i=0;

        foreach ($data as $key) {
            $query1 = $this->db->query("
                SELECT name, author FROM materials WHERE material_id=".$key['material_id']." AND status=1");
            $query2 = $this->db->query("
                SELECT full_name, reg_number FROM users WHERE user_id=".$key['user_id']);
            $result1 = $query1->fetchAll();
            $result2 = $query2->fetchAll();

            $request['name'] = $result1[0]['name'];
            $request['author'] = $result1[0]['author'];
            $request['full_name'] = $result2[0]['full_name'];
            $request['reg_number'] = $result2[0]['reg_number'];
            $booklist[$i] = $request;
            $i++;
        }
        return $booklist;
    }


}