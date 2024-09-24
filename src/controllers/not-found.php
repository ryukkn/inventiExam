<?php 

class NotFound
{
	use Controller;

	public function index()
	{

		$this->view('error/not-found');
	}

}
