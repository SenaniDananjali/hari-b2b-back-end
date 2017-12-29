<?php
/**
 * User: senani
 * Date: 12/27/17
 * Time: 9:32 AM
 */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hairb2b";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if($conn === false){
  die("ERROR: Could not connect. " . $conn->connect_error);
}

$details = "SELECT id , profile_id, image_path FROM gallery";

$result = $conn->query($details);
header('Content-Type: application/json', true, 200);
header('Access-Control-Allow-Origin: *',true,200);
header('charset: utf-8',true,200);
$rst = array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $myObj = new stdClass();
        $myObj->id =  $row["id"];
        $myObj->profile_id = $row["profile_id"];
        $imagedata = file_get_contents($row["image_path"]);
        $base64 = base64_encode($imagedata);
        $myObj->image_path=$base64;

        array_push($rst, $myObj);

      }
      // echo  implode(" ",$rst);
      $myJSON = json_encode($rst);

      echo $myJSON;
  } else {
      echo "0 results";
  }

$conn->close();
?>
