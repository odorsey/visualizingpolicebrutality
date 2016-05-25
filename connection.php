<?php
   $host = "localhost";
   $username = "[secretusername]";
   $dbname = "[secretdbname]";
   $pass = "[secretpassword]";
   $db = mysqli_connect($host,$username,$pass,$dbname);
   if (mysqli_connect_errno())  {
     echo "Can't connect, alas. :( " . "<br>" . mysqli_connect_error();
     exit();
   }

?>
