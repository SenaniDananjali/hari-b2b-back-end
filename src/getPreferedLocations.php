<?php
/**
 * User: senani
 * Date: 01/03/17
 */
 include_once("../config/dbconfig.php");
 $dbconfig = new dbconfig;

 $con = ($dbconfig -> connection());

$details = "SELECT stylist.id as sty_id, locations.city  as loc FrOM stylist, preferredLocations, locations
WHERE preferredLocations.stylist_id = stylist.id && preferredLocations.location_id = locations.id ";

$result = $con->query($details);
header('Content-Type: application/json', true, 200);
header('Access-Control-Allow-Origin: *',true,200);
header('charset: utf-8',true,200);
$rst = array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $myObj = new stdClass();
        $myObj->sty_id =  $row["sty_id"];
        $myObj->loc = $row["loc"];
        array_push($rst, $myObj);
    }
    $myJSON = json_encode($rst);
    echo $myJSON;
} else {
    echo "0 results";
}

$con->close();
?>
