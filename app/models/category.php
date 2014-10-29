<?php
/**
 * Created by PhpStorm.
 * User: Raveen
 * Date: 8/24/14
 * Time: 12:01 AM
 */

class Category
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
        //var_dump(db);
    }
    function get_categories()
    {
        $query = $this->db->query("
        SELECT *
        FROM categories
        ");
        return $query->fetchAll();
    }

    function category_result($category_id)

    {
        //var_dump(db);
        $query = $this->db->query("
        SELECT m.material_id, m.name, cat.category_name, m.author
        FROM material_category mc
        JOIN materials m ON m.material_id=mc.material_id
        JOIN categories cat ON cat.category_id=".$category_id."
        WHERE mc.category_id=".$category_id." AND m.status=1
        ");
       
        $list = $query->fetchAll();

      /*  $query = $this->db->query("
        SELECT * FROM materials
        WHERE material_id=$list
        ");*/
        return $list;
    }

    function get_category_name($category_id){
        $query = $this->db->query("
            SELECT category_name
            FROM categories
            WHERE category_id=".$category_id);
         $category_name=$query->fetchAll();
        return $category_name;
    }
   
}