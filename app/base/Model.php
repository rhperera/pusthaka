<?

class Model
{
	protected function load_class($name)
    {
        require_once('../app/libraries/'.$name.'.php');
    }
}