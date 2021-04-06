<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'dbconnect.php';
    $user_email=$_POST['loginEmail'];
    $password=$_POST['pass'];
    $sql="SELECT * FROM `users` WHERE `user_email`='$user_email'";
    $result=mysqli_query($conn,$sql);
    $numrows=mysqli_num_rows($result);
    if($numrows==1){
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['loginEmail']=$user_email;
            //echo "login".$user_email;
            header("Location:/quiz/main.php?loginsuccess=true");
        }
           else{
               echo "unable to login";
           }
       
    
}
?>
    
