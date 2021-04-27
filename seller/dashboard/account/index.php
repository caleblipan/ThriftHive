<?php
    require("../../../connection.php");

    session_start();

    $username = $_SESSION["username"];
                    
    $sql ="SELECT email, FullName, Photo FROM Sellers WHERE username = ?"; // Use '?' to avoid SQL injection
    $stmt = mysqli_prepare($con, $sql);

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) == 1) {
        mysqli_stmt_bind_result($stmt, $email, $fullName, $photo);

        if (mysqli_stmt_fetch($stmt)) {
            $_SESSION["email"] = $email;
            $_SESSION["fullName"] = $fullName;
            $_SESSION["photo"] = $photo;
        }
    }
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
                    <a href=".."><li>Dashboard</li></a>
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
                        <h2 style="margin-top: 0">Your Account:</h2>
                        <img class="photo" src="<?php echo $_SESSION["photo"] ?>" style="width: 150px;" />
                        <p class="itemName" style="font-weight: bold; font-size: 20px"><?php echo $_SESSION["fullName"] ?></p>
                        <p class="itemName" style="font-weight: bold"><?php echo $_SESSION["username"]; ?></p>
                        <p class="itemCaptions"><?php echo $_SESSION["email"]; ?></p>
                        <span class="seller"></span>
                    </div>
                </div>
                <div class="col-7" style="background: inherit; box-shadow: 0 0 0">
                    <div class="col-12" style="padding: 42px 36px; background: white; box-shadow: 0 2.5px 10px rgba(0, 0, 0, 0.05)">
                        <form action="edit-account.php" method="POST" enctype="multipart/form-data">
                            <h2 style="margin-top: 0">Edit Account</h2>
                            <!-- Full Name -->
                            <label>Full Name</label>
                            <input type="text" name="fullName" id="fullName" value="<?php echo $_SESSION["fullName"] ?>" required>
                            <br>
                            <label>Username</label>
                            <input type="text" name="username" id="username" value="<?php echo $_SESSION["username"] ?>" required>
                            <br>
                            <label>Upload a profile picture:</label>
                            <input type="file" id="photo" name="photo">
                            <!-- Item Caption -->
                            <label>Change Email Address</label>
                            <input type="email" name="email" id="email" value="<?php echo $_SESSION["email"] ?>" required>
                            <br>
                            <br><br>
                            <input type="submit" class="logbtn" name="edit-account" value="SAVE">
                        </form>
                    
                    </div>
                </div>
            </div>
        </div>
        <script src="scripts/jquery-3.5.1.min.js" async></script>
        <script src="scripts/scripts.js" async></script>
    </body>
</html>