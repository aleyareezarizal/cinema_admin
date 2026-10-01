<?php include 'db.php'; ?>

<?php 

session_start(); // Start a new session or resume the existing session

// Admin login credentials are set as variable. Not stored in db

$error = "";

// Admin login form

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $userPass = $_POST["userPass"];

    // Check username and password against the users table 
    $sql = "SELECT * FROM users WHERE username = ? AND userPass = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $userPass);
    $stmt->execute(); 

    $result = $stmt->get_result();

    // Check if the entered credentials match the admin credentials
    if ($result->num_rows == 1) {
        // Set session variable to indicate successful login
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;

        // Redirect to home page to access database/table
        header("Location: index.php");
        exit();
    } else {

        // Invalid credentials, show an error message
        $error = "Username or password is incorrect. Try again.";
    }
}

?>

<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <head>
        <title>Admin Login</title>
        <link rel="stylesheet" href="login.css">
    </head>

    <body class="login-body">
        <div class="login-container">
            <h1>CINEMA ADMIN LOGIN</h1>

            <?php if ($error != "") { ?>

            <p class="error-message">
            <?php
                echo $error; // Display the error message
            ?>
            </p>

            <?php
                }
            ?>

            <form method="POST">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter username" required>

                <label for="password">Password</label>
                <input type="password" id="userPass" name="userPass" placeholder="Enter password" required>

                <button type="submit">Login</button>
            </form>
        </div>
    </body>
</html>