<?php

    $db2 = new mysqli('localhost', 'root', '', 'education');
    $query = $db2->query("SELECT * FROM faculty1 WHERE Id=2");    
    $result=mysqli_fetch_assoc($query);
    if($result){
        $keys=$result['keywords'];
    }    
//echo $keys;
?>
<?php
$db3 = new mysqli('localhost', 'root', '', 'education');
    $sql = $db3->query("SELECT * FROM student WHERE Id=21");    
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
        echo "Accuracy :" .$ass;

?>
