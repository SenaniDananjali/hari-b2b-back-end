<?php
/**
 * Created by PhpStorm.
 * User: eyepax-senani
 * Date: 12/27/17
 * Time: 9:32 AM
 */

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
  if($conn === false){

      die("ERROR: Could not connect. " . $conn->connect_error);

  }

$sql = "SELECT id, description FROM skill";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Skill: " . $row["description"];
    }
} else {
    echo "0 results";
}
$conn->close();
?>
<!--$id = mysqli_real_escape_string($conn, $_REQUEST['$id']);-->
<!--$skill=mysqli_real_escape_string($conn, $_REQUEST['$skill']);-->
<!---->
<!--echo $name;-->
<!--echo $skill;-->