<?php

class MyTable extends Controller
{


    function __construct()
    {
        parent::__construct();
    }

    function Index()
    {
      if(isset($_SESSION['user_name']) and $_SESSION['user_type']=='user')
        {
          $uploader_id = $_SESSION['user_id'];
          $permissions = $this->model('permissions');
          $data['requests'] = $permissions->get_all_requests($uploader_id);

          $data['request_details'] = $permissions->get_request_details($data['requests']);

          $post = $this->model('post');
          $data['books'] = $post->get_materials_by_uploader();

      	  $this->view('header');   	
  		    $this->view('navbar');
          $this->view('mytable',$data);
  		    $this->view('footer');
        }
    }

    

    function review($material_id)
    {
      $post = $this->model('post');
      $data['material'] = $post->get_inactive_material($material_id);

      $user_id = $data['material'][0]['uploader_id'];
      $users = $this->model('user');
      $data['user'] = $users->get_user($user_id);

      $category = $this->model('category');
      $data['categories']=$category->get_categories();
      $data['category'] = $category->get_category_by_material($material_id);

      if(isset($_SESSION['user_name']) and $_SESSION['user_id']==$user_id)
        {

              $this->view('header');
              $this->view('navbar');
              $this->view('review',$data);
              $this->view('footer');
          }
    }

    function delete_material($material_id)
    {
        $model = $this->model('post');
        $data['item']=$model->get_material($material_id);
        if(isset($_SESSION['user_type']) and $data['item'])
        {
          $user_id = $data['item'][0]['uploader_id'];

          if(isset($_SESSION['user_name']) and $_SESSION['user_id']==$user_id)
          {
              $user_id    =$_SESSION['user_id'];
              $user_type  =$_SESSION['user_type'];
              $post = $this->model('post');
              $result = $post->delete_material($user_id,$material_id,$user_type);

              if($_SESSION['user_type']=='librarian')
                {
                  header("Location: ".ASSET_PATH.'/lpanel');
                }
                else
                {
                  header("Location: ".ASSET_PATH.'/mytable');
                }
                
          }
        }
        else
        {
          if($_SESSION['user_type']=='librarian')
                {
                  header("Location: ".ASSET_PATH.'/lpanel');
                }
                else
                {
                  header("Location: ".ASSET_PATH.'/mytable');
                }
        }
        
    }




	
	
}
