<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Quiz Website</title>
  </head>
  <body>
  <?php
  include 'header.php';
  include 'dbconnect.php';
  if(isset($_POST['submit'])){
      $i=1;
      $result=0;
      if(!empty($_POST['quizcheck'])){
          $count= count($_POST['quizcheck']);
          echo '
          
          <div class="container my-5">
       <div class="card" >
       <h4 class="d-flex justify-content-center text-white bg-dark py-1  " style=" font-size:50px;" >-:Result:-</h4>
       </div>
       <div class="card my-2">
       <h4 class="card-header">Question attemped:  <span style="margin-left:150px;font-size:30px;"> out of 5 you have selected : '.$count.'</span></h4>
        </div>
            ';
           
          $selected=$_POST['quizcheck'];
          //print_r($selected);
          $sql="SELECT *FROM question";
          $query=mysqli_query($conn,$sql);
          while($rows=mysqli_fetch_array($query)){
             //print_r($rows['ansid']);
              $check=$rows['ansid']==$selected[$i];
              if($check){
                  $result++;
              }
              $i++;
          }
          echo '<div class="card">
          <h4 class="card-header">Your Total Score:<span style="margin-left:350px; font-size:30px;"> '.$result.'</h4>
           </div>
           </div>';

      }
  }


include 'footer.php'; ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
