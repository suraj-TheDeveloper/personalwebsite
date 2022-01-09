<!doctype html>
<html lang="en">

<head>
    <?php
        include("link.html");
        ob_start();
    ?>
    <title>Reset Password | Suraj TheDeveloper</title>
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
    .fas{
        padding: 10px;
    }
</style>
<body>
    <div class="container">
        <div class="form-box">
            <h3 class="form"> Reset Password </h3>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" onsubmit="return validatepassword();">
                <?php
                    if(isset($_GET['err'])){
                        ?>
                        <p style="text-align: center;"><?php echo $_GET['err']; ?></p>
                        <?php
                    }
                ?> 
                <div class="form-group">
                    <label for="Email">Email</label><input type="email" class="form-control" name="Email" placeholder="Enter Email....">
                    <small id="helpId" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="Password">Password</label><input type="password" id="Password" class="form-control" name="Password" placeholder="Enter Password....">
                    <small id="password" class="form-text text-muted"><?php if(isset($_GET['passerr'])){ echo $_GET['passerr']; } ?></small>
                </div>
                <div class="form-group">
                    <label for="Password">ConfirmPassword</label><input type="password" id="Confirm" class="form-control" name="ConfirmPassword" placeholder="Re - Enter Password...." required>
                    <small id="confirm" class="form-text text-muted"><?php if(isset($_GET['cpasserr'])){ echo $_GET['cpasserr']; } ?></small>
                </div>
                <center>
                    <input type="submit" name="resetpassword" value="ResetPassword" class="btn btn-info"><br>
                    <i class="fas fa-arrow-circle-left"> <a href="login.php">Go Back</a></i>
                </center>
            </form>
            <script src="/personalwebsite/Admin/js/validate.js"></script>
            <?php
                $link = mysqli_connect("localhost", "root", "123456", "personal");
                if(isset($_POST['resetpassword'])){
                    if((empty($_POST['Email'])) || (empty($_POST['Password'])) || (empty($_POST['ConfirmPassword']))){
                        header("location:resetpassword.php?nameerr=please fill this column");
                    } else {
                        $Email = mysqli_real_escape_string($link, $_POST['Email']);
                        $Password = mysqli_real_escape_string($link, $_POST['Password']);
                        $ConfirmPassword = mysqli_real_escape_string($link, $_POST['ConfirmPassword']);
                        $Sql = "UPDATE admin SET Password = '$Password', ConfirmPassword = '$ConfirmPassword' WHERE Email = '$Email'";
                        if(mysqli_query($link, $Sql)){
                            header("location:login.php?msg=password resetting done successfully");
                        } else {
                            header("location:resetpassword.php?=password resetting failure");
                        }
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>