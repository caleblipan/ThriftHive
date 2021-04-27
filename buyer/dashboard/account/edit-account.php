<?php
require("../../../connection.php");

session_start();
$sellerID = $_SESSION['userID'];

if(isset($_POST['edit-account'])) {
    
    $fullName = $_POST['fullName'];
    $username = $_POST['username'];
    $photo = $_FILES['photo']['name'];
    $email = $_POST['email'];
    
    move_uploaded_file($_FILES['photo']['tmp_name'], './'.$photo);
    
    $sql ="UPDATE Buyers SET FullName = ?, username = ?, photo = ?, email = ? WHERE userID = ?"; // Use '?' to avoid SQL injection
    $stmt = mysqli_prepare($con, $sql);
            
    mysqli_stmt_bind_param($stmt, "ssssi", $fullName, $username, $photo, $email, $sellerID);
    mysqli_stmt_execute($stmt);
    
    $_SESSION["username"] = $username;
                
    header("Location: ./");
    exit();
    
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
else{
    exit();
}