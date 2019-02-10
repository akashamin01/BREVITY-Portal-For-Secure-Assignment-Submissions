<?php

$keywords="java|python|c++|c";
$words =explode('|', $keywords, -1);
		
	$myfile = fopen("myfile1.txt", "r") or die("Unable to open file!");
	// Output one line until end-of-file
	while(!feof($myfile)) {
	$text = fgets($myfile);

$all_keywords = $all_keys = array();
foreach ($words as $word => $key) {
    if (strpos(strtolower($text), strtolower($word)) !== false) {
        $all_keywords[] = $word;
        $all_keys[] = $key;
    }
}
        echo $keywords_list = implode(',', $all_keywords) ."<br>";
        echo $keys_list = implode(',', $all_keys) . "<br>";
}
	fclose($myfile);	
	
?>


