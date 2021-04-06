<?php
$showerror="false";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'dbconnect.php';
    $user_email=$_POST['signupEmail'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];

    $sql="SELECT * FROM `users` WHERE `user_email`='$user_email'";
    $result=mysqli_query($conn,$sql);
    $numrows=mysqli_num_rows($result);
    if($numrows>0){
        $showerror="email already exists";
    }
    else{
        if($password==$cpassword){
                $sql="INSERT INTO `users` (`user_email`, `password`, `time`) VALUES ('$user_email', '$password', current_timestamp())";
                $result=mysqli_query($conn,$sql);
                if($result){
                    $showalert=true;
                    header("Location:/quiz/index.php?signupsuccess=true");
                }
            }
        else{
            $showerror="password do not match";
            header("Location:/quiz/index.php?signupsuccess=false");
        }
    }
}

?>