<?php

class ManageCollections extends Controller
{
	function __construct()
    {
        parent::__construct();
        //$this->load->model('category');

    }
    public function Index()
    {
        $this->view('collections_main');
    }
}