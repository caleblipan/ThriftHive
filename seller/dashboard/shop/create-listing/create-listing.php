<?php
require("../../../../connection.php");

session_start();
$sellerID = $_SESSION['userID'];
$shopTitle = $_SESSION['shopTitle'];
$shopID = $_SESSION['shopID'];

if(isset($_POST['create-listing'])) {
    
    $itemName = $_POST['itemName'];
    $itemCaptions = $_POST['itemCaptions'];
    $photo = $_FILES['photo']['name'];
    $productQuantity = $_POST['productQuantity'];
    $productPrice = $_POST['productPrice'];
    $shippingCost = $_POST['shippingCost'];

    // If one of the form fields is empty
    if(empty($itemName) || empty($itemCaptions) || empty($photo) || empty($productQuantity) || empty($productPrice) || empty($shippingCost) ) {
        
        header("location: index.php?error=emptyfields");
        exit();
    } else {
		move_uploaded_file($_FILES['photo']['tmp_name'], '../'.$photo);
        $sql ="INSERT INTO Listings (shopID, itemName, itemCaptions, photo, productQuantity, productPrice, shippingCost) VALUES (?, ?, ?, ?, ?, ?, ?)"; // Use '?' to avoid SQL injection
        $stmt = mysqli_prepare($con, $sql);
            
        mysqli_stmt_bind_param($stmt, "isssiii", $shopID, $itemName, $itemCaptions, $photo, $productQuantity, $productPrice, $shippingCost);
        mysqli_stmt_execute($stmt);
                
        header("Location: ../index.php?shoptitle=".$shopTitle);
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
else{
    exit();
}