<?php
session_start();

echo '
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
 <img src="quiz1.png" style=" border-radius: 15px;width:100px;height:40px;"alt="Paris">
  <a class="navbar-brand " href=""> <span style="margin-left:20px;font-size:25px;"> i-Quiz</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link disabled" href="#"></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">

     ';

     if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']=true){
        echo '
        <h5 class="text-light mx-3" >welcome-'. $_SESSION['loginEmail'].'</h5>
        <div>
        <a href="logout.php" class="btn btn-outline-success mx-1" >logout</a>
        </div>
        ';
      }
    else{
        echo'
        <div>
     <button type="button" class="btn btn-outline-success mx-1" data-toggle="modal" data-target="#loginmodal">login</button>
     <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#signupmodal">signup</button>
     </div> ';
    } 
     echo '
    </form>
  </div>
</nav>';
include 'signupModal.php';
include 'loginModal.php';
if(isset($_GET['signupsuccess'])&&$_GET['signupsuccess']=="true"){
    echo'<div class="alert alert-warning alert-dismissible fade show my=0" role="alert">
    <strong>signup success fully</strong> You should check in on some of those fields below.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

?>