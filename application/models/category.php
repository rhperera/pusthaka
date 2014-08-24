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

    function category_result(#$category_id
    )
    {
        $query1 = $this->db->query("
        SELECT material_id
        FROM material_category
        WHERE category_id=3
        ");
        $list = $query1->result_array();

      /*  $query = $this->db->query("
        SELECT * FROM materials
        WHERE material_id=$list
        ");*/
        return $list;
    }
}