<?php
/**
 * Created by PhpStorm.
 * User: Raveen
 * Date: 8/24/14
 * Time: 12:01 AM
 */

class Category extends CI_Model
{
    function get_categories()
    {
        $query = $this->db->query("
        SELECT *
        FROM categories
        ");
        return $query->result_array();
    }

    function category_result($category_id)

    {
        $query1 = $this->db->query("
        SELECT m.material_id, m.name, cat.category_name, m.author
        FROM material_category mc
        JOIN materials m ON m.material_id=mc.material_id
        JOIN categories cat ON cat.category_id=$category_id
        WHERE mc.category_id=$category_id AND m.status=1
        ");
        $list = $query1->result_array();

      /*  $query = $this->db->query("
        SELECT * FROM materials
        WHERE material_id=$list
        ");*/
        return $list;
    }
}