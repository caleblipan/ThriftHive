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
        <div class="row" style="background: #f7f7f7; height: 100vh;">
            <div class="center-col-12 row">
                <div class="center-col-12">
                    <form action="create-shop.php" method="POST" class="login-form" id="daftar-form">
                        <h1>Create a shop.</h1>
                        <!-- Username -->
                        <div class="txtb" style="margin-bottom: 8px">
                            <input type="text" name="shopTitle" required>
                            <span data-placeholder="Shop Title" style="font-family: 'Varela Round', sans-serif;"></span>
                        </div>
                        <br>
                        <input type="submit" class="logbtn" name="create-shop" value="CREATE">
                    </form>
                </div>
            </div>
        </div>
        <script src="scripts/jquery-3.5.1.min.js" async></script>
        <script src="scripts/scripts.js" async></script>
    </body>
</html>