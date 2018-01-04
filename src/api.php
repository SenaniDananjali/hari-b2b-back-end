<?php
/**
 * User: senani
 * Date: 12/27/17
 * Time: 9:32 AM
 */
 include_once("../config/dbconfig.php");
 header('Content-Type: application/json', true, 200);
 header('Access-Control-Allow-Origin: *',true,200);
 header('charset: utf-8',true,200);

function getPorfilePic(){
  //-------------connection set up-----------
  $dbconfig = new dbconfig;
  $con = ($dbconfig -> connection());
  //-------------connection set up-----------

  $details = "SELECT id , profile_id, image_path FROM gallery";
  $result = $con->query($details);

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

  $con->close();
}
function getBusyDates(){
  //-------------connection set up-----------
  $dbconfig = new dbconfig;
  $con = ($dbconfig -> connection());
  //-------------connection set up-----------

  $details = "SELECT bd.stylist_id as stylist, bd.date as busy , ts.slot as slot FROM busyDates bd, timeSlot ts
      WHERE bd.time_slot_id= ts.id";

  $result = $con->query($details);
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

  $con->close();
}
function getPreferredLocations(){
  //-------------connection set up-----------
  $dbconfig = new dbconfig;
  $con = ($dbconfig -> connection());
  //-------------connection set up-----------

  $details = "SELECT stylist.id as sty_id, locations.city  as loc FrOM stylist, preferredLocations, locations
  WHERE preferredLocations.stylist_id = stylist.id && preferredLocations.location_id = locations.id ";

  $result = $con->query($details);
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
}
function getSkills(){
  //-------------connection set up-----------
  $dbconfig = new dbconfig;
  $con = ($dbconfig -> connection());
  //-------------connection set up-----------

  $details = "SELECT id , description FROM skills";

  $result = $con->query($details);
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

}
function getStylistDetails(){
  //-------------connection set up-----------
  $dbconfig = new dbconfig;
  $con = ($dbconfig -> connection());
  //-------------connection set up-----------

  $details = "SELECT id,first_name, last_name, description FROM stylist";

  $result = $con->query($details);
  $rst = array();

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $myObj = new stdClass();
          $myObj->id =  $row["id"];
          $myObj->first_name =  $row["first_name"];
          $myObj->last_name =  $row["last_name"];
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
}
function getStylistSkills(){
  //-------------connection set up-----------
  $dbconfig = new dbconfig;
  $con = ($dbconfig -> connection());
  //-------------connection set up-----------

  $details = "SELECT stylist.id as sty, stylist.description as des , skills.description as skill FrOM stylist, stylistSkillMapping, skills
     WHERE stylistSkillMapping.skill_id = skills.id && stylist.id = stylistSkillMapping.stylist_id";

 $result = $con->query($details);
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

 $con->close();
}

//--------------call functions-----------------
if(function_exists($_GET['f'])){
  $_GET['f']();
}


//getPorfile($con);
?>
