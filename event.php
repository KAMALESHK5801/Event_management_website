<?php
$your_name = isset($_POST['your_name']) ? $_POST['your_name'] ??'' : '';
$your_event = isset($_POST['your_event']) ? $_POST['your_event'] ?? '' : '';
$date = isset($_POST['date']) ? $_POST['date'] ?? ' ': '';
$location = isset($_POST['location']) ? $_POST['location'] ?? '' : '';
$formtype = isset ($_POST['formtype']) ? $_POST['formtype'] : '' ;




$con = mysqli_connect("localhost", "root", "", "myevent");

if ($con->connect_error) {
    die("Connection failed: " .mysqli_connect_error());
}

$sql = "INSERT INTO your_event (User_name, User_event, Event_date, Event_location)
        VALUES ('$your_name', '$your_event', '$date', '$location')"; 

if ($formtype == 'insert') {
       $sql = "INSERT INTO your_event (User_name, User_event, Event_date, Event_location)
        VALUES ('$your_name', '$your_event', '$date', '$location')";

      if (mysqli_query($con, $sql)) {
        header("Location: event-details.html");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
} 

 




$con->close();
?>