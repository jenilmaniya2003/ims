<?php
$con = mysqli_connect("localhost", "root", "", "ims");
   if(!$con)
   {
	   echo "Connection Fail".mysqli_error();
   }
   else
   {
	//	echo "Connection Established";
   }
?>