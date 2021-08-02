<?php 
    require "DbConnect.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration</title>
    </head>

    <body>
        <?php

             $fnameErr=$lnameErr=$genderErr=$dobErr=$errorMessage=$religionErr=$emailErr=$successfulMessage=$userNameErr=$passwordErr="";
             $fname=$lname=$gender=$dob=$religion=$present_address=$parmanent_address=$phone=$email=$link=$userName=$password="";
             
             
             $successfulMessage=$errorMessage="";
             $flag=false;
             
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                

                if(empty($_POST['fname']))
                {
                    $fnameErr="* First name can not be  empty.";
                    $flag=true;
                    
                }
                
                if(empty($_POST['lname']))
                {
                    $lnameErr="* Last name can not be  empty.";
                    $flag=true;
                    
                }
                if(empty($_POST['gender']))
                {
                    $genderErr="* Gender  can not be  empty.";
                    $flag=true;
                    
                }
                if(empty($_POST['dob']))
                {
                    $dobErr="* Date of birth can not be  empty.";
                    $flag=true;
                    
                }
                if(empty($_POST['religion']))
                {
                    $religionErr="* Religion can not be empty";
                    $flag=true;
                }
                if(empty($_POST['email']))
                {
                    $emailErr="* Email can not be  empty.";
                    $flag=true;
                    
                }
                if(empty($_POST['username']))
                {
                    $userNameErr="* User name can not be empty.";
                    $flag=true;
                }
                if(empty($_POST['password']))
                {
                    $passwordErr="* Password can not be  empty.";
                    $flag=true;
                    
                }

                if(!$flag)
                {
                    $fname=test_name($_POST['fname']);
                    $lname=test_name($_POST['lname']);
                    $gender=test_name($_POST['gender']);
                    $dob=test_name($_POST['dob']);
                    $religion=test_name($_POST['religion']);
                    $present_address=test_name($_POST['address']);
                    $parmanent_address=test_name($_POST['paddress']);
                    $phone=test_name($_POST['phone']);
                    $email=test_name($_POST['email']);
                    $link=test_name($_POST['link']);
                    $userName=test_name($_POST['username']);
                    $password=test_name($_POST['password']);

                    
                    $result=register($fname,$lname,$gender,$dob,$religion,$present_address,$parmanent_address,$phone,$email,$link,$userName,$password);

                    if($result)
                    {
                        $successfulMessage= "Registration Successful";
                    }
                    else
                    {
                        $errorMessage="Registration Unsuccessful";
                    }
                }
                

            }
            function test_name($data)
            {
                $data=trim($data);
                $data=stripcslashes($data);
                $data=htmlspecialchars($data);
                return $data;
            }
        ?>

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" name="registration" onsubmit="return isvalid()">
            <h2>Registration Form:</h2>
            <fieldset>
                <legend>Basic Information:</legend>
                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="fname" ><span id="fnameErr" style="color : red;"><?php echo $fnameErr; ?></span>
                <br><br>
                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname" ><span id="lnameErr" style="color : red;"><?php echo $lnameErr; ?></span>
                <br><br>
                <label for ="gender">Gender :</label>
                <br>
                <input type="radio" id="male" name="gender" value="male" >
                <label for="male">Male</label><br>
                <input type="radio" id="female" name="gender" value="female" >
                <label for="female">Female</label><br>
                <input type="radio" id="other" name="gender" value="other" >
                <label for="other">Other</label>
                <span id="genderErr" style="color : red;"><?php echo $genderErr; ?></spa