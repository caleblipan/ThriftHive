  <?php
	session_start();

    // Set logged-in state to false 
    $_SESSION["loggedIn"] = false;

    // Remove the username in the 'username' session variable
	unset($_SESSION["username"]);
	
    // No need to set session_destroy()
    // Redirect to /index.html (home page)
    header("Location: ../../index.html");
?>