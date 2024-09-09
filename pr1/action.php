<?php
include_once("database.php");


$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$pass = isset($_POST['password']) ? $_POST['password'] : '';
$date = new DateTime("now", new DateTimeZone('Asia/Kolkata'));
$created_at = $date->format('Y-m-d H:i:s');
$status = 1;

// Check for empty fields
if (empty($name) || empty($email) || empty($phone) || empty($pass)) {
    echo "<script>alert('You forgot to fill in all the required fields.');</script>";
    exit;
}

// Check if email is already registered
$sql = "SELECT email FROM users_login WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "This email is already registered.";
} else {
    $insert_sql = "INSERT INTO users_login (name, email, phone, password, created_at, status) VALUES ('$name', '$email', '$phone', '$pass', '$created_at', $status)";
    
    if (mysqli_query($conn, $insert_sql)) {
        echo "Registration successful.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}



mysqli_close($conn);
?>
