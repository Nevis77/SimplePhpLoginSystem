<?php
include_once "header.php"
?>
        <!-- Main Page Content -->
    <section>
        <h2 class="signUp">Sign Up</h2>

            <form action="./includes/signup-inc.php" method="post" class="sign-up-form-form middle">
            <input type="text" name="name" placeholder="Full Name">
            <input type="text" name="email" placeholder="Email">
            <input type="text" name="uid" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <input type="password" name="pwdrepeat" placeholder="Confirm Password">
            <button type="submit" name="submit">Sign Up</button>
            </form>
            
            
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == "emptyinput"){
                    echo "<p class= 'errorMsg'>1 or More missing fields detected</p>";
                }
                else if($_GET["error"] == "invalidUid"){
                    echo "<p class= 'errorMsg'>Enter a proper Username</p>";
                }
                else if ($_GET["error"] == "invalidEmail"){
                    echo "<p class= 'errorMsg'>Enter a valid Email address</p>";
                }
                else if ($_GET["error"] == "dissimilarpassword"){
                    echo "<p class= 'errorMsg'>Make sure the passwords match</p>";
                           }
                else if ($_GET["error"] == "stmtfailed"){
                    echo "<p class= 'errorMsg'>Something went wrong, try again</p>";
                }
                else if ($_GET["error"] == "usernametaken"){
                    echo "<p class= 'errorMsg'>That username already exists</p>";
                }
                else if ($_GET["error"] == "none"){
                        echo "<p class='successMsg'>Success!</p>";
                        header("location ./index.php");
                }
                
                }
            
            ?>
        

        </section>



<?php
include_once "footer.php"
?>
