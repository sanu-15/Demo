<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starbucks Registration</title>
    <link rel="stylesheet" href="insert.css">
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
        <a href="Logout.php">Logout</a>
        <a href="Thankyou.php">Thank You</a>
    </center>
    <hr>
    <center><h2>Registration</h2></center>
    <hr>
    <center>
        <form method="post" action="insert.php">
            <table border="3">
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td><input type="date" name="dob" required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" required></td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td><input type="number" name="phone" required></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" name="address" required></td>
                </tr>
                <tr>
                    <td>Create a Username</td>
                    <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <td>Create a Password</td>
                    <td><input type="password" name="password" required></td>
                </tr>
            </table>
            <center><button type="submit">Submit</button></center>
        </form>
    </center>
    <hr>
    <center><footer><strong>Copyright &COPY; 2024. All Rights Reserved by Starbucks Coffee</strong></footer></center>
</body>
</html>

<?php
// Include database connection
include 'db.php';

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $dob = htmlspecialchars($_POST['dob']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password

    // Prepare SQL statement
    $s = $conn->prepare("INSERT INTO users (name, dob, email, phone, address, username, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $s->bind_param("sssssss", $name, $dob, $email, $phone, $address, $username, $password);

    // Execute the query
    if ($s->execute()) {
        echo "Record inserted successfully.";
        header("Location: Login.php");
        exit(); // Stop further execution
    } else {
        echo "Error inserting record: " . $s->error;
        header("Location: insert.php");
        exit(); // Stop further execution
    }

    // Close the statement
    $s->close();
}

// Close the database connection
$conn->close();
?>


