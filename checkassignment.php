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
<body >
<section id="header">
  <nav style="background-color: #F9D342;" class="navbar navbar-expand-lg navbar-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#"  style="margin-right: 40%;"><strong> BREVITY</strong></a>

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

    $db2 = new mysqli('localhost', 'root', '', 'education');
    $query = $db2->query("SELECT * FROM faculty1 WHERE Id=3");    
    $result=mysqli_fetch_assoc($query);
    if($result){
        $keys=$result['keywords'];
    }    
//echo $keys;
?>
<?php
$db3 = new mysqli('localhost', 'root', '', 'education');
    $sql = $db3->query("SELECT * FROM student WHERE Id=25");    
    $result1=mysqli_fetch_assoc($sql);
    if($result1){
        $File=$result1['File'];
    }
//  echo $File;
?>
<?php

$words =explode('|', $keys, -1);
$i = strlen($File);
$all_keywords = $all_keys = $words;
foreach ($words as $word => $key)
{
    if (strpos(strtolower($File), strtolower($word)) !== false) {
        $all_keywords[] = $word;
        $all_keys[] = $key;
    }
}
        $keywords_list = implode(',', $all_keywords);
        $j= strlen($keywords_list);
        $ass = (($j/$i)*100);
       
        
?>
<?php

//To get Browser Information
if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) 
    echo 'Internet explorer';
elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE) 
    echo 'Mozilla Firefox';
    
    elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE) 
      echo 'Google Chrome';
      
      else 
        echo 'Something else';




//to store IP address

