<?php
/*Local connection
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME','isuranyayo');*/

//Remote connection
define('DB_SERVER','bx0patvgx3ikmahu7ich-mysql.services.clever-cloud.com');
define('DB_USER','uo9xjjfpm8tdrnbl');
define('DB_PASS' ,'uo9xjjfpm8tdrnbl');
define('DB_NAME','bx0patvgx3ikmahu7ich');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
