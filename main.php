<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Quiz website</title>
  </head>
  <body>
  <?php
  include 'dbconnect.php';
  include 'header.php';
  ?>
<div class="container">
<form action="check.php" method="post" >

    <?php
    for($i=1;$i<=5;$i++){
    $sql="SELECT *FROM question where qid=$i";
    $result=mysqli_query($conn,$sql);
    while($rows=mysqli_fetch_array($result)){
        
       echo ' 
       
       <div class="container mt-3">
       <div class="card">
        <h4 class="card-header">'.$rows['question'].'</h4>';
       $sql1="SELECT *FROM answers where ans_id=$i ";
       $query=mysqli_query($conn,$sql1);
       while($rows=mysqli_fetch_array($query)){
           echo'<div class="card-body">
           <input type="radio" name="quizcheck['.$rows['ans_id'].']" value='.$rows['aid'].' >
           '.$rows['answers'].'
           </div>';
       }
       
        echo' </div>
        </div>';
    }}    
    ?>
    <div class="container my-2">
    <input type="submit" value="submit" name="submit" class="btn btn-success m-auto d-block my-2">
    </div>
    <br><br>
    </form>
    </div>
   
    <?php include 'footer.php'; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
