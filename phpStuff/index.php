<?php
include_once "header.php"
?>
        <!-- Main Page Content -->
        </div>
        <?php
        if (isset($_SESSION["useruid"])){
            echo "<p class='welcomeBanner'>Howdy  ".$_SESSION['useruid'] ."! Ready To go to the Next Level?"; "</p>";
        }
        ?>
        <div class="wrapper">
            <h1>A Level of Security you can Rely on.</h1>
           
            <div class="container">
                <div class="heroImage">Insert Some Image here</div>
            </div>
           
            <div class="middle">
                <p>Your digital journey is unique, and so is our approach. Join us in the pursuit of a safer digital world. Because when it comes to your security, we don't just meet expectations; we redefine them."</p>
            </div>
        <div class="middle">
            <h2>Curious on how we do what we do best? Here are some of our most popular features that are used even by the biggest companies in 2023</h2>
        </div>
        <div class="products">
                <div class="feature-1">Feature 1
                    <img src="./images/security camera.jpg" alt="A security camera" width="250"> 
                </div>
                <div class="feature-1">Feature 2
                    <img src="./images/database img.jpg" alt="A database" width="250">
                </div>
                <div class="feature-1">Feature 3</div>
        
        </div>


<?php
include_once "footer.php"
?>
