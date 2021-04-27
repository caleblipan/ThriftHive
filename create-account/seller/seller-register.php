<?php
require("../../connection.php");

if(isset($_POST['register'])) {
    
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // If one of the form fields is empty
    if(empty($email) || empty($username) || empty($password)) {
        
        header("location: index.html?error=emptyfields");
        exit();
    } else if (strlen($password) < 10) {
        header("Location: index.html?error=passwordlength");  
    } else {
        $sql ="INSERT INTO Sellers (email, username, password) VALUES (?, ?, ?)"; // Use '?' to avoid SQL injection
        $stmt = mysqli_prepare($con, $sql);
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            
        mysqli_stmt_bind_param($stmt, "sss", $email, $username, $hashedPassword);
        mysqli_stmt_execute($stmt);
        
        
        $sql ="SELECT userID FROM Sellers WHERE username = ?"; // Use '?' to avoid SQL injection
        $stmt = mysqli_prepare($con, $sql);
        
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_store_result($stmt);
        
        if (mysqli_stmt_num_rows($stmt) == 1) {
            mysqli_stmt_bind_result($stmt, $userID);
            
            if (mysqli_stmt_fetch($stmt)) {
                session_start();

                $_SESSION['loggedIn'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['userID'] = $userID;
            }
        }
                
        header("Location: ../../seller/dashboard/index.php");
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
else{
    exit();
}