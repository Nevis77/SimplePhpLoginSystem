<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Braxton Security</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/css-reset.css">
    <link rel="stylesheet" href="./css/style.css">
</head>



<body>
        <!--Nav-bar -->
        <nav class="navContainer">
                <a href="./index.php" class="navItem">Home</a>
                <a href="#" class="navItem">Our Services</a>
                <a href="#" class="navItem">Pricing</a>
                <a href="#" class="navItem">Contact Us</a>
                <?php
                // if user sessiom exists in the browser
                    if (isset($_SESSION["useruid"])) {
                        echo "<a href='./pricing.php' class='navItem'>Pricing</a>";
                        echo "<a href='./includes/logout.inc.php' class='navItem'>Log Out</a>";   
                    }
                    else{
                        echo "<a href='./sign-up.php' class='navItem'>Sign Up</a>";
                        echo "<a href='./login.php' class='navItem'>Log In</a>";   
                    }

                ?>
            </nav>
        
    <div class="wrapper">