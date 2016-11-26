<?php

$dbname = 'nd3';
$dbuser = 'project';
$dbpass = 'project';
$dbhost = '127.0.0.1';
$connect = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysqli_select_db($connect,$dbname) or die("Could not open the db '$dbname'");
mysqli_query($connect,"set names utf8");
$curTime = microtime(true);
$time1 = date('H:i:s');

 // Įdedant po vieną
/*for($i=0;$i<100000;$i++){
    mysqli_query($connect,'insert into Contracts ( text,number) values ("test",5)');
}*/
// Įdedant porcijomis
for($i=0;$i<100;$i++){
    mysqli_query($connect,'insert into Contracts (text,number) select "test",5 from JobsRegister limit 1000;');
}
$time2 = date('H:i:s');
echo $time1;
echo '<br>';
echo $time2;
echo '<br>';
$timeConsumed = round(microtime(true) - $curTime,3)*1000;
$start_date = new DateTime($time1);
$since_start = $start_date->diff(new DateTime($time2));
echo $since_start->i.' minutes<br>';
echo $since_start->s.' seconds<br>';
echo $timeConsumed;
?>

