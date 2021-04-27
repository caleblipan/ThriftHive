<?php
    session_start();
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
                    <a href="browse"><li>Browse Products</li></a>
                    <a href="account"><li>Account</li></a>
                    <a href="logout.php"><li>Logout</li></a>
                </ul>
            </div>
        </nav>
        <div class="row">
            <div class="col-12 jumbotron row">
                <div class="col-7">
                <h1>START BUYING.</h1>
                <a href="create-account"><button><i class="fa fa-arrow-right"></i>SHOP NOW</button></a>
                </div>
            </div>
            <div class="col-12 wrapper">
                <h2>Recommended Sellers.</h2>
                <p style="text-align: center">Shop new and vintage boutiques from the best sellers.</p>
                <div class="row">
                            <?php
                                require("../../connection.php");    
                    
                                $base = "shop/index.php";

                                $sql ="SELECT * FROM Shops";
                                $result = $con->query($sql);

                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        $query_data = Array(
                                                "shoptitle" => $row["ShopTitle"]
                                        );
                                        $url = $base. "?".http_build_query($query_data);
                                        
                                        echo "
                                        <div class='col-3'>
                                            <a href='".$url."'><img src='styles/4.jpg' style='width: 100%; height: 221.8px; object-fit: cover;'>
                                            <p style='font-size: 16px; font-weight: bold; text-align: center;'>".$row["ShopTitle"]."</p></a>
                                            
                                        </div>
                                        ";
                                    }
                                }
                            ?>
                </div>
            </div>
        </div>
    </body>
</html>