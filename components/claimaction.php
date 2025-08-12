<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mra Global</title>
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
    <script src="assets/js/sweetalert2.min.js"></script>
</head>
<body>
    
</body>
</html>
<?php
set_time_limit(0);
//error_reporting(E_NOTICE);
include('../conn.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dates = $_POST['date'];
    $purposes = $_POST['purpose'];
    $details = $_POST['details'];
    $amounts = $_POST['amount'];
    $noics = $_POST['noic'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO mra_claims (date, purpose, details, amount, noic) VALUES (?, ?, ?, ?, ?)");

    // Check if the statement was prepared successfully
    if ($stmt === false) {
        die('Prepare() failed: ' . htmlspecialchars($conn->error));
    }

    // Bind the parameters
    $stmt->bind_param("sssds", $date, $purpose, $detail, $amount, $noic); // "sssds" stands for string, string, string, double, string

    // Iterate through each set of input values and execute the statement
    foreach ($dates as $index => $date) {
        $purpose = $purposes[$index];
        $detail = $details[$index];
        $amount = $amounts[$index];
        $noic = $noics[$index];
        $stmt->execute();
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // echo "Records inserted successfully!";
}

?>

<script>
    Swal.fire({
    text: "Submit Successfull",
    icon: "warning"
    }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
        window.location = "claim";
        } 
    });
</script>
