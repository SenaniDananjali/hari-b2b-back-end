<?php

include_once("../config/dbconfig.php");
header('Content-Type: application/json', true, 200);
header('Access-Control-Allow-Origin: *',true,200);
header('charset: utf-8',true,200);

   $img_url = "http://www.domain.com/images/";
   $dbconfig = new dbconfig;
   $con = ($dbconfig -> connection());
   //-------------connection set up-----------

   $result ="SELECT gallery_path FROM gallery";
   if ($result->num_rows > 0) {
       // output data of each row
       while($row = $result->fetch_assoc()) {

       echo '<img src="'.$img_url.$row['gallery_path'].'" />';
   }
 }

     $con->close();

?>
