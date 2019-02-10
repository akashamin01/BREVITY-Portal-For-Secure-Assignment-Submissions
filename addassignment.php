<!DOCTYPE html>
<html>
<head>
  <title>Assignment-Submission-Portal</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<section id="header">
  <nav style="background-color: #00DD6E;" class="navbar navbar-expand-lg navbar-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#"><strong> BREVITY</strong></a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="staffadmin.php">Home </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="addassignment.php">Add Assignment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="checkassignment.php">Check Assignment </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Sign-OUT</a>
      </li>
    </ul>
  </div>
</nav>
</section>

<?php 
          
                    if(isset($_REQUEST['submit'])){ 
                        $question = $_POST['question'];
                        $keywords= $_POST['keys'];
                        $db1 = new mysqli('localhost', 'root', '', 'education');
                        $sql = $db1 -> query("INSERT INTO `faculty1`(`Id`,`Question` , `Keywords`) VALUES ('','$question' , '$keywords')");
              if($sql){
                echo "<script>alert('Your Data Added Successfully');</script>";
                            }
                   else
                   {
                            $message = "Please Enter Valid Data";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                   }
                }
                ?>



<form role="form" id="feedbackForm" action="" method="post">
    <div  align="center" style="margin:10%">
  
            <label for="name">Question 1 &#41; :&nbsp;&nbsp;</label>
            <input type="text" name="question" placeholder="Question" /><br>
       
            <label for="id">KeyWords:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" name="keys" placeholder="servlet|java-servlet" /><br>
        
    <br>
<button type="submit" name="submit" class="main-button">&nbsp; &nbsp; submit &nbsp; &nbsp;</button><br>
    <br>
    
<button type="button" name="check">&nbsp; &nbsp;<a href="12345.php"> submit &nbsp; &nbsp;</a></button><br>
   
</form>
    
  </div>
</section>
<section id="footer">
<nav style="background-color: #00DD6E;" class="navbar fixed-bottom">
  <div style="margin:auto;">
  <p>Designed & Developed By Team <a style="color: #4a4e4d;" class="navbar-brand" href="https://akashamin01.github.io/mywebsite-portfolio/"> <strong> Probono.  </strong></a></p>
  </div>
</nav>
</section>
</body>


<style type="text/css">
#navbarTogglerDemo03 ul li a{
padding-left: 15px;
padding-right: 15px;
}

#navbarTogglerDemo03 ul li a:hover{
background-color: #83d0c9;
}
</style>
</html>