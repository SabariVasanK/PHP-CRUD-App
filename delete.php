<?php
include "config.php";

if(isset($_GET['id'])){
    $user_id = $_GET['id'];
    $sql = "DELETE FROM `guest` WHERE `id`='$user_id'"; // corrected SQL query

    $result = $conn->query($sql);
    if($result === TRUE){
        echo "Record Deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
<html>
<a class="btn btn-info" href="view.php">View</a>
</html>