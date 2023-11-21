<?php
include_once "header.php"
?>
        <!-- Main Page Content -->
    <section>
        <h2 class="logIn">Log In</h2>

            <form action="./includes/login.inc.php" method="post" class="login-form-form middle">
            <input type="text" name="uid" placeholder="Username/Email">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="submit">Log In</button>
            </form>

        <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == "emptyinput"){
                    echo "<p class= 'errorMsg'>1 or More missing fields detected</p>";
                }
                else if($_GET["error"] == "wronglogin"){
                    echo "<p class= 'errorMsg'>Incorrect Username/Email and password combination</p>";
                }
                }
            ?>

    </section>


<?php
include_once "footer.php"
?>
