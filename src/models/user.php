<?php

class User
{
	
	use Model;

	protected $table = 'users';

	protected $allowedColumns = [

		'first_name',
		'last_name',
		'middle_name',
		'email',
		'phone_number',
		'profile_image'
	];

	private function checkDuplicateEmail($email){
		 $exists = $this->get(['email'=> $email]);
		 if(is_array($exists)){
			return count($exists) > 0;
		 }else{
			return false;
		 }
		 
	}

	public function validate($data)
	{
		$this->errors = [];

		if(empty($data['first_name']))
		{
			$this->errors['first_name'] = "Field is required";
		}
		if(empty($data['last_name']))
		{
			$this->errors['last_name'] = "Field is required";
		}
		if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
		{
			$this->errors['email'] = "Email is not valid";
		}
		
		if(empty($data['phone_number']))
		{
			$this->errors['phone_number'] = "Field is required";
		}
		
		if($this->checkDuplicateEmail($data['email'])){
			$this->errors['email'] = "Email is already in use";
		}

        if(empty($data['profile_image']) || $data['profile_image']['error'] != 0){
            $this->errors['profile_image'] = "Field  is required";
        }

        if(isset($data['profile_image']) && $data['profile_image']['error'] == 0){
            $maxFileSize = 2 * 1024 * 1024; 
            if($data['profile_image']['size'] > $maxFileSize){
                $this->errors['profile_image'] = "Image size must not exceed 2 MB";
            }
        }

		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}


}