<?php
/**
 * User: senani
 * Date: 12/29/17
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

$details = "SELECT stylist.id as sty, stylist.description as des , skills.description as skill FrOM stylist, stylistSkillMapping, skills
    WHERE stylistSkillMapping.skill_id = skills.id && stylist.id = stylistSkillMapping.stylist_id";

$result = $conn->query($details);
header('Content-Type: application/json', true, 200);
header('Access-Control-Allow-Origin: *',true,200);
header('charset: utf-8',true,200);
$rst = array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $myObj = new stdClass();
        $myObj->id =  $row["sty"];
        $myObj->skill = $row["skill"];
        $myObj->des = $row["des"];

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
