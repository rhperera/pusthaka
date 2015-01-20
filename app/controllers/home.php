<?php

class Home extends Controller
{
    

    public function Index()
    {
    	if(isset($_SESSION['pdf_path']))
    	{

    		header('Content-type: application/pdf');
			//header('Content-Disposition: inline; filename="' . $filename . '"');
			header('Content-Transfer-Encoding: binary');
			//header('Content-Length: ' . filesize($file));
			header('Accept-Ranges: bytes');
    		$file = $_SESSION['pdf_path'].".pdf";
    		unset($_SESSION['pdf_path']);
    		$file= ltrim ($file,'/');
    		$file = str_replace(' ', '', $file);
			$filename = $file.'abcde'; /* Note: Always use .pdf at the end. */
			readfile($file);

    	}
    	
        
    }


}
