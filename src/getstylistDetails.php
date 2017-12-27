    <?php
    /**
     * User: senani
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

    $details = "SELECT id,first_name, last_name, description FROM stylist";

    $result = $conn->query($details);
    header('Content-Type: application/json', true, 200);
    header('Access-Control-Allow-Origin: *',true,200);
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

        }

        $myJSON = json_encode($rst);

        echo $myJSON;
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
