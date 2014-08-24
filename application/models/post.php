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
        SELECT * FROM materials WHERE material_id=$material_id
        ");
        return $query->first_row('array');
    }
}