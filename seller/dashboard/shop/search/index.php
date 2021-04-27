<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title>
        <!-- Responsive Website -->
        <meta name="viewport" content="width=viewport-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="styles/styles.css">    
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    </head>
    <body>
        <div class="col-12 row">
            <div class="col-3">
                <div class="col-12">
                    <ul class="sidenav">
                        <a href=""><li class="active-btn">All Books</li></a>
                        <a href="add-books/index.php"><li>Add Books</li></a>
                        <a href="logout.php"><li>Log Out</li></a>
                    </ul>
                </div>
            </div>
            <div class="col-9">
                <div class="col-12">
                    <div class="col-12">
                        <form method="post" action="">
                            <div class="col-9">
                                <input type="text" name="search" style="width: 100%; height: 50px; border: 1px solid #eee;">
                            </div>
                            <div class="col-3">
                                <input type="submit" name="search" class="logbtn" value="Search">
                            </div>
                        </form>
                    </div>
                    <div class="col-12">
                        <table style="width: 100%">
                            <tr>
                                <th>Book ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Publication Year</th>
                            </tr>
                            <?php
                                require("../../connection.php");
                            
                                $title = $_GET["title"];

                                $sql ="SELECT * FROM CalebLipan_book WHERE Title LIKE '%".$title."'";
                                
                                $result = $con->query($sql);

                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "
                                        <tr>
                                            <td>".$row["Book_ID"]."</td>
                                            <td>".$row["Title"]."</td>
                                            <td>".$row["Author"]."</td>
                                            <td>".$row["Publication_Year"]."</td>
                                        <tr>
                                        ";
                                    }
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="scripts/jquery-3.5.1.min.js" async></script>
        <script src="scripts/scripts.js" async></script>
    </body>
</html>