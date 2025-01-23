<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starbucks Login</title>
    <link rel="stylesheet" href="Login.css">
</head>
<body>
    <center>
        <img src="https://logos-download.com/wp-content/uploads/2016/03/Starbucks_Logo_1992.png" width="100" height="100">
    </center>
    <hr>
    <center><h1>Starbucks Coffee</h1></center>
    <hr>
    <center>
        <a href="Home.php">Home</a>
        <a href="About.php">About Us</a>
        <a href="Contact.php">Contact Us</a>
        <a href="Login.php">Login</a>
        <a href="insert.php">Registration</a>
        <a href="logout.php">Logout</a>
        <a href="Thankyou.php">Thank You</a>
    </center>
    <hr>
    <center>
        <form method="post" action="Login.php">
            <label>Username:</label>
            <input type="text" name="username" required><br>
            <label>Password:</label>
            <input type="password" name="password" required><br>
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </form>
    </center>
    <hr>
    <center><footer><strong>Copyright &COPY; 2024. All Rights Reserved by Starbucks Coffee</strong></footer></center>
</body>
</html>

<?php
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    include 'db.php';

    // Get the form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare a statement to validate the user's credentials
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Check if the user exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Set session variables
            $_SESSION['username'] = $username;

            // Redirect to the Home page
            header("Location: Home.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Invalid username.";
    }

    // Close the statement and the connection
    $stmt->close();
    $conn->close();
}
?>
