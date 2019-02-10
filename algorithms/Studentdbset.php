<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}
</style>

<body>
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
    <div class="row" align="center" style="margin:15%">
        <div class="col-sm-4"  style="margin-top:3%">
            <label for="name">Q1&#41;:&nbsp;&nbsp;</label>
            <input type="text" name="question" placeholder="Question" />
        </div>
        <div class="col-sm-4" style="margin-top:3%">
            <label for="id">KeyWords:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" name="keys" placeholder="servlet|java-servlet" />
        </div>
    <br><br>
<button type="submit" name="submit" class="main-button">&nbsp; &nbsp; submit &nbsp; &nbsp;</button>
    <br>
    <br>
<button type="button" name="check">&nbsp; &nbsp;<a href="12345.php"> submit &nbsp; &nbsp;</a></button>
    </div>
</form>
    </body>
</html>