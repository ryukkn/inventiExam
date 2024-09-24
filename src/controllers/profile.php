<?php 

class Profile
{
	use Controller;


	public function index()
	{
		$user = new User;
		if(!isset($_SESSION['account'])){
			redirect('registration');
		}
		$users = $user->get(['email'=> $_SESSION['account']]);
		if($users){
			if(count($users) > 0){
				$_SESSION['data']= $users[0];
			}
		}
		$this->view('profile');
	}
	
}
