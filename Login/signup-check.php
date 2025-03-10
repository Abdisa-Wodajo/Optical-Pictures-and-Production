<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name'])) {

    function validate($data){
        return htmlspecialchars(stripslashes(trim($data)));
    }

    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);
    $name = validate($_POST['name']);

    if (empty($email)) {
        header("Location: signup.php?error=Email is required");
        exit();
    } else if (empty($pass)) {
        header("Location: signup.php?error=Password is required");
        exit();
    } else if (empty($name)) {
        header("Location: signup.php?error=Name is required");
        exit();
    } else {
        // Check if email already exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE user_name = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            header("Location: signup.php?error=The email is already taken");
            exit();
        } else {
            // Hash the password
            $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

            // Insert the user
            $stmt = $conn->prepare("INSERT INTO users (user_name, password, name) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $email, $hashed_pass, $name);

            if ($stmt->execute()) {
                header("Location: signup.php?success=Your account has been created successfully");
                exit();
            } else {
                header("Location: signup.php?error=Unknown error occurred");
                exit();
            }
        }
    }
} else {
    header("Location: signup.php");
    exit();
}
?>
