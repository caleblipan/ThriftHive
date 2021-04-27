<?php
require("../../connection.php");

if(isset($_POST['login'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    // If one of the form fields is empty
    if(empty($username) || empty($password)) {
        
        header("location: index.html?error=emptyfields");
        exit();
    } else {
        $sql ="SELECT userID, username, password FROM Buyers WHERE username = ?"; // Use '?' to avoid SQL injection
        $stmt = mysqli_prepare($con, $sql);
        
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_store_result($stmt);
        
        if (mysqli_stmt_num_rows($stmt) == 1) {
            mysqli_stmt_bind_result($stmt, $userID, $user, $hashedPassword);
            
            if (mysqli_stmt_fetch($stmt)) {
                if (password_verify($password, $hashedPassword)) {
                    session_start();

                    $_SESSION['loggedIn'] = true;
                    $_SESSION['userID'] = $userID;
                    $_SESSION['username'] = $user;

                    header("Location: ../../buyer/dashboard/index.php");
                    exit();
                } else {
                    header("location: index.html?error=incorrectpass");
                    exit();
                }
            }
        } else {
            echo "Something went wrong. Please try again later.";
            echo mysqli_stmt_num_rows($stmt);
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
else{
    exit();
}