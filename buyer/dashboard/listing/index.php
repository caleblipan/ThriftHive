<?php
    session_start();

    $queryString = $_SERVER['QUERY_STRING'];
    parse_str($queryString, $output);

    $_SESSION["listingID"] = $output["listingid"];
    $listingID = $_SESSION["listingID"];
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
        <nav class="col-12" style="padding: 0;">
            <div class="col-2">
            <img src="styles/logo.png" style="width: 100%">
            </div>
            <div class="top-nav col-10">
                <ul style="list-style-type: none; float: right">
                    <a href="../browse"><li>Browse Products</li></a>
                    <a href="../account"><li>Account</li></a>
                    <a href="logout.php"><li>Logout</li></a>
                </ul>
            </div>
        </nav>
        <div class="row" style="background: #f7f7f7; height: 100%;">
            <div class="col-12 row">
                <div class="col-5" style="background: inherit; box-shadow: 0 0 0">
                    <div class="col-12" style="padding: 42px 36px; background: white; box-shadow: 0 2.5px 10px rgba(0, 0, 0, 0.05)">                            
                        <?php
                                require("../../../connection.php");
                    
                                $sql ="SELECT itemName, itemCaptions, Photo, productPrice, shippingCost FROM Listings WHERE listingID = ?"; // Use '?' to avoid SQL injection
                                $stmt = mysqli_prepare($con, $sql);

                                mysqli_stmt_bind_param($stmt, "i", $listingID);
                                mysqli_stmt_execute($stmt);

                                mysqli_stmt_store_result($stmt);

                                if (mysqli_stmt_num_rows($stmt) == 1) {
                                    mysqli_stmt_bind_result($stmt, $itemName, $itemCaptions, $photo, $productPrice, $shippingCost);

                                    mysqli_stmt_fetch($stmt);
                                }
                        ?>
                        <h2 style="margin-top: 0">Preview</h2>
                        <p class="itemName" style="font-weight: bold"><?php echo $itemName ?></p>
                        <p class="itemCaptions"><?php echo $itemCaptions ?></p>
                        <img class="photo" src="../shop/<?php echo $photo ?>" style="width: 150px"/>
                        <br>
                        <br>
                        <span>Price: Rp </span><span class="productPrice"><?php echo $productPrice ?></span>
                        <br>
                        <br>
                        <span>Shipping Cost: Rp </span><span class="shippingCost"><?php echo $shippingCost ?></span>
                        <br>
                        <br>
                        <br>
                        <span>Qty: 1</span>
                        <br>
                        <br>
                        <span>Total: Rp <?php echo $productPrice + $shippingCost ?></span>
                    </div>
                </div>
                <div class="col-7" style="background: inherit; box-shadow: 0 0 0">
                    <div class="col-12" style="padding: 42px 36px; background: white; box-shadow: 0 2.5px 10px rgba(0, 0, 0, 0.05)">
                        <form action="checkout.php" method="POST" enctype="multipart/form-data">
                            <h2 style="margin-top: 0">Checkout</h2>
                            <!-- Card Number -->
                            <label>Card Number</label>
                            <input type="text" name="cardNumber" id="card number" required>
                            <br>
                            <!-- Item Caption -->
                            <div class="col-12" style="padding: 0; margin-bottom: 20px">
                                <div class="col-6 row" style="padding: 0;">
                                    <div class="col-6" style="padding: 0 8px 0 0; ">
                                        <label>Expiry Date</label>
                                        <div class="col-6" style="padding: 0;">
                                            <select name='expiryMM' id='expireMM'>
                                                <option value=''>MM</option>
                                                <option value='01'>01</option>
                                                <option value='02'>02</option>
                                                <option value='03'>03</option>
                                                <option value='04'>04</option>
                                                <option value='05'>05</option>
                                                <option value='06'>06</option>
                                                <option value='07'>07</option>
                                                <option value='08'>08</option>
                                                <option value='09'>09</option>
                                                <option value='10'>10</option>
                                                <option value='11'>11</option>
                                                <option value='12'>12</option>
                                            </select> 
                                        </div>
                                        <div class="col-6" style="padding: 0;">
                                            <select name='expiryYY' id='expireYY'>
                                                <option value=''>YY</option>
                                                <option value='21'>21</option>
                                                <option value='22'>22</option>
                                                <option value='23'>23</option>
                                                <option value='24'>24</option>
                                                <option value='25'>25</option>
                                                <option value='26'>26</option>
                                                <option value='27'>27</option>
                                                <option value='28'>28</option>
                                                <option value='29'>29</option>
                                                <option value='30'>30</option>
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="col-6" style="padding: 0;">
                                        <label>CVV</label>
                                        <input type="nunber" name="cvv" id="cvv" required>
                                    </div>
                                </div>
                            </div>
                            <br>  
                            <!-- Cardholder Name -->
                            <label>Cardholder Name</label>
                            <input type="text" id="cardholderName" name="cardholderName" required>
                            <!-- Product Quantity -->
                            <label>Quantity</label>
                            <input type="number" id="productQuantity" name="productQuantity" required>
                            <input type="hidden" name="listingID" value="<?php echo $listingID ?>">
                            <input type="hidden" name="itemName" value="<?php echo $itemName ?>">
                            <input type="hidden" name="totalPrice" value="<?php echo $productPrice + $shippingCost ?>">
                            <br><br>
                            <input type="submit" class="logbtn" name="checkout" value="MAKE PAYMENT">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="scripts/jquery-3.5.1.min.js" async></script>
        <script src="scripts/scripts.js" async></script>
    </body>
</html>