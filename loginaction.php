<?php
session_start();
include('conn.php');

// Untuk debugging selama pengembangan:
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $katalaluan = filter_var($_POST['katalaluan'], FILTER_SANITIZE_STRING);

    if ($email != '' && $katalaluan != '') {
        // Gunakan prepared statement untuk keamanan
        $stmt = $conn->prepare("SELECT * FROM mra_staff WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if ($katalaluan === $row['password']) {
                $_SESSION['name'] = $row['name'];
                $_SESSION['position'] = $row['position'];
                header("Location: dashboard.php");
                exit;
            } else {
                $error = "Incorrect password.";
            }
        } else {
            $error = "Email not found.";
        }

        $stmt->close();
        $conn->close();
    } else {
        $error = "Please fill in all fields.";
    }
}
?>

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

<?php if (isset($error)): ?>
<script>
    Swal.fire({
        text: "<?php echo $error; ?>",
        icon: "warning"
    }).then(() => {
        window.location = "indexlogin.php";
    });
</script>
<?php endif; ?>

</body>
</html>