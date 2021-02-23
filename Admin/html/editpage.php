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
    <!-- icon -->
    <link rel="icon" href="/personalwebsite/images/ico/favicon.ico" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="../js/chart-js-config.js"></script>
    <title>Edit Page</title>
</head>

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
                    <h1 class="dash-title">Edit Your Front Page Here</h1>
                    <!-- website titles and about me and my intrest -->
                        <div class="card spur-card">
                            <div class="card-header bg-primary">
                                <div class="spur-card-title" style="color: white;"> Website Titles and About me and my intrest </div>
                            </div>
                            <div class="card-body">
                                <?php
                                /** select and display query */
                                    $link = mysqli_connect("localhost", "root", "", "personal");
                                    $Sql = "SELECT * FROM indexpage";
                                    $result = mysqli_query($link, $Sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">    
                                            <?php
                                                if(isset($_GET['msg'])){
                                                    ?>
                                                        <p><?php echo $_GET['msg']; ?></p>
                                                    <?php
                                                }
                                                if(isset($_GET['err'])){
                                                    ?>
                                                        <p><?php echo $_GET['err']; ?></p>
                                                    <?php
                                                }
                                            ?>  
                                            <div class="form-group">
                                                <label for="SiteTitle">Site Title:</label><input type="text" class="form-control" name="Sitetitle" value="<?php echo $row['Sitetitle']; ?>">
                                                <small id="helpId" class="form-text text-muted"></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="SubTitle">Sub Title:</label><input type="text" class="form-control" name="Subtitle" value="<?php echo $row['Subtitle']; ?>">
                                                <small id="helpId" class="form-text text-muted"></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="About Me">About Me:</label><textarea class="form-control" name="Aboutme" rows="10" cols="30"><?php echo $row['Aboutme']; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="About My intrest">About My Intrest:</label><textarea class="form-control" name="Aboutmyintrest" rows="10" cols="30"><?php echo $row['Aboutmyintrest']; ?>"</textarea>
                                            </div>
                                            <input type="submit" value="Update" name="update" class="btn btn-info" style="float: right;">                                        
                                        </form>
                                        <?php
                                        /**update code */
                                            if(isset($_POST['update'])){
                                                $Sitetitle = mysqli_real_escape_string($link, $_POST['Sitetitle']);
                                                $Subtitle = mysqli_real_escape_string($link, $_POST['Subtitle']);
                                                $Aboutme = mysqli_real_escape_string($link, $_POST['Aboutme']);
                                                $Aboutmyintrest = mysqli_real_escape_string($link, $_POST['Aboutmyintrest']);

                                                $Sql = "UPDATE indexpage SET Sitetitle = '$Sitetitle', Subtitle = '$Subtitle', Aboutme = '$Aboutme', Aboutmyintrest = '$Aboutmyintrest'";

                                                if(mysqli_query($link, $Sql)){
                                                    header("location:editpage.php?msg=updated successfully");
                                                } else {
                                                    header("location:editpage.php?err=not updated");
                                                }
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                            <!-- end -->
                            <!-- career objective -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card spur-card">
                                <div class="card-header bg-primary text-white">
                                    <div class="spur-card-title"> Career Objective </div>
                                </div>
                                <div class="card-body">
                                <?php
                                    /**select and display query */
                                    $link = mysqli_connect("localhost", "root", "", "personal-cv");
                                    $Sql = "SELECT * FROM careerobjective";
                                    $result = mysqli_query($link, $Sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">    
                                            <?php
                                                if(isset($_GET['msgs'])){
                                                    ?>
                                                        <p><?php echo $_GET['msgs']; ?></p>
                                                    <?php
                                                }
                                                if(isset($_GET['err'])){
                                                    ?>
                                                        <p><?php echo $_GET['errs']; ?></p>
                                                    <?php
                                                }
                                            ?>  
                                             <div class="form-group">
                                                <label for="Objective">Objective:</label><textarea class="form-control" name="objective" rows="10" cols="30"><?php echo $row['objective']; ?></textarea>
                                            </div>
                                            <input type="submit" value="Update" name="updates" class="btn btn-info" style="float: right;">                                        
                                        </form>
                                        <?php
                                        /** update query */
                                            if(isset($_POST['updates'])){
                                                $objective = mysqli_real_escape_string($link, $_POST['objective']);
                                                $Sql = "UPDATE careerobjective SET objective = '$objective'";

                                                if(mysqli_query($link, $Sql)){
                                                    header("location:editpage.php?msgs=updated successfully");
                                                } else {
                                                    header("location:editpage.php?errs=not updated");
                                                }
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- End -->
                        <!-- Certificates -->
                        <div class="col-lg-6">
                            <div class="card spur-card">
                                <div class="card-header bg-primary text-white">
                                    <div class="spur-card-title"> Certificates </div>
                                </div>
                                <div class="card-body">
                                        <?php
                                        /** display query */
                                            $link = mysqli_connect("localhost", "root", "", "personal-cv");
                                            $Sql = "SELECT * FROM certificates";
                                            $result = mysqli_query($link, $Sql);
                                            while($row = mysqli_fetch_assoc($result)){
                                        ?>
                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">    
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    <input type="text" class="form-control" name="certificates" value="<?php echo $row['certificates']; ?>">
                                                    <small id="helpId" class="form-text text-muted"><?php if(isset($_GET['success'])){echo $_GET['success'];} ?></small>
                                                    <small id="helpId" class="form-text text-muted"><?php if(isset($_GET['failure'])){echo $_GET['failure'];} ?></small>
                                               </div>
                                            </div>
                                            <input type="submit" value="Update" name="updated" class="btn btn-info" style="float: right;"> <input type="submit" name="delete" class="btn btn-danger" value="Delete" style="float: right;">                                    
                                        </form>
                                        <?php
                                            if(isset($_POST['updated'])){
                                                /** update query */
                                                $id = mysqli_real_escape_string($link, $_POST['id']);
                                                echo $id;
                                                $certificates = mysqli_real_escape_string($link, $_POST['certificates']);
                                                $Sql = "UPDATE certificates SET certificates = '$certificates' WHERE id = '$id'";
                                                
                                                if(mysqli_query($link, $Sql)){
                                                    header("location:editpage.php?success=updated successfully");
                                                } else {
                                                    header("location:editpage.php?failure=not updated");
                                                }
                                            }   
                                            if(isset($_POST['delete'])){
                                                $id = mysqli_real_escape_string($link, $_POST['id']);
                                                $certificates = mysqli_real_escape_string($link, $_POST['certificates']);
                                                $Sql = "DELETE FROM certificates WHERE id = '$id'";

                                                if(mysqli_query($link, $Sql)){
                                                    header("location:editpage.php?success=deleted");
                                                } else {
                                                    header("location:editpage.php?failure=not deleted");
                                                }
                                            }   
                                        }
                                    ?>
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">    
                                        <?php
                                            if(isset($_GET['insertsuccess'])){
                                                ?>
                                                    <p><?php echo $_GET['insertsuccess']; ?></p>
                                                <?php
                                            }
                                            if(isset($_GET['insertfail'])){
                                                ?>
                                                    <p><?php echo $_GET['insertfail']; ?></p>
                                                <?php
                                            }
                                        ?>  
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="certificates" placeholder="Enter Certificates name....">
                                            <small id="helpId" class="form-text text-muted"></small>
                                        </div>
                                        <input type="submit" value="Insert" name="insert" class="btn btn-info" style="float: right;">                                        
                                    </form>
                                    <?php
                                        $link = mysqli_connect("localhost", "root", "", "personal-cv");
                                        if(isset($_POST['insert'])){
                                            $certificates = mysqli_real_escape_string($link, $_POST['certificates']);

                                            $Sql = "INSERT INTO certificates (certificates) VALUES ('$certificates')";
                                            if(mysqli_query($link, $Sql)){
                                                header("location:editpage.php?insertsuccess=inserted successfully");
                                            } else {
                                                header("location:editpage.php?insertfail=not inserted");
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                            <div class="card spur-card">
                                <div class="card-header bg-primary text-white">
                                    <div class="spur-card-title"> Skills </div>
                                </div>
                                <div class="card-body"> 
                                <?php
                                        /** display query */
                                            $link = mysqli_connect("localhost", "root", "", "personal-cv");
                                            $Sql = "SELECT * FROM skills";
                                            $result = mysqli_query($link, $Sql);
                                            while($row = mysqli_fetch_assoc($result)){
                                        ?>
                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">    
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    <input type="text" class="form-control" name="skills" value="<?php echo $row['skills']; ?>">
                                                    <small id="helpId" class="form-text text-muted"><?php if(isset($_GET['succ'])){echo $_GET['succ'];} ?></small>
                                                    <small id="helpId" class="form-text text-muted"><?php if(isset($_GET['fail'])){echo $_GET['fail'];} ?></small>
                                               </div>
                                            </div>
                                            <input type="submit" value="Update" name="updated" class="btn btn-info" style="float: right;">  <input type="submit" name="deleted" class="btn btn-danger" value="Delete" style="float: right;">                                
                                        </form>
                                        <?php
                                            if(isset($_POST['updated'])){
                                                /** update query */
                                                $id = mysqli_real_escape_string($link, $_POST['id']);
                                                echo $id;
                                                $certificates = mysqli_real_escape_string($link, $_POST['skills']);
                                                $Sql = "UPDATE skills SET skills = 'skills' WHERE id = '$id'";
                                                
                                                if(mysqli_query($link, $Sql)){
                                                    header("location:editpage.php?succ=updated successfully");
                                                } else {
                                                    header("location:editpage.php?fail=not updated");
                                                }
                                            }  
                                            if(isset($_POST['deleted'])){
                                                $id = mysqli_real_escape_string($link, $_POST['id']);
                                                $skills = mysqli_real_escape_string($link, $_POST['skills']);
                                                $Sql = "DELETE FROM skills WHERE id = ' $id'";

                                                if(mysqli_query($link, $Sql)){
                                                    header("location:editpage.php?succ=deleted"); 
                                                } else {
                                                    header("location:editpage.php?fail=not deleted");
                                                }
                                            }    
                                        }
                                    ?>
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">    
                                        <?php
                                            if(isset($_GET['insertsuccess'])){
                                                ?>
                                                    <p><?php echo $_GET['insertsuccess']; ?></p>
                                                <?php
                                            }
                                            if(isset($_GET['insertfail'])){
                                                ?>
                                                    <p><?php echo $_GET['insertfail']; ?></p>
                                                <?php
                                            }
                                        ?>  
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <input type="text" class="form-control" name="skills" placeholder="Enter your Skills...">
                                            <small id="helpId" class="form-text text-muted"></small>
                                        </div>
                                        <input type="submit" value="Insert" name="inserts" class="btn btn-info" style="float: right;">                                        
                                    </form>
                                    <?php
                                        $link = mysqli_connect("localhost", "root", "", "personal-cv");
                                        if(isset($_POST['inserts'])){
                                            $skills = mysqli_real_escape_string($link, $_POST['skills']);

                                            $Sql = "INSERT INTO skills (skills) VALUES ('$skills')";
                                            if(mysqli_query($link, $Sql)){
                                                header("location:editpage.php?insertsuccess=inserted successfully");
                                            } else {
                                                header("location:editpage.php?insertfail=not inserted");
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card spur-card">
                                <div class="card-header bg-primary text-white">
                                    <div class="spur-card-title"> Enter Programmimg Languages You Learnt </div>
                                </div>
                                <div class="card-body"> 
                                <?php
                                        /** display query */
                                            $link = mysqli_connect("localhost", "root", "", "personal-cv");
                                            $Sql = "SELECT * FROM languages";
                                            $result = mysqli_query($link, $Sql);
                                            while($row = mysqli_fetch_assoc($result)){
                                        ?>
                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">    
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    <input type="text" class="form-control" name="skills" value="<?php echo $row['languages']; ?>">
                                                    <small id="helpId" class="form-text text-muted"><?php if(isset($_GET['successfull'])){echo $_GET['successfull'];} ?></small>
                                                    <small id="helpId" class="form-text text-muted"><?php if(isset($_GET['failed'])){echo $_GET['failed'];} ?></small>
                                               </div>
                                            </div>
                                            <input type="submit" value="Update" name="updateds" class="btn btn-info" style="float: right;">  <input type="submit" name="deletes" class="btn btn-danger" value="Delete" style="float: right;">                                
                                        </form>
                                        <?php
                                            if(isset($_POST['updateds'])){
                                                /** update query */
                                                $id = mysqli_real_escape_string($link, $_POST['id']);
                                                $languages = mysqli_real_escape_string($link, $_POST['languages']);
                                                $Sql = "UPDATE languages SET languages = '$languages' WHERE id = '$id'";
                                                
                                                if(mysqli_query($link, $Sql)){
                                                    header("location:editpage.php?successfull=updated successfully");
                                                } else {
                                                    header("location:editpage.php?failed=not updated");
                                                }
                                            }  
                                            if(isset($_POST['deletes'])){
                                                $id = mysqli_real_escape_string($link, $_POST['id']);
                                                $languages = mysqli_real_escape_string($link, $_POST['languages']);
                                                $Sql = "DELETE FROM languages WHERE id = ' $id'";

                                                if(mysqli_query($link, $Sql)){
                                                    header("location:editpage.php?successfully=deleted"); 
                                                } else {
                                                    header("location:editpage.php?failed=not deleted");
                                                }
                                            }    
                                        }
                                    ?>
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">    
                                        <?php
                                            if(isset($_GET['insertsuccess'])){
                                                ?>
                                                    <p><?php echo $_GET['insertsuccess']; ?></p>
                                                <?php
                                            }
                                            if(isset($_GET['insertfail'])){
                                                ?>
                                                    <p><?php echo $_GET['insertfail']; ?></p>
                                                <?php
                                            }
                                        ?>  
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <input type="text" class="form-control" name="skills" placeholder="Enter your Skills...">
                                            <small id="helpId" class="form-text text-muted"></small>
                                        </div>
                                        <input type="submit" value="Insert" name="inserts" class="btn btn-info" style="float: right;">                                        
                                    </form>
                                    <?php
                                        $link = mysqli_connect("localhost", "root", "", "personal-cv");
                                        if(isset($_POST['inserts'])){
                                            $skills = mysqli_real_escape_string($link, $_POST['skills']);

                                            $Sql = "INSERT INTO skills (skills) VALUES ('$skills')";
                                            if(mysqli_query($link, $Sql)){
                                                header("location:editpage.php?insertsuccess=inserted successfully");
                                            } else {
                                                header("location:editpage.php?insertfail=not inserted");
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card spur-card">
                                <div class="card-header bg-primary text-white">
                                    <div class="spur-card-title"> Frameworks Known </div>
                                </div>
                                <div class="card-body">
                                <?php
                                        /** display query */
                                            $link = mysqli_connect("localhost", "root", "", "personal-cv");
                                            $Sql = "SELECT * FROM framesworks";
                                            $result = mysqli_query($link, $Sql);
                                            while($row = mysqli_fetch_assoc($result)){
                                        ?>
                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">    
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    <input type="text" class="form-control" name="frameworks" value="<?php echo $row['frameworks']; ?>">
                                                    <small id="helpId" class="form-text text-muted"><?php if(isset($_GET['successfully'])){echo $_GET['successfully'];} ?></small>
                                                    <small id="helpId" class="form-text text-muted"><?php if(isset($_GET['failedd'])){echo $_GET['failedd'];} ?></small>
                                               </div>
                                            </div>
                                            <input type="submit" value="Update" name="updatedss" class="btn btn-info" style="float: right;">  <input type="submit" name="deleteing" class="btn btn-danger" value="Delete" style="float: right;">                                
                                        </form>
                                        <?php
                                            if(isset($_POST['updatedss'])){
                                                /** update query */
                                                $id = mysqli_real_escape_string($link, $_POST['id']);
                                                $frameworks = mysqli_real_escape_string($link, $_POST['frameworks']);
                                                $Sql = "UPDATE framesworks SET framesworks = '$framesworks' WHERE id = '$id'";
                                                
                                                if(mysqli_query($link, $Sql)){
                                                    header("location:editpage.php?successfully=updated successfully");
                                                } else {
                                                    header("location:editpage.php?failedd=not updated");
                                                }
                                            }  
                                            if(isset($_POST['deleteing'])){
                                                $id = mysqli_real_escape_string($link, $_POST['id']);
                                                $frameworks = mysqli_real_escape_string($link, $_POST['frameworks']);
                                                $Sql = "DELETE FROM framesworks WHERE id = ' $id'";

                                                if(mysqli_query($link, $Sql)){
                                                    header("location:editpage.php?successfully=deleted"); 
                                                } else {
                                                    header("location:editpage.php?failedd=not deleted");
                                                }
                                            }    
                                        }
                                    ?>
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">    
                                        <?php
                                            if(isset($_GET['insertsuccessd'])){
                                                ?>
                                                    <p><?php echo $_GET['insertsuccessd']; ?></p>
                                                <?php
                                            }
                                            if(isset($_GET['insertfaild'])){
                                                ?>
                                                    <p><?php echo $_GET['insertfaild']; ?></p>
                                                <?php
                                            }
                                        ?>  
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <input type="text" class="form-control" name="skills" placeholder="Enter your Skills...">
                                            <small id="helpId" class="form-text text-muted"></small>
                                        </div>
                                        <input type="submit" value="Insert" name="insertss" class="btn btn-info" style="float: right;">                                        
                                    </form>
                                    <?php
                                        $link = mysqli_connect("localhost", "root", "", "personal-cv");
                                        if(isset($_POST['insertss'])){
                                            $id = mysqli_real_escape_string($link, $_POST['id']);
                                            $frameworks = mysqli_real_escape_string($link, $_POST['frameworks']);

                                            $Sql = "INSERT INTO framesworks (frameworks) VALUES ('$frameworks')";
                                            if(mysqli_query($link, $Sql)){
                                                header("location:editpage.php?insertsuccessd=inserted successfully");
                                            } else {
                                                header("location:editpage.php?insertfaild=not inserted");
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