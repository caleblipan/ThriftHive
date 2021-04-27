<?php
require("../../../connection.php");

session_start();
$sellerID = $_SESSION['userID'];
$shopTitle = $_SESSION['shopTitle'];
$shopID = $_SESSION['shopID'];

if(isset($_POST['checkout'])) {
    
    $listingID = $_POST['listingID'];
    $itemName = $_POST['itemName'];
    $totalPrice = $_POST['totalPrice'];
    $cardNumber = $_POST['cardNumber'];
    $expiryMM = $_POST['expiryMM'];
    $expiryYY = $_POST['expiryYY'];
    $cvv = $_POST['cvv'];
    $cardholderName = $_POST['cardholderName'];
    $productQuantity = $_POST['productQuantity'];

    // If one of the form fields is empty
    if(empty($cardNumber) || empty($expiryMM) || empty($expiryYY) || empty($cvv) || empty($cardholderName) || empty($productQuantity) ) {
        
        header("location: index.php?error=emptyfields");
        exit();
    } else {
        $sql ="INSERT INTO Transactions (listingID, itemName, totalPrice, cardNumber, expiryMM, expiryYY, cvv, cardholderName, productQuantity) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"; // Use '?' to avoid SQL injection
        $stmt = mysqli_prepare($con, $sql);
            
        mysqli_stmt_bind_param($stmt, "isisssssi", $listingID, $itemName, $totalPrice, $cardNumber, $expiryMM, $expiryYY, $cvv, $cardholderName, $productQuantity);
        mysqli_stmt_execute($stmt);
        
        
        $sql ="SELECT transactionID FROM Transactions WHERE cardholderName = ?"; // Use '?' to avoid SQL injection
        $stmt = mysqli_prepare($con, $sql);
        
        mysqli_stmt_bind_param($stmt, "s", $cardholderName);
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_store_result($stmt);
        
        if (mysqli_stmt_num_rows($stmt) == 1) {
            mysqli_stmt_bind_result($stmt, $transactionID);
            
            if (mysqli_stmt_fetch($stmt)) {
                header("Location: ./success/index.php?transactionid=".$transactionID);
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