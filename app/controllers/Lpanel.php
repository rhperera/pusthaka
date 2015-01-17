<?php
    
class Lpanel extends Controller
{
    function __construct()
    {
        parent::__construct();
        $user_type = $_SESSION['user_type'];
         if($user_type!='librarian')
         {
                    
            header("Location: ".ASSET_PATH);
          }
        
    }

    function Index()
    {
        $panel = $this->model('librarianpanel');
        $data['inactives']=$panel->get_inactives();
        $this->view('header');
        $this->view('navbar');
        $this->view('LHome',$data);
        $this->view('footer');
    }

    function inactives()
    {
         $panel = $this->model('librarianpanel');
         $data['inactive_list']=$panel->get_inactive_list();
         $this->view('header');
         $this->view('navbar');
         $this->view('non_active',$data);
         $this->view('footer');
    }

    function authenticate($id)
    {
        $panel = $this->model('librarianpanel');
        $result = $panel->activate_book($id);
        if($result)
        {
              header("Location: ".ASSET_PATH.'/Lpanel/inactives');
        }
    }

    function delete_material($material_id)
    {
        if(isset($_SESSION['user_name']))
        {
            $user_id    =$_SESSION['user_id'];
            $user_type  =$_SESSION['user_type'];
            $post = $this->model('post');
            $result = $post->delete_material($user_id,$material_id,$user_type);
            header("Location: ".ASSET_PATH.'/Lpanel/inactives');
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






      $this->view('header');
      $this->view('navbar');
      $this->view('review',$data);
      $this->view('footer');
    }
   
}

?>

