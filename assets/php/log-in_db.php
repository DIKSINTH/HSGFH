<?php
// 1. Database connection
$servername = "localhost";
$username = "root";       // Replace with your DB username
$password = "";           // Replace with your DB password
$dbname = "HSGFH";        // Replace with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Get the username, email, and password from the user input (e.g., from a form)
 // assuming you're sending it from a form using POST method
$email = $_POST['email'];
$password = $_POST['password'];

// 3. Prepare SQL queries to check if the Name or Email already exists
$sql_check_email = "SELECT * FROM users WHERE Email = ?";
$sql_check_password = "SELECT * FROM users WHERE Password = ?";

// Prepare and bind the name check query
$stmt_email = $conn->prepare($sql_check_email);
$stmt_email->bind_param("s", $email);

// Prepare and bind the email check query
$stmt_password = $conn->prepare($sql_check_password);
$stmt_password->bind_param("s", $password);

// 4. Execute the name check query
$stmt_email->execute();
$stmt_email->store_result();  // Store result of name check

// 5. Execute the email check query
$stmt_password->execute();
$stmt_password->store_result();  // Store result of email check

// 6. Check if the Name or Email already exists
if ($stmt_email->num_rows > 0 && $stmt_password->num_rows > 0) {
    echo "<script>alert('Log-in Successful');</script>";
    header("Refresh:0.1;URL=../html/home.html"); // Redirect to the sign-in page
    exit();  // Stop further execution of the script
} else {
    // After successful insertion, redirect the user to the home page
    echo "<script>alert('Incorrect Email or Password');</script>"; 
    header("Refresh:0.1;URL=log-in.php");// Redirect to the home page
    exit(); // Ensure no further code is executed after the redirect
}

// 8. Close the statements and connection
$stmt_name->close();
$stmt_email->close();
$stmt_insert->close();
$conn->close();
?>
