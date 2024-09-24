<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventi Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<?php
    if(isset($_SESSION['success'])){
        echo "<div id='snackbar' class='position-absolute z-3 bg-success d-flex align-items-center px-2 w-100 py-3'>
                <div class='h-100 d-flex align-items-center'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='white' class='bi bi-check-circle-fill' viewBox='0 0 16 16'>
                        <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
                    </svg>
                </div>
                <div class='text-light fw-medium ms-2'>
                    ".$_SESSION['success']."
                </div>
            </div>
            <script>
                setTimeout(() => {
                    const elem = document.getElementById('snackbar');
                    elem.parentNode.removeChild(elem);
                }, 4000);
            </script>
            ";
        unset($_SESSION['success']);
        unset($_SESSION['account']);
        unset($_SESSION['data']);
    }
?>
<body class='d-flex flex-column justify-center p-0 m-0' style='height: 100vh; width:100%; overflow-x: hidden'>
    <div class='row h-100'>
        <div class='col-xl-9 mx-auto my-auto'>
            <div class='w-100 p-0 mx-auto my-auto card rounded'>
                <div class='card-body p-0'>
                    <div class='row'>
                        <div class='col'>
                            <div class='h-100 w-100 px-4 py-5'>
                                <div class='row'>
                                    <div class='col-md-6 d-flex'>
                                        <div class='card-title mx-auto my-auto text-center'>
                                            <h1 class='display-5 text-center'>INVENTI PROFILE</h1>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex">
                                        <label class=" rounded text-center mx-auto mx-md-100" for="profile_image" style="width:200px; height: 200px">
                                            <div class="p-0 w-100 h-100 d-flex flex-column justify-center">
                                                <div class="h-100 w-100 d-flex" id='image-preview'>
                                                    <img src="<?php echo ROOT.'/uploads/'.$email.'-'.$profile_image?>" alt="Profile Image" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div  class="pt-3 row g-3">
                                    <div class="col-12">
                                        <label for="first_name" class="form-label fw-semibold">First Name</label>
                                        <input readonly  type="text" class="form-control" id="first_name" name='first_name'
                                            value="<?php if(isset($first_name)) echo $first_name; ?>"
                                        >
                                    </div>
                                    <div class="col-12">
                                        <label for="middle_name" class="form-label fw-semibold">Middle Name</label>
                                        <input readonly placeholder='Enter your Middle Name (Optional)' type="text" class="form-control" id="middle_name" name='middle_name'
                                            value="<?php if(isset($middle_name) && trim($middle_name) != ''){ echo $middle_name;} else {echo 'N/A';} ?>"
                                        >
                                    </div>
                                    <div class="col-12">
                                        <label for="last_name" class="form-label fw-semibold">Last Name</label>
                                        <input readonly type="text" class="form-control" id="last_name" name='last_name'
                                            value="<?php if(isset($last_name)) echo $last_name; ?>"
                                        >
                                    </div>
                                

                                    <div class="col-md-6">
                                        <label for="email" class="form-label fw-semibold">Email</label>
                                        <input readonly type="email" class="form-control" id="email" name='email'
                                            value="<?php if(isset($email)) echo $email; ?>"
                                        >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone_number" class="form-label fw-semibold">Phone Number</label>
                                        <input readonly type="text" class="form-control" id="phone_number" name='phone_number'
                                            value="<?php if(isset($phone_number)) echo $phone_number; ?>"
                                        >
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>