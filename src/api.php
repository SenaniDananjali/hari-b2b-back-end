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
function getJobRole(){
  //-------------connection set up-----------
  $dbconfig = new dbconfig;
  $con = ($dbconfig -> connection());
  //-------------connection set up-----------

  $details = "SELECT  stylist.id as sty ,jobRole.role as job from jobRole,stylist
  WHERE jobRole.id =stylist.job_role";
  $result = $con->query($details);

  $rst = array();

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $myObj = new stdClass();
          $myObj->sty_id =  $row["sty"];
          $myObj->job = $row["job"];
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
function job(){
  //-------------connection set up-----------
  $dbconfig = new dbconfig;
  $con = ($dbconfig -> connection());
  //-------------connection set up-----------

  $details = "SELECT jobRole.role as job FROM jobRole";
  $result = $con->query($details);

  $rst = array();

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $myObj = new stdClass();
          $myObj->job = $row["job"];
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
function locationForSearch(){
  //-------------connection set up-----------
  $dbconfig = new dbconfig;
  $con = ($dbconfig -> connection());
  //-------------connection set up-----------

  $details = "SELECT locations.city as city FROM locations";
  $result = $con->query($details);

  $rst = array();

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $myObj = new stdClass();
          $myObj->city = $row["city"];
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
function getFullDetails(){
  //-------------connection set up-----------
  $dbconfig = new dbconfig;
  $con = ($dbconfig -> connection());
  //-------------connection set up-----------

  $details = "SELECT stylist.id as id, stylist.first_name as fname ,stylist.last_name as lname,jobRole.role as job,stylist.description as des,locations.city as loc ,skills.description as skill FROM stylist,locations,preferredLocations,skills,stylistSkillMapping,jobRole
  WHERE stylist.id=preferredLocations.stylist_id && locations.id=preferredLocations.location_id &&skills.id =stylistSkillMapping.skill_id &&stylistSkillMapping.stylist_id=stylist.id && jobRole.id=stylist.job_role   ";

  $result = $con->query($details);
  $rst = array();

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $myObj = new stdClass();
          $myObj->sty_id =  $row["id"];
          $myObj->first_name =  $row["fname"];
          $myObj->last_name =  $row["lname"];
          $myObj->job =  $row["job"];
          $myObj->des =  $row["des"];
          $myObj->loc =  $row["loc"];
          $myObj->skill =  $row["skill"];
          array_push($rst, $myObj);
      }
      $myJSON = json_encode($rst);
      echo $myJSON;
  } else {
      echo "0 results";
  }

  $con->close();

}
function getCharges($id){

$dbconfig = new dbconfig;
$con = ($dbconfig -> connection());
//-------------connection set up-----------

$details = "SELECT stylist.id as sty_id, timeSlot.slot as slot, chargePerSlot.charge as charge , chargePerSlot.currency as currency
FROM stylist, timeSlot,chargePerSlot
WHERE stylist.id = chargePerSlot.stylist_id && chargePerSlot.time_slot_id=timeSlot.id";
//-------------connection set up-----------;
$result = $con->query($details);

$rst = array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if($id==$row["sty_id"]){
      $myObj = new stdClass();
      $myObj->id = $row["sty_id"];
      $myObj->slot =  $row["slot"];
      $myObj->charge = $row["charge"];
      $myObj->currency = $row["currency"];
      array_push($rst, $myObj);
    }

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
function call(){
  if(function_exists($_GET['f'])){
    if(isset($_GET['id'])){
     $_GET['f']($_GET['id']) ;
     // echo $_GET['id'];
    }
    else {
    $_GET['f']();
    }

  }
}

call();

?>
