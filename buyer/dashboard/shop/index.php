<?php
    session_start();

    $queryString = $_SERVER['QUERY_STRING'];
    parse_str($queryString, $output);

    $_SESSION["shopTitle"] = $output["shoptitle"];
    $shopTitle = $_SESSION["shopTitle"];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles/styles.css">
    </head>
    <body>
        <nav>
            <div class="col-2">
            <img src="styles/logo.png" style="width: 100%">
            </div>
            <div class="top-nav col-10">
                <ul style="list-style-type: none; float: right">
                    <a href=".."><li>Back to Dashboard</li></a>
                    <a href="browse"><li>Browse Products</li></a>
                    <a href="account"><li>Account</li></a>
                    <a href="logout.php"><li>Logout</li></a>
                </ul>
            </div>
        </nav>
        <div class="row">
            <div class="col-12 jumbotron row">
                <div class="col-7">
                <h1>Welcome to <br><?php echo $_SESSION["shopTitle"] ?></h1>
                </div>
            </div>
            <div class="col-12 wrapper">
                <h2>All listings</h2>
                <div class="row">
                            <?php
                                require("../../../connection.php");
                    
                                $sql ="SELECT shopID FROM Shops WHERE ShopTitle = ?"; // Use '?' to avoid SQL injection
                                $stmt = mysqli_prepare($con, $sql);

                                mysqli_stmt_bind_param($stmt, "s", $shopTitle);
                                mysqli_stmt_execute($stmt);

                                mysqli_stmt_store_result($stmt);

                                if (mysqli_stmt_num_rows($stmt) == 1) {
                                    mysqli_stmt_bind_result($stmt, $shopID);

                                    if (mysqli_stmt_fetch($stmt)) {
                                        $_SESSION["shopID"] = $shopID;
                                    }
                                }

                                $sql ="SELECT * FROM Listings WHERE shopID = ".$_SESSION["shopID"];
                                $result = $con->query($sql);
                    
                                $base = "../listing/index.php";

                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        $query_data = Array(
                                                "listingid" => $row["listingID"]
                                        );
                                        $url = $base. "?".http_build_query($query_data);
                                        echo "
                                        <div class='col-3'>
                                            <a href='".$url."' style='text-decoration: none'>
                                            <img src='".$row["photo"]."' style='width: 100%; height: 221.8px; object-fit: cover;'>
                                            <p style='font-size: 16px; font-weight: bold'>".$row["itemName"]."</p>
                                            <p style='font-size: 16px;'>".$row["itemCaptions"]."<p>
                                            <p style='font-size: 16px; font-weight: bold'>Qty:  ".$row["productQuantity"]."</p>
                                            <p style='font-size: 16px; font-weight: bold'>Rp ".$row["productPrice"]."</p>
                                            <p style='font-size: 16px; font-weight: bold'>Shipping: Rp ".$row["shippingCost"]."</p>
                                            </a>
                                        </div>
                                        ";
                                    }
                                }
                            ?>
                </div>
                <div class="row">
                </div>
            </div>
        </div>
    </body>
</html>