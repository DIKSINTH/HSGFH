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
$name = $_POST['full-name'];  // assuming you're sending it from a form using POST method
$email = $_POST['email'];
$password = $_POST['password'];

// 3. Prepare SQL queries to check if the Name or Email already exists
$sql_check_name = "SELECT * FROM users WHERE Name = ?";
$sql_check_email = "SELECT * FROM users WHERE Email = ?";

// Prepare and bind the name check query
$stmt_name = $conn->prepare($sql_check_name);
$stmt_name->bind_param("s", $name);

// Prepare and bind the email check query
$stmt_email = $conn->prepare($sql_check_email);
$stmt_email->bind_param("s", $email);

// 4. Execute the name check query
$stmt_name->execute();
$stmt_name->store_result();  // Store result of name check

// 5. Execute the email check query
$stmt_email->execute();
$stmt_email->store_result();  // Store result of email check

// 6. Check if the Name or Email already exists
if ($stmt_name->num_rows > 0) {
    echo "<script>alert('Name already exists');</script>";
    header("Refresh:0.1;URL=../../sign-in.php"); // Redirect to the sign-in page
    exit();  // Stop further execution of the script
} elseif ($stmt_email->num_rows > 0) {
    echo "<script>alert('Email already exists');</script>";
    header("Refresh:0.1;URL=../../sign-in.php"); // Redirect to the sign-in page
    exit();  // Stop further execution of the script
} else {
    // If both Name and Email are unique, insert the new user
    $insert_sql = "INSERT INTO users (Name, Email, Password) VALUES (?, ?, ?)";
    $stmt_insert = $conn->prepare($insert_sql);
    $stmt_insert->bind_param("sss", $name, $email, $password);
    $stmt_insert->execute();
    
    // After successful insertion, redirect the user to the home page
    echo "<script>alert('Sign-up successful');</script>";
    header("Location: ../html/home.html"); // Redirect to the home page
    exit(); // Ensure no further code is executed after the redirect
}

// 8. Close the statements and connection
$stmt_name->close();
$stmt_email->close();
$stmt_insert->close();
$conn->close();
?>
