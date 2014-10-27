<?php
/**
 * Created by PhpStorm.
 * User: Raveen
 * Date: 8/22/14
 * Time: 1:52 PM
 */
class Post extends CI_Model
{
    function get_materials($num)
    {
        $query = $this->db->query("
         SELECT DISTINCT m.name, m.author, m.upload_date, m.material_id, GROUP_CONCAT(DISTINCT ca.category_name ORDER BY ca.category_id) AS cat_list
         FROM material_category mc
         JOIN materials m ON m.material_id = mc.material_id
         JOIN categories ca ON mc.category_id = ca.category_id
         WHERE m.status=1
         GROUP BY m.material_id
         ORDER BY upload_date DESC
         LIMIT $num;
         
        ");
       //$query = $this->db->get();

        return $query->result_array();

    }

    function get_material($material_id)
    {
        $query = $this->db->query("
        SELECT * FROM materials WHERE material_id=$material_id AND status=1
        ");
        return $query->first_row('array');
    }

    function save_material($book,$category)
    {
        
        $name       = $book->get_name();
        $author     = $book->get_author();
        $uploader_id= $book->get_uploader_id();
        $upload_date= $book->get_upload_date();
        $path       = $book->get_path();
        $status     = $book->get_status();

        $query1 = $this->db->query("
            INSERT INTO materials
            VALUES('','".$name."','".$author."','".$uploader_id."','".$upload_date."','".$path."','".$status."')");

        $query2 = $this->db->query("
            SELECT material_id
            FROM materials
            WHERE name='".$name."' AND author='".$author."' AND uploader_id='".$uploader_id."'");
        $array = $query2->first_row('array');
        $material_id =$array['material_id'];

       $query2 = $this->db->query("
            INSERT INTO material_category
            VALUES('".$material_id."','".$category."')
            ");
        if($query1 && $query2)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    function browse_materials()
    {
        
    }
}