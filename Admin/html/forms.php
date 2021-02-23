<?php
    session_start();
    ob_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/spur.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="../js/chart-js-config.js"></script>
    <title>Spur - A Bootstrap Admin Template</title>
</head>
<style>
    .spur-card-title{
        color: white;
    }
</style>
<body>
    <div class="dash">
        <?php
            include("sidenavigation.php");
        ?>
        <div class="dash-app">
            <?php
                include("topnavigation.php");
            ?>
            <main class="dash-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card spur-card">
                                <div class="card-header bg-dark">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-user-edit" style="color: white;"></i>
                                    </div>
                                    <div class="spur-card-title"> Edit Your Profile </div>
                                </div>
                                <div class="card-body ">
                                <?php
                                    /** link to connect to database */
                                    $link = mysqli_connect("localhost", "root", "", "personal");
                                    /** query to select data */
                                    $Sql = "SELECT * FROM admin WHERE Email = '".$_SESSION['Email']."'";
                                    $result = mysqli_query($link, $Sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                        ?>
                                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" onsubmit="return validatepassword();">
                                                <?php
                                                    if(isset($_GET['err'])){
                                                        ?>
                                                        <p style="text-align: center;"><?php echo $_GET['err']; ?></p>
                                                        <?php
                                                    }
                                                ?> 
                                                <?php
                                                    if(isset($_GET['msg'])){
                                                        ?>
                                                        <p style="text-align: center;"><?php echo $_GET['msg']; ?></p>
                                                        <?php
                                                    }
                                                ?> 
                                                <div class="form-group">
                                                    <label for="Name">Name</label><input type="text" class="form-control" name="Name" value="<?php echo $row['Name']; ?>">
                                                    <small id="helpId" class="form-text text-muted"></small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Email">Email</label><input type="email" id="Password" class="form-control" name="Email" value="<?php echo $row['Email']; ?>">
                                                    <small id="password" class="form-text text-muted"></small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Phone">Phone</label><input type="tel" id="Confirm" class="form-control" name="Phone" value="<?php echo $row['Phone']; ?>">
                                                    <small id="confirm" class="form-text text-muted"></small>
                                                </div>
                                                <center>
                                                    <input type="submit" name="resetpassword" value="Update" class="btn btn-info"><br>
                                                </center>
                                            </form>
                                        <?php
                                    }
                                    if(isset($_POST['resetpassword'])){
                                        $Name = mysqli_real_escape_string($link, $_POST['Name']);
                                        $Email = mysqli_real_escape_string($link, $_POST['Email']);
                                        $Phone = mysqli_real_escape_string($link, $_POST['Phone']);

                                        $Sql = "UPDATE admin SET Name = '$Name', Email = '$Email', Phone = '$Phone' WHERE Email = '$Email'";
                                        if(mysqli_query($link, $Sql)){
                                            header("location:forms.php?msg=updates successfully");
                                        } else {
                                            header("location:forms.php?err=not updated");
                                        }
                                    }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../js/spur.js"></script>
</body>

</html>