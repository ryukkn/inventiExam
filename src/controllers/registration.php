<?php 

class Registration
{
	use Controller;

	public function index()
	{
		$this->view('registration');
	}

    public function register_account(){
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
            unset($_SESSION['data']);       

            $user = new User;

			$data = [
				'first_name' => clean($_POST['first_name']) ,
				'last_name' => clean($_POST['last_name']) ,
				'middle_name' => clean($_POST['middle_name']) ,
				'phone_number' => clean($_POST['phone_number']) ,
				'email' => clean($_POST['email']),
				'profile_image' => $_FILES['profile_image']
			];
        

			if ($user->validate($data)) {
				// Insert new user
                $uploadDir = 'uploads/';
                $fileName =  $data['email'].'-'. basename($data['profile_image']['name']);
                $uploadFile = $uploadDir .$fileName;

                if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $uploadFile)) {
                    // File upload success
                    $userData = [
                        'first_name' => $data['first_name'] ,
                        'last_name' => $data['last_name'] ,
                        'middle_name' => $data['middle_name'] ,
                        'phone_number' => $data['phone_number'] ,
                        'email' => $data['email'] ,
                        'profile_image' => clean(basename($data['profile_image']['name']))
                    ];
                    
                    if ($user->insert($userData)) {
                        unset($_SESSION['data']);
                        $_SESSION['account'] = $userData['email'];
                        $_SESSION['success'] ='Account registration was successful!';
                        redirect('profile');
                        exit;
                    } else {
                        $_SESSION['data'] = [
                            ...$data,
                            'errors' => [
                            'page_error'=> 'Failed registering account, please try again later...']];
                        redirect('registration');
                        exit;
                    }
                } else {
                    $user->errors['profile_image'] = 'File upload failed.';
                    $_SESSION['data'] = [
                        ...$data,
                        'errors' => [
                            ...$user->errors,
                        'page_error'=> 'Failed registering account, please try again later...']];
                    redirect('registration');
                    exit;
                }

				
			} else {
                $_SESSION['data'] =  [
                    ...$data,
                    'errors'=>['page_error'=> 'Failed registering account, please verify if your information is VALID',...$user->errors]];
                redirect('registration');
                exit;
				
			}
		}else{
            redirect('registration');
            exit;
        }
    }

}
