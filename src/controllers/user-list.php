<?php 

class UserList
{
	use Controller;


	public function index()
	{
		$user = new User;
		$users = $user->get_all();
		$users = $users ? $users : [];
		$_SESSION['data']= ['users'=> $users];
		$this->view('user-list' );
	}
	
}
