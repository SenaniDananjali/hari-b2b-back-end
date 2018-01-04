<?php
/**
 * User: senani
 * Date: 12/27/17
 * Time: 9:32 AM
 */
 include_once("../config/dbconfig.php");
 $dbconfig = new dbconfig;
 $con = ($dbconfig -> connection());

$details = "SELECT id , description FROM skills";

$result = $con->query($details);
header('Content-Type: application/json', true, 200);
header('Access-Control-Allow-Origin: *',true,200);
header('charset: utf-8',true,200);
$rst = array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $myObj = new stdClass();
        $myObj->id =  $row["id"];
        $myObj->description = $row["description"];

        array_push($rst, $myObj);
        // echo json_encode($myObj);
    }
    // echo  implode(" ",$rst);
    $myJSON = json_encode($rst);

    echo $myJSON;
} else {
    echo "0 results";
}

$con->close();
?>
