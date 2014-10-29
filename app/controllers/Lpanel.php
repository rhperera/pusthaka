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
   
}

?>

