<?php


Trait Controller
{

	public function view($name)
	{
		$filename = "../src/views/".$name.".view.php";
		if(file_exists($filename))
		{	
			
			if(isset($_SESSION['data'])){
				extract($_SESSION['data']);
			}
			require $filename;
		}else{
            // Not implemented error, since the controller exists but not the view
			$filename = "../src/views/501.view.php";
			require $filename;
		}
	}
}