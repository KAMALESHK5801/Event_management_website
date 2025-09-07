<?php
$con = mysqli_connect("localhost", "root", "", "myevent");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Update booking
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['User_name'];
    $event = $_POST['User_event'];
    $date = $_POST['Event_date'];
    $location = $_POST['Event_location'];

    $sql = "UPDATE your_event SET 
            User_name = '$name', 
            User_event = '$event', 
            Event_date = '$date', 
            Event_location = '$location'
            WHERE id = $id";

    if (mysqli_query($con, $sql)) {
        echo '<script>alert("Event updated successfully"); window.location.href = "manage_booking.php";</script>';
        exit();
        
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    
    $sql = "DELETE FROM your_event WHERE id = $id";
    
    if (mysqli_query($con, $sql)) {
        echo '<script>alert("Event deleted successfully"); window.location.href = "manage_booking.php";</script>';
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Bookings</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f1e7e7;
      font-family: Arial, sans-serif;
      padding: 40px;
    }
    .container{
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
      padding: 40px;
    }
    .card {
      width: 300px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      padding: 20px;
      margin-bottom: 20px;
      transition: transform 0.3s;
    }
    .card:hover {
      transform: translateY(-5px);
      background-color:rgb(243, 212, 212);
    }
    h1 {
      text-align: center;
      color: #bd3a12;
    }
    .close-btn{
      display: flex;
      flex-direction; row;
      gap: 30px;
    }
    .back-btn {
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      margin: 20px auto;
      display: block;
    }
  </style>
</head>
<body>

<h1>All Bookings</h1>
<div class='container'>
<?php
$sql = "SELECT * FROM your_event ORDER BY id DESC";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($r = mysqli_fetch_assoc($result)) {
        echo " 
           <div class='card'>
            <h4 class='text-center pb-3'>{$r['User_name']}</h4>
            <p><strong>Event:</strong> {$r['User_event']}</p>
            <p><strong>Date:</strong> {$r['Event_date']}</p>
            <p><strong>Location:</strong> {$r['Event_location']}</p>

            <div class='close-btn'>
            <button class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#editModal{$r['id']}'>Edit</button>
          
            <a href='manage_booking.php?delete={$r['id']}' class='btn btn-danger' 
           onclick='return confirm(\"Are you sure you want to delete this booking?\")'>Delete</a>
           </div>
            </div>
         ";

        // Edit form
        echo "
        <div class='modal fade' id='editModal{$r['id']}' tabindex='-1' aria-labelledby='editModalLabel{$r['id']}' aria-hidden='true'>
          <div class='modal-dialog'>
            <div class='modal-content'>
              <form method='post' style=background-color:#f1e7e7; class='rounded'>
                <div class='modal-header'>
                  <h5 class='modal-title text-center' id='editModalLabel{$r['id']}'>Edit Booking</h5>
                  <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>

                <div class='modal-body'>
                  <input type='hidden' name='id' value='{$r['id']}'>
                  <div class='mb-3'>
                    <label>Name</label>
                    <input type='text' name='User_name' class='form-control' value='{$r['User_name']}' required>
                  </div>

                  <div class='mb-3'>
                    <label>Event</label>
                    <input type='text' name='User_event' class='form-control' value='{$r['User_event']}' required>
                  </div>

                  <div class='mb-3'>
                    <label>Date</label>
                    <input type='date' name='Event_date' class='form-control' value='{$r['Event_date']}' required>
                  </div>

                  <div class='mb-3'>
                    <label>Location</label>
                    <input type='text' name='Event_location' class='form-control' value='{$r['Event_location']}' required>
                  </div>
                </div>

                <div class='modal-footer'>
                  <button type='submit' name='update' class='btn btn-primary'>Update</button>
                  <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                </div>
              </form>
            </div>
          </div>
        </div>";
    }
} else {
    echo "<p>No bookings found.</p>";
}
?>
</div>
<button onclick="window.location.href='event-details.html'" class="back-btn btn-danger">Back to Home</button>

<!-- Bootstrap Bundle JS (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