function get_ip_address() {
    // check for shared internet/ISP IP
    if (!empty($_SERVER['HTTP_CLIENT_IP']) && validate_ip($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }

    // check for IPs passing through proxies
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // check if multiple ips exist in var
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== false) {
            $iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach ($iplist as $ip) {
                if (validate_ip($ip))
                    return $ip;
            }
        } else {
            if (validate_ip($_SERVER['HTTP_X_FORWARDED_FOR']))
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED']) && validate_ip($_SERVER['HTTP_X_FORWARDED']))
        return $_SERVER['HTTP_X_FORWARDED'];
    if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
        return $_SERVER['HTTP_FORWARDED_FOR'];
    if (!empty($_SERVER['HTTP_FORWARDED']) && validate_ip($_SERVER['HTTP_FORWARDED']))
        return $_SERVER['HTTP_FORWARDED'];

    // return unreliable ip since all else failed
    return $_SERVER['REMOTE_ADDR'];
}

/**
 * Ensures an ip address is both a valid IP and does not fall within
 * a private network range.
 */
function validate_ip($ip) {
    if (strtolower($ip) === 'unknown')
        return false;

    // generate ipv4 network address
    $ip = ip2long($ip);

    // if the ip is set and not equivalent to 255.255.255.255
    if ($ip !== false && $ip !== -1) {
        // make sure to get unsigned long representation of ip
        // due to discrepancies between 32 and 64 bit OSes and
        // signed numbers (ints default to signed in PHP)
        $ip = sprintf('%u', $ip);
        // do private network range checking
        if ($ip >= 0 && $ip <= 50331647) return false;
        if ($ip >= 167772160 && $ip <= 184549375) return false;
        if ($ip >= 2130706432 && $ip <= 2147483647) return false;
        if ($ip >= 2851995648 && $ip <= 2852061183) return false;
        if ($ip >= 2886729728 && $ip <= 2887778303) return false;
        if ($ip >= 3221225984 && $ip <= 3221226239) return false;
        if ($ip >= 3232235520 && $ip <= 3232301055) return false;
        if ($ip >= 4294967040) return false;
    }
    return true;
}
?>

<section id="home">

                                            <table  border="2" width="99%" BORDERCOLOR=white>
                                                <tbody style="background-color:#f6f6f6;">
                                                    <tr style="background-color:darkgrey;color:white;">
                                                        <th style="text-align:center">User id</th>
                                                        <th style="text-align:center">Name</th>
                                                        <th style="text-align:center">file<br>(L/A)</th>
                                                        <th style="text-align:center">Plagiarism</th>
                                                        <th style="text-align:center">Assesment</th>
                                                        <th style="text-align:center">Authentication</th>
                                                        <th style="text-align:center">Status</th>
                                                        <th style="text-align:center">Marks</th>
                                                        <th style="text-align:center">-</th>
                                                    </tr> 
                                                            <tr>
                                                                <td style="text-align:center;padding-bottom:5px;padding-top:5px;">160110107002.</td>
                                                                <td style="text-align:center">Akash Amin</td>
                                                                <td style="text-align:center"><a href="$1602">view</a></td>
                                                                <td style="text-align:center">56.75</td>
                                                                <td style="text-align:center"><?php echo $ass; ?></td>
                                                                <td style="text-align:center">1</td>
                                                                <td style="text-align:center">
                                                                  <form method="POST" action="#">
                                                                  <select name="status">
                                                                  <option name="accept">accept</option>
                                                                  <option name="reject">reject</option>
                                                                  </select>
                                                                </td>
                                                                <td style="text-align:center"><input type="number"
                                                                 max="10" min="2" name="umarks"></td>
                                                                <td style="text-align:center"><input type="submit" name="submit"></td>
                                                            </tr></form >
                                                </tbody>
                                            </table>
                       <br><h3>PLAGIARISM LOG</h3>

</section>
<section id="footer">
<nav style="background-color: #F9D342;" class="navbar fixed-bottom">
  <div style="margin:auto;">
  <p>Designed & Developed By Team <a style="color: #4a4e4d;" class="navbar-brand" href="https://akashamin01.github.io/mywebsite-portfolio/"> <strong> Probono.  </strong></a></p>
  </div>
</nav>
</section>
<?php
        $con = mysqli_connect('localhost', 'root', '', 'education');
        if(isset($_POST['submit'])){
        $uplagiarism=78.65;
        $uassesment=$ass;
        $uauthentication=get_ip_address();
        $ustatus=$_POST['status'];
        $umarks=$_POST['umarks'];
        $x=12;
        $x=$x+1;
        $uid="SELECT 'User Id' FROM student WHERE Id=$x";
        mysqli_query($con,$uid);
        $sql ="INSERT INTO `assignmentreview`(`uid`, `uplagiarism`, `uassesment`, `uauthentication`, `ustatus`, `umarks`) VALUES ('$uid','$uplagiarism','$uassesment','$uauthentication','$ustatus','$umarks')";
        mysqli_query($con,$sql);

        }


?>
<?php 
// Dynamic Programming implementation of LCS problem 

// Returns length of LCS for X[0..m-1], Y[0..n-1] 
function lcs( $X, $Y, $m, $n ) 
{ 
  $L = array_fill(0, $m + 1, 
    array_fill(0, $n + 1, NULL)); 
  
  /* Following steps build L[m+1][n+1] in bottom 
  up fashion. Note that L[i][j] contains length 
  of LCS of X[0..i-1] and Y[0..j-1] */
  for ($i = 0; $i <= $m; $i++) 
  { 
    for ($j = 0; $j <= $n; $j++) 
    { 
      if ($i == 0 || $j == 0) 
        $L[$i][$j] = 0; 
      else if ($X[$i - 1] == $Y[$j - 1]) 
        $L[$i][$j] = $L[$i - 1][$j - 1] + 1; 
      else
        $L[$i][$j] = max($L[$i - 1][$j], 
                $L[$i][$j - 1]); 
    } 
  } 
  
  // Following code is used to print LCS 
  $index = $L[$m][$n]; 
  $temp = $index; 
  
  // Create a character array to store the lcs string 
  $lcs = array_fill(0, $index + 1, NULL); 
  $lcs[$index] = ''; // Set the terminating character 
  
  // Start from the right-most-bottom-most corner 
  // and one by one store characters in lcs[] 
  $i = $m; 
  $j = $n; 
  while ($i > 0 && $j > 0) 
  { 
    // If current character in X[] and Y are same, 
    // then current character is part of LCS 
    if ($X[$i - 1] == $Y[$j - 1]) 
    { 
      // Put current character in result 
      $lcs[$index - 1] = $X[$i - 1]; 
      $i--; 
      $j--; 
      $index--; // reduce values of i, j and index 
    } 
  
    // If not same, then find the larger of two 
    // and go in the direction of larger value 
    else if ($L[$i - 1][$j] > $L[$i][$j - 1]) 
      $i--; 
    else
      $j--; 
  } 
  $c="";
  // Print the lcs 
  //echo "LCS of " . $X . " and " . $Y . " is "; 
  for($k = 0; $k < $temp; $k++){
    $c=$c.$lcs[$k]; 
  }
  return $c;
    
    
} 

// Driver Code 
$lcs1=array();
$lcs2=array();
$master="Java is a high-level programming language originally developed by Sun Microsystems and released in 1995. Java runs on a variety of platforms, such as Windows, Mac OS, and the various versions of UNIX.";


        $a1=array();
        $a1[0] = "Java is a high-level programming language originally developed by Sun Microsystems and released in 1995. Java runs on a variety of platforms, such as Windows, Mac OS, and the various versions of UNIX.";
        $a1[1] = "Java is a high-level programming language originally developed by Sun Microsystems and released in 1995. Java runs on a variety of platforms, such as Windows, Mac OS, and the various versions of UNIX.";
        $a1[2] = "Java is a high-level programming language.Java runs on a variety of platforms.";
        $a1[3] = "Writing in the Java programming language is the primary way to produce code that will be deployed as byte code in a Java virtual machine (JVM); byte code compilers are also available for other languages";
        $m = strlen($master);
    $n = strlen($a1[0]);
    $lcs1[0]=lcs($master,$a1[0],$m,$n);
    $lcs2[0]=$lcs1[0];
    //echo "lcs1: ".$lcs1[0];
    //echo "lcs2: ".$lcs2[0];
        for($i=1;$i<sizeof($a1);$i++)
        {
            if($i==0){
                
            }
            else{
                $m=$n;
                $n=strlen($a1[$i]);
        if(strlen($a1[$i-1])>=strlen($a1[$i]))
        {
          $lcs1[$i]=lcs($a1[$i-1],$a1[$i],$m,$n);
          $lcs2[$i]=lcs($lcs1[$i],$lcs2[$i-1],strlen($lcs1[$i]),strlen($lcs2[$i-1]));
        }
        else
        {
          $lcs1[$i]=lcs($a1[$i],$a1[$i-1],$n,$m);
          $lcs2[$i]=lcs($lcs2[$i-1],$lcs1[$i],strlen($lcs2[$i-1]),strlen($lcs1[$i]));
        }
              
        
      //  echo "lcs1: ".$lcs1[$i]."\n";
      //  echo "lcs2: ".$lcs2[$i]."\n";
        
                    for($k =0; $k < $i; $k++) {
        //    echo $lcs2[$i];
        //    echo $lcs2[$k];
            
                        if (strcmp("$lcs2[$i]","$lcs2[$k]")) {
              echo "&nbsp"."&nbsp"."&nbsp"."status: ".$i."Good to go!";
              echo "<br>";          
              
              break;
                        
                        }
                        else{
              echo "&nbsp"."&nbsp"."&nbsp"."status".$i."Oops!! You can't cheat our algorithm, you are caught copying content from id ".$k;
              echo "<br>";
                           // Log.d("status"," "+i+"Oops!! You can't cheat our algorithm, you caught copying content of id "+k);    
                        }
                    }   
            }
        }
?> 


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