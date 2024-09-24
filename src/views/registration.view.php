<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventi Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>
<body class='d-flex flex-column justify-center p-0 m-0' style='height: 100vh; width:100%; overflow-x: hidden'>
    <?php 
        if(isset($errors) && isset($errors['page_error'])){
            echo "<div id='snackbar' class='position-absolute z-3 bg-danger d-flex align-items-center px-2 w-100 py-3'>
                    <div class='h-100 d-flex align-items-center'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='white' class='bi bi-x-circle-fill' viewBox='0 0 16 16'>
                            <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z'/>
                        </svg>
                    </div>
                    <div class='text-light fw-medium ms-2'>
                        ".$errors['page_error']."
                    </div>
                </div>
                <script>
                    setTimeout(() => {
                        const elem = document.getElementById('snackbar');
                        elem.parentNode.removeChild(elem);
                    }, 4000);
                </script>
                ";
                
        }
        
        
    ?>
    <div class='w-100 p-0 mx-0 my-auto card rounded'>
        <div class='card-body p-0'>
            <div class='row'>
                <div class='d-none d-lg-block  col'>
                    <img src="<?php echo ROOT."/assets/cover.jpg" ?>" alt="cover" class='h-100 object-fit-cover w-100'>
                </div>
                <div class='col'>
                    <div class='h-100 w-100 px-4 pt-5'>
                        <div class='card-title'>
                            <h1 class='display-5'>INVENTI REGISTRATION</h1>
                        </div>
                        <div class='fw-light px-1'>
                            Inventi is known for leading the digitalization of property management in the Philippines. We currently manage over 1,100+ properties, covering 10.5M+ square meters of gross floor area and growing.
                        </div>
                        <form method='post' action="registration/register_account" enctype="multipart/form-data"  class="pt-3 row g-3">
                            
                            <div class="col-12">
                                <label for="first_name" class="form-label fw-semibold">First Name <span class='text-danger'>*</span>
                                    <span class='text-danger fw-light'><?php if(isset($errors['first_name'])) echo $errors['first_name']; ?></span>
                                </label>
                                <input placeholder='Enter your First Name' type="text" class="form-control" id="first_name" name='first_name'
                                    value="<?php if(isset($first_name)) echo $first_name; ?>"
                                >
                            </div>
                            <div class="col-12">
                                <label for="middle_name" class="form-label fw-semibold">Middle Name</label>
                                <input placeholder='Enter your Middle Name (Optional)' type="text" class="form-control" id="middle_name" name='middle_name'
                                    value="<?php if(isset($middle_name)) echo $middle_name; ?>"
                                >
                            </div>
                            <div class="col-12">
                                <label for="last_name" class="form-label fw-semibold">Last Name <span class='text-danger'>*</span>
                                    <span class='text-danger fw-light'><?php if(isset($errors['last_name'])) echo $errors['last_name']; ?></span>
                                </label>
                                <input placeholder='Enter your Last Name' type="text" class="form-control" id="last_name" name='last_name'
                                    value="<?php if(isset($last_name)) echo $last_name; ?>"
                                >
                            </div>
                           

                            <div class="col-md-6">
                                <label for="email" class="form-label fw-semibold">Email <span class='text-danger'>*</span>
                                    <span class='text-danger fw-light'><?php if(isset($errors['email'])) echo $errors['email']; ?></span>
                                </label>
                                <input placeholder='your.email@gmail.com' type="email" class="form-control" id="email" name='email'
                                    value="<?php if(isset($email)) echo $email; ?>"
                                >
                            </div>
                            <div class="col-md-6">
                                <label for="phone_number" class="form-label fw-semibold">Phone Number <span class='text-danger'>*</span>
                                    <span class='text-danger fw-light'><?php if(isset($errors['phone_number'])) echo $errors['phone_number']; ?></span>
                                </label>
                                <input placeholder='(+63) 9957140344' type="text" class="form-control" id="phone_number" name='phone_number'
                                    value="<?php if(isset($phone_number)) echo $phone_number; ?>"
                                >
                            </div>

                            <div class='col-12'>
                                <div class='w-100 border-bottom '></div>
                            </div>
                        
                       
                            <div class="col-md-6 d-flex flex-column justify-center">
                                <div class='my-auto'>
                                    <div class='fw-medium text-center  '>Kindly upload your profile picture <span class='text-danger'>*</span></div>
                                    <div class='text-danger fw-light text-center'><?php if(isset($errors['profile_image'])) echo $errors['profile_image']; ?></div>
                                    <div class='fw-light text-center   '>(Maximum file size should be 2MB)</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="card rounded p-1 text-center mx-auto mx-md-0" for="profile_image" style="width:180px; height: 180px;cursor: pointer;">
                                    <div class="card-body p-0 w-100 h-100 d-flex flex-column justify-center">
                                        <div class="h-100 w-100 d-flex" id='image-preview'>
                                            <div class='my-auto mx-auto'>
                                                <div class='fw-medium'>Upload Profile</div>
                                                <div class='fw-light'>(Click to upload)</div>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                                <input type="file" class="d-none" id="profile_image" name="profile_image" accept=".png, .gif, .jpg">
                            </div>

                            <script>
                                document.getElementById('profile_image').addEventListener('change', function() {
                                    const file = this.files[0];
                                    if (file) {
                                        const reader = new FileReader();
                                        
                                        reader.onload = function(e) {
                                            const imagePreview = document.getElementById('image-preview');
                                            imagePreview.innerHTML = `<img src="${e.target.result}" alt="Profile Image" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">`;
                                        };

                                        reader.readAsDataURL(file);
                                    }
                                });
                            </script>
                           
                            <div class="col-12 pb-4">
                                <button type="submit" class="btn btn-primary fw-bold w-100 py-3">Register Now!</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</body>
</html>