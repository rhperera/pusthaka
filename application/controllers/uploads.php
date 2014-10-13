<?php

class Uploads extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('category');
        $this->load->model('post');
        
    }
	function Index()
	{
        $data['categories']=$this->category->get_categories();
        $user_name = $this->session->userdata('user_name');

        if($user_name)
        {
		  $this->load->view('header.php',$data);
		  $this->load->view('navbar.php',$data);
          $this->load->view('upload_file.php',$data,array('error' =>''));
		  $this->load->view('footer.php',$data);
        }
        else
        {
            redirect(base_url().'posts');
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
                

                $category_name=$this->category->get_category_name($_POST['category']);
                
                if (!file_exists('../ucsc-digital-library/repo/'.$category_name[0]['category_name'])) 
                {
                    mkdir('../ucsc-digital-library/repo/'.$category_name[0]['category_name'],0777,true);
                }
                  
                move_uploaded_file($_FILES["file"]["tmp_name"],
                    "../ucsc-digital-library/repo/".$category_name[0]['category_name']."/". $_POST["name"].".pdf");

               // echo "Upload: " . $_FILES["file"]["name"] . "<br>";
              //  echo "Type: " . $_FILES["file"]["type"] . "<br>";
              //  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
              //  echo "Stored in: " . $_FILES["file"]["tmp_name"] . "<br>";
                $name       =$_POST['name'];
                $author     =$_POST['author'];
                $category   =$_POST['category'];
                $descrption =$_POST['description'];
                $tags       =$_POST['tags']; 
                $uploader_id=$this->session->userdata('user_id');
                $date       =date("Y-m-d");
                $path       ="/repo/".$category_name[0]['category_name']."/". $_POST["name"];
                $status     =0;
                
                require('../ucsc-digital-library/application/libraries/Material.php');
                $book       = new Material($name,$author,$uploader_id,$date,$path,$status);
                //$book   =serialize($book);
                $save   =$this->post->save_material($book,$category);
               
            }
          }

    }


} 


?>