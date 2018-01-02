<?php
/**
 * User: senani
 * Date: 02/01/2018
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

$details = "SELECT bd.stylist_id as stylist, bd.date as busy , ts.slot as slot FROM busyDates bd, timeSlot ts
    WHERE bd.time_slot_id= ts.id";

$result = $conn->query($details);
header('Content-Type: application/json', true, 200);
header('Access-Control-Allow-Origin: *',true,200);
header('charset: utf-8',true,200);
$rst = array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $myObj = new stdClass();
        $myObj->stylist =  $row["stylist"];
        $myObj->busy = $row["busy"];
        $myObj->slot = $row["slot"];

        array_push($rst, $myObj);
        // echo json_encode($myObj);
    }
    // echo  implode(" ",$rst);
    $myJSON = json_encode($rst);

    echo $myJSON;
} else {
    echo "0 results";
}

$conn->close();
?>
