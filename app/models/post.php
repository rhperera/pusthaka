<?php
/**
 * Created by PhpStorm.
 * User: Raveen
 * Date: 8/22/14
 * Time: 1:52 PM
 */
class Post
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

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
        //var_dump($query->result_array());
        return $query->fetchAll();

    }

    function get_material($material_id)
    {
        $query = $this->db->query("
        SELECT * FROM materials WHERE material_id=".$material_id." AND status=1
        ");
        $return = $query->fetchAll();
        return $return;
        //return $query->fetch(PDO::FETCH_OBJ);
    }

    function get_inactive_material($material_id)
    {
        $query = $this->db->query("
        SELECT * FROM materials WHERE material_id=".$material_id."
        ");
        $return = $query->fetchAll();
        return $return;
        //return $query->fetch(PDO::FETCH_OBJ);
    }

    function save_material($book,$category)
    {
        $ISBN       = $book->get_ISBN();
        $name       = $book->get_name();
        $author     = $book->get_author();
        $uploader_id= $book->get_uploader_id();
        $upload_date= $book->get_upload_date();
        $path       = $book->get_path();
        $status     = $book->get_status();
        $description= $book->get_description();
        $tags       = $book->get_tags();
        $privacy    = $book->get_privacy();

        $query1 = $this->db->query("
            INSERT INTO materials
            VALUES('','".$ISBN."','".$name."','".$author."','".$uploader_id."','".$upload_date."','".$path."','".$status."','".$description."','".$tags."','".$privacy."')");

        $query2 = $this->db->query("
            SELECT material_id
            FROM materials
            WHERE name='".$name."' AND author='".$author."' AND uploader_id='".$uploader_id."'");


        $array = $query2->fetchAll();
        $material_id =$array[0]['material_id'];

         $query3 = $this->db->query("INSERT INTO view_results VALUES(".$uploader_id.",".$material_id.")");

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

    function delete_material($user_id,$material_id,$user_type)
    {
        $query = $this->db->query("SELECT uploader_id FROM materials");
        $array = $query->fetchAll();
        $uploader_id =$array[0]['uploader_id'];

        if($user_id==$uploader_id or $user_type=='admin' or $user_type=='librarian')
        {
            $query = $this->db->query("DELETE FROM materials WHERE material_id=$material_id");
            return $query;
        }
        
    }

    function show_my_uplaods($uploader_id)
    {
        $query = $this->db->query("SELECT * FROM materials WHERE uploader_id=$uploader_id");
        return $query->fetchAll();
    }
	
	 function update_material($material_id,$book,$category)
    {
        $ISBN       = $book->get_ISBN();
        $name       = $book->get_name();
        $author     = $book->get_author();
        $uploader_id= $book->get_uploader_id();
        $upload_date= $book->get_upload_date();
        $path       = $book->get_path();
        $status     = $book->get_status();
        $description= $book->get_description();
        $tags       = $book->get_tags();
        $privacy    = $book->get_privacy();

        $query1 = $this->db->query("
            UPDATE materials
			set ISBN = $ISBN , name = $name , author = $author , uploader_id = $uploader_id ,  upload_date =  $upload_date , path = $path , status = $status , description = $description , tags = $tags , privacy = $privacy
			where material_id = $material_id ;
            "
			);
    }
}