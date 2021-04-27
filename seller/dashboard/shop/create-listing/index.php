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
                <div class="col-7" style="background: inherit; box-shadow: 0 0 0">
                    <div class="col-12" style="padding: 42px 36px; background: white; box-shadow: 0 2.5px 10px rgba(0, 0, 0, 0.05)">
                        <form action="create-listing.php" method="POST" enctype="multipart/form-data">
                            <h2 style="margin-top: 0">Create a new listing.</h2>
                            <!-- Item Name -->
                            <label>Item Name</label>
                            <input type="text" name="itemName" id="itemName" required>
                            <br>
                            <!-- Item Caption -->
                            <label>Item Caption</label>
                            <textarea name="itemCaptions" id="itemCaptions" required></textarea>
                            <br>
                            <label>Upload a photo of the product:</label>
                            <input type="file" id="photo" name="photo">
                            <!-- Product Quantity -->
                            <label>Product Quantity in Stock</label>
                            <input type="number" id="productQuantity" name="productQuantity" required>
                            <!-- Product Price -->
                            <label>Product Price</label>
                            <input type="number" id="productPrice" name="productPrice" required>
                            <br>
                            <!-- Shipping Cost -->
                            <label>Shipping Cost</label>
                            <input type="number" id="shippingCost" name="shippingCost" required>
                            <br><br>
                            <input type="submit" class="logbtn" name="create-listing" value="CREATE">
                        </form>
                    
                    </div>
                </div>
                <div class="col-5" style="background: inherit; box-shadow: 0 0 0">
                    <div class="col-12" style="padding: 42px 36px; background: white; box-shadow: 0 2.5px 10px rgba(0, 0, 0, 0.05)">
                        <h2 style="margin-top: 0">Preview</h2>
                        <p class="itemName" style="font-weight: bold"></p>
                        <p class="itemCaptions"></p>
                        <img class="photo" />
                        <br>
                        <br>
                        <span>Quantity: </span><span class="productQuantity"></span>
                        <br>
                        <br>
                        <span>Price: Rp </span><span class="productPrice"></span>
                        <br>
                        <br>
                        <span>Shipping Cost: Rp </span><span class="shippingCost"></span>
                    </div>
                </div>
            </div>
        </div>
        <script src="scripts/jquery-3.5.1.min.js" async></script>
        <script src="scripts/scripts.js" async></script>
    </body>
</html>