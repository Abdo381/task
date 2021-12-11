
<?php

$Data =   file_get_contents("http://shopping.marwaradwan.org/api/Products/1/1/0/100/atoz");
     
$Array = json_decode($Data,true);
foreach ($Array as $key => $value) {
foreach ($value as $key1 => $value1) {
foreach ($value1 as $key2 => $value2) {
  print_r( $key2.':'.$value2);
  echo'<br>';
}
}
}
$file = fopen("data.txt", "a") or die("Can't open File");
$txt = $Array;
fwrite($file, $txt);
fclose($file);
?>