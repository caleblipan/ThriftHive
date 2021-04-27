<?php
require("../../../connection.php");

session_start();
$sellerID = $_SESSION['userID'];

if(isset($_POST['create-shop'])) {
    
    $shopTitle = $_POST['shopTitle'];

    // If one of the form fields is empty
    if(empty($shopTitle)) {
        
        header("location: index.html?error=emptyfields");
        exit();
    } else {
        $sql ="INSERT INTO Shops (sellerID, shopTitle) VALUES (?, ?)"; // Use '?' to avoid SQL injection
        $stmt = mysqli_prepare($con, $sql);
            
        mysqli_stmt_bind_param($stmt, "is", $sellerID, $shopTitle);
        mysqli_stmt_execute($stmt);
        
        
        $sql ="SELECT shopID FROM Shops WHERE shopTitle = ?"; // Use '?' to avoid SQL injection
        $stmt = mysqli_prepare($con, $sql);
        
        mysqli_stmt_bind_param($stmt, "s", $shopTitle);
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_store_result($stmt);
        
        if (mysqli_stmt_num_rows($stmt) == 1) {
            mysqli_stmt_bind_result($stmt, $shopID);
            
            if (mysqli_stmt_fetch($stmt)) {
                session_start();

                $_SESSION["shopTitle"] = $shopTitle;
                $_SESSION["shopID"] = $shopID;

                header("Location: ../shop/index.php?shoptitle=".$shopTitle);
                exit();
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
else{
    exit();
}