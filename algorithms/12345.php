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
                        $uid=$_POST['uid'];
                        $name=$_POST['name'];
                        $file=$_POST['fileToUpload'];
                        $db1 = new mysqli('localhost', 'root', '', 'education');
                        $sql = $db1 -> query("INSERT INTO `student`(`Id`, `User Id`, `Name`, `File`) VALUES ('','$uid','$name','$file')");
							if($sql){
								echo "<script>alert('Your Data Added Successfully');</script>";
                            }
            
                    }
    

         ?>
    
    
<?php
    if(isset($_REQUEST['submit'])){
    
    $db2 = new mysqli('localhost', 'root', '', 'education');
    $query = $db2->query("SELECT * FROM faculty1 WHERE Id=2");    
    $result=mysqli_fetch_assoc($query);
    if($result){
        
        $qw=$result['Question'];
        $key=$result['keywords'];
    }
    }
?>    
    



<form role="form" id="feedbackForm" action="" method="post">
    <div class="row" align="center" style="margin:15%">
        <div class="col-sm-4"  style="margin-top:3%">
            <label for="User Id">User ID:&nbsp;&nbsp;</label>
            <input type="numeric" name="uid" placeholder="160XXXX092" />
        </div>
        
        <div class="col-sm-4"  style="margin-top:3%">
            <label for="name">Name:&nbsp;&nbsp;</label>
            <input type="text" name="name" placeholder="vivek" />
        </div>
        
        <div class="col-sm-4"  style="margin-top:3%">
            <label for="question">Q1.&#41;&nbsp;&nbsp;</label>
            <?php
                echo $qw; 
            ?>
        </div>
        
        <div class="col-sm-4" style="margin-top:3%">
            <label for="id">Upload File:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" name="fileToUpload"/>

        </div>
    <br><br>
<button type="submit" name="submit" class="main-button">&nbsp; &nbsp; submit &nbsp; &nbsp;</button>
    <br>
    </div>
</form>
    </body>
</html>