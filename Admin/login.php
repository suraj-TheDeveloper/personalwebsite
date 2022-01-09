<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin | Suraj TheDeveloper</title>
        <?php
        
            include("link.html");
            ob_start();
        ?>
    </head>
    <style>
        body{
            background-color: #E5E1E1;
        }
        a{
            color: black;
            text-decoration: none;
        }
        a:hover{
            color: black;
            text-decoration: none;
        }
    </style>
    <body>
        <div class="container">
            <div class="form-box">
                <form class="form-pad" action="#" method="POST">     
                    <h3 class="form">Login</h3>     
                    <?php
                        if(isset($_GET['message'])){
                            ?>
                            <p style="text-align: center;"><?php echo $_GET['message']; ?></p>
                            <?php
                        }
                        if(isset($_GET['msg'])){
                            ?>
                            <p style="text-align: center;"><?php echo $_GET['msg']; ?></p>
                            <?php
                        }
                        if(isset($_GET['err'])){
                            ?>
                            <p style="text-align: center;"><?php echo $_GET['err']; ?></p>
                            <?php
                        }
                    ?> 
                    <div class="form-group">
                        <label for="Name">Name</label><input type="text" class="form-control" name="Name" placeholder="Enter Name....">
                        <small id="helpId" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label><input type="email" class="form-control" name="Email" placeholder="Enter Email....">
                        <small id="helpId" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label><input type="password" class="form-control" name="Password" placeholder="Enter Password....">
                        <small id="helpId" class="form-text text-muted"></small>
                    </div>
                    <center>
                        <input type="submit" name="login" class="btn btn-info" value="Login"><br>
                        <a href="resetpassword.php">Forgot Password?</a>
                    </center>
                </form>
                <?php
                    if(isset($_POST['login'])){
                        $link = mysqli_connect("localhost", "root", "123456", "personal");
                        if((empty($_POST['Name'])) || (empty($_POST['Email'])) || (empty($_POST['Password']))){
                            header("location:login.php?err=please fill the details");
                        } else {
                            /** saving the entered email and password in a variable */
                            $Name = mysqli_real_escape_string($link, $_POST['Name']);
                            $Email = mysqli_real_escape_string($link, $_POST['Email']);
                            $Password = mysqli_real_escape_string($link, $_POST['Password']);
                            /** query to select the data where it matches to entered email */
                            $Sql = "SELECT Name, Email, Password FROM admin WHERE Email = '$Email'";
                            /** now saving the result in variable */
                            $result = mysqli_query($link, $Sql);
                            /** now fetching the result */
                            while($row = mysqli_fetch_assoc($result)){
                                /** now checking whether entered and databse details are correct */
                                if($row['Name'] == $Name && $row['Email'] == $Email && $row['Password'] == $Password){
                                    $_SESSION['Name'] = $Name;
                                    $_SESSION['Email'] = $Email;
                                    header("location:/personalwebsite/Admin/html/index.php");
                                } else {
                                    header("location:login.php?message=<p class='message'>Username or Password is wrong</p>");
                                }
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </body>
</html>