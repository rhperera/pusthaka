<?php
/**
 * Created by PhpStorm.
 * User: Raveen
 * Date: 8/22/14
 * Time: 1:52 PM
 */
class Collection
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    function add_new($name,$user_id)
    {
    	$query = $this->db->query("INSERT INTO collections VALUES('','".$name."','".$user_id."')");
    	return $query;
    }

    function delete($collection_id)
    {
    	$query = $this->db->query("DELETE FROM collections WHERE collection_id='".$collection_id."'");
    	return $query;
    }

    function add_book($collection_id,$material_id)
    {
    	$query = $this->db->query("INSERT INTO material_collection VALUES('".$collection_id."','".$material_id."')");
    	return $query;
    }

    function get_materials_from_collection($collection_id)
    {
    	$query = $this->db->query("SELECT * FROM material_collection WHERE collection_id=$collection_id");
    	return $query->fetchAll();
    }

    function remove_material($material_id,$collection_id)
    {
    	$query = $this->db->query("DELETE FROM material_collection WHERE collection_id=$collection_id and material_id=$material_id");
    	return $query; //update
    }
	
	function get_my_collections($user_id)
    {
    	$query = $this->db->query("SELECT * FROM collections WHERE user_id=$user_id");
    	return $query->fetchAll();
    }

    function get_collection_name($collection_id)
    {
        $query = $this->db->query("SELECT * FROM collections WHERE collection_id=$collection_id");
        return $query->fetchAll();
    }
}
