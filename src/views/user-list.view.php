<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventi User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class='d-flex' style='height:100vh;'>
    
   <div class='row d-flex w-100 h-100'>
    <div class='col-xxl-10 mx-auto my-auto'>
        <div class='w-100 h-80 card p-0 mx-auto my-auto'>
            <h1 class='display-4 px-2'>INVENTI USER LIST</h1>
            <table class="table table-striped table-hover">
                <thead>
                    <tr >
                        <th class='bg-primary text-light'>
                        
                        </th>
                        <th class='bg-primary text-light'>
                            First Name
                        </th>
                        <th class='bg-primary text-light'>
                            Middle Name
                        </th>
                        <th class='bg-primary text-light'>
                            Last Name
                        </th>
                        <th class='bg-primary text-light'>
                            Phone Number
                        </th>
                        <th class='bg-primary text-light'>
                            Email
                        </th>
                        <th class='bg-primary text-light'>
                            Created At
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($users as $user){
                        echo "
                            <tr>"
                                ."<td class='align-middle'>".
                                '<img style="height:50px;width:50px;border-radius:50%;" src ="'.ROOT.'/uploads/'.$user['email'].'-'.$user['profile_image'].'">'
                                ."</td>"        
                                ."<td class='align-middle'>".
                                    $user['first_name'] 
                                ."</td>"        
                                ."<td class='align-middle'>".
                                    ($user['middle_name'] ?? 'None')
                                ."</td>"        
                                ."<td class='align-middle'>".
                                    $user['last_name'] 
                                ."</td>"        
                                ."<td class='align-middle'>".
                                    $user['phone_number'] 
                                ."</td>"        
                                ."<td class='align-middle'>".
                                    $user['email'] 
                                ."</td>"        
                                ."<td class='align-middle'>".
                                    $user['created_at'] 
                                ."</td>"                
                            ."</tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
   </div>
    
</body>
</html>