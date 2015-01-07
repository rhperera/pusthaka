<?php

class Material
{
    private $id;
    private $ISBN;
	private $name;
	private $author;
	private $path;
	private $status;
	private $upload_date;
	private $uploader_id;
	private $description;
	private $tags;

	public function __construct($ISBN,$name,$author,$uploader_id,$upload_date,$path,$status,$description,$tags)
	{
		
		$this->name=$name;
        $this->ISBN=$ISBN;
		$this->author=$author;
		$this->path=$path;
		$this->status=$status;
		$this->upload_date=$upload_date;
		$this->uploader_id=$uploader_id;
		$this->description=$description;
		$this->tags=$tags;
	}

    public function get_id()
    {
        return $this->id;
    }

    public function set_id($id)
    {
        $this->id=$id;
    }

    public function get_ISBN()
	{
		return $this->ISBN;
	}

	public function get_name()
	{
		return $this->name;
	}

	public function get_author()
	{
		return $this->author;
	}

	public function get_path()
	{
		return $this->path;
	}

	public function get_upload_date()
	{
		return $this->upload_date;
	}

	public function get_uploader_id()
	{
		return $this->uploader_id;
	}

	public function get_status()
	{
		return $this->status;
	}

	public function get_description()
	{
		return $this->description;
	}

	public function get_tags()
	{
		return->$this->tags;
	}
}
