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
              
				
			//	echo "lcs1: ".$lcs1[$i]."\n";
			//	echo "lcs2: ".$lcs2[$i]."\n";
				
                    for($k =0; $k < $i; $k++) {
				//		echo $lcs2[$i];
				//		echo $lcs2[$k];
						
                        if (strcmp("$lcs2[$i]","$lcs2[$k]")) {
							echo "status: ".$i."Good to go!";
							echo "<br>";					
							
							break;
                        
                        }
                        else{
							echo "status".$i."Oops!! You can't cheat our algorithm, you are caught copying content from id ".$k;
							echo "<br>";
                           // Log.d("status"," "+i+"Oops!! You can't cheat our algorithm, you caught copying content of id "+k);    
                        }
                    }		
            }
        }
?> 
