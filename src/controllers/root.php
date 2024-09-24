<?php 

class Root
{
	use Controller;

	public function index()
	{

		redirect('registration');
	}

}
