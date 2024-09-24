<?php

class App {

    private $controller = 'registration';
    private $method     = 'index';


    private function splitURL()
	{
		$URL = $_GET['url'] ?? 'root';
		$URL = explode("/", trim($URL,"/"));
		return $URL;	
	}



    public function loadController() {
        $URL = $this->splitURL();

		$filename = "../src/controllers/".$URL[0].".php";
		if(file_exists($filename))
		{
			require $filename;
			$this->controller =convertToCamelCase($URL[0]);
			unset($URL[0]);
		}else{

			$filename = "../src/controllers/not-found.php";
			require $filename;
			$this->controller = "NotFound";
		}

		$controller = new $this->controller;

		if(!empty($URL[1]))
		{
			if(method_exists($controller, $URL[1]))
			{
				$this->method = $URL[1];
				unset($URL[1]);
			}else{
                redirect($URL[0]);
            }
		}

        call_user_func_array([$controller, $this->method], $URL);
        
    }
}