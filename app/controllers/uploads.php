<?php

class Uploads extends Controller
{


    function __construct()
    {
        parent::__construct();
        
        $category = $this->model('category');
        $post = $this->model('post');
        
    }
	function Index()
	{
        if(isset($_SESSION['user_name']))
        {
          $category = $this->model('category');
          $data['categories']=$category->get_categories();
          
		  $this->view('header',$data);
		  $this->view('navbar',$data);
          $this->view('upload_file',$data,array('error' =>''));
		  $this->view('footer',$data);
        }
        else
        {
            header("Location: ".ASSET_PATH);
        }
	}

    function do_upload()
    {
        if ($_FILES['file']['size']<50000000) 
        {
        # code...
            if ($_FILES["file"]["error"] > 0) 
            {
              echo "Error: " . $_FILES["file"]["error"] . "<br>";
            } 
            else 
            {
                
                $category = $this->model('category');
                $category_name=$category->get_category_name($_POST['category']);
                
                if (!file_exists('../www/repo/'.$category_name[0]['category_name'])) 
                {
                    mkdir('../www/repo/'.$category_name[0]['category_name'],0777,true);
                }
                  
                move_uploaded_file($_FILES["file"]["tmp_name"],
                    '../www/repo/'.$category_name[0]['category_name']."/". $_POST["name"].".pdf");

               // echo "Upload: " . $_FILES["file"]["name"] . "<br>";
              //  echo "Type: " . $_FILES["file"]["type"] . "<br>";
              //  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
              //  echo "Stored in: " . $_FILES["file"]["tmp_name"] . "<br>";
                $name       =$_POST['name'];
                $ISBN       =$_POST['ISBN'];
                $author     =$_POST['author'];
                $category   =$_POST['category'];
                $description =$_POST['description'];
                $tags       =$_POST['tags'];
                $privacy       =$_POST['privacy']; 
                $uploader_id=$_SESSION['user_id'];
                $date       =date("Y-m-d");
                $path       ="/repo/".$category_name[0]['category_name']."/". $_POST["name"];
                $status     =0;
                
                $this->load_class('Material');
                $book       = new Material($ISBN,$name,$author,$uploader_id,$date,$path,$status,$description,$tags,$privacy);
                $post = $this->model('post');
                $save1   =$post->save_material($book,$category);
                
                
            }
          }

          if($save1)
                {
                    
                  header("Location: ".ASSET_PATH.'/uploads/upload/success');
                  
                }
                else
                {
                    
                  header("Location: ".ASSET_PATH.'/uploads/upload/fail');
                   
                }

    }


	function do_update($material_id)
    {           
		$ISBN       =$_POST['ISBN'];
		$name       =$_POST['name'];
        $author     =$_POST['author'];
        $category   =$_POST['category'];
        $description =$_POST['description'];
        $tags       =$_POST['tags'];
		$privacy       =$_POST['privacy']; 
        $status     =1;
                

        $post = $this->model('post');
        $update1   =$post->update_material($material_id,$ISBN,$name,$author,$category,$description,$tags,$privacy,$status); 
        header("Location: ".ASSET_PATH.'/Lpanel/inactives');       
                
    }
}
      
?>