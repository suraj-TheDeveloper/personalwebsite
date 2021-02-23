<DOCTYPE html>
<html>
    <head>
        <!-- icon -->
        <link rel="icon" href="/personalwebsite/images/ico/favicon.ico" type="image/x-icon">
        <title>Suraj TheDeveloper | Index</title>
        <?php
            include("links.html");
            include("navigation.php");
        ?>
    </head>
    <style>
       
        h2{
            color: white;
        }
        .btn-primary{
            margin-bottom: 20px;
        }
        a{
            color: white;
            font-family: 'Roboto';
        }
        a:hover{
            color: white;
            text-decoration: none;
            font-family: 'Roboto';
        }
        
        .email{
            color: white;
            padding-top: 30px;
            font-family: 'Roboto';
            font-size: 20px;
        }
    </style>
    <body>
        <?php
            $link = mysqli_connect("localhost", "root", "", "personal");
            /** selecting the indexpage table */
            $Sql = "SELECT * FROM indexpage";
            /**now executing the query */
            $result = mysqli_query($link, $Sql);
            /** now display */
            while($row = mysqli_fetch_array($result)){

        ?>
        <!-- head section -->
        <div id="home">
            <div class="container container-fluid">
                <h2 class="site-title-first-mobile site-title-first-tablet site-title-first-laptop"><?php echo $row['Sitetitle']; ?></h2>
                <h2 class="site-title-middle-mobile site-title-middle-tablet site-title-middle-laptop"><?php echo $row['Subtitle']; ?></h2>
            </div>
        </div>
        <!-- end -->
        <!-- about me and my intrest section -->
        <div id="about">
            <div class="container">
                <center><h3 class="h2 about">About Me</h3></center>
                <img src="/personalwebsite/images/pictures/titleimage.png" width="300" height="300" style="float: left;">
                <p class="about-para">
                   <?php echo $row['Aboutme']; ?>
                </p>
                <h3 class="h3" style="font-family: 'Noto Serif', serif;">About My Intrest</h3>
                <p class="about-para">
                   <?php echo $row['Aboutmyintrest']; ?>
                </p>
            </div>
        </div>
        <!-- end -->
        <?php
            }
            $links = mysqli_connect("localhost", "root", "", "personal-cv");
            /** selecting the indexpage table */
            $Sql = "SELECT * FROM careerobjective";
            /**now executing the query */
            $result = mysqli_query($links, $Sql);
            /** now display */
            while($row = mysqli_fetch_array($result)){

        ?>
        <!-- my cv section -->
        <div id="cv">
            <div class="container">
                <center><h3 class="h2 about">Curriculam Vitae - (CV)</h3></center>
                <h3 class="h3" style="font-family: monlight; margin-top: 30px;">Career Objective:</h3>
                <p class="about-para">
                    <?php echo $row['objective']; ?>
                </p>
                <h3 class="h3" style="font-family: monlight; margin-top: 30px;">Education Qualification:</h3>
                <?php
            }
            $links = mysqli_connect("localhost", "root", "", "personal-cv");
            $Sql = "SELECT * FROM qualification";
            /**now executing the query */
            $result = mysqli_query($links, $Sql);
            /** now display */
            while($row = mysqli_fetch_array($result)){
                ?>
                <p class="about-para">
                   -> <?php echo $row['Qualification']; ?>
                </p>
                <?php
            }
                ?>
                <h3 class="h3" style="font-family: monlight; margin-top: 30px;">Certificates:</h3>
                <?php
                    $links = mysqli_connect("localhost", "root", "", "personal-cv");
                    $Sql = "SELECT * FROM certificates";
                    $result = mysqli_query($links, $Sql);
                    while($row = mysqli_fetch_array($result)){
                ?>
                <p class="about-para">
                        <?php echo $row['id']; ?>.<?php echo $row['certificates']; ?>
                </p>
                <?php
                }
                ?>
                <h3 class="h3" style="font-family: monlight; margin-top: 30px;">Languages Known:</h3>
                <?php
                    $links = mysqli_connect("localhost", "root", "", "personal-cv");
                    $Sql = "SELECT * FROM languages";
                    $result = mysqli_query($links, $Sql);
                    while($row = mysqli_fetch_array($result)){
                ?>
                <p class="about-para">
                   <?php echo $row['id']; ?>.<?php echo $row['languages']; ?>
                </p>
                <?php
                    }
                ?>
                <h3 class="h3" style="font-family: monlight; margin-top: 30px;">Frameworks Known:</h3>
                <?php
                    $links = mysqli_connect("localhost", "root", "", "personal-cv");
                    $Sql = "SELECT * FROM framesworks";
                    $result = mysqli_query($links, $Sql);
                    while($row = mysqli_fetch_array($result)){
                ?>
                <p class="about-para">
                    <?php echo $row['id']; ?>.<?php echo $row['frameworks']; ?>
                </p>
                <?php
                    }
                ?>
                 <h3 class="h3" style="font-family: monlight; margin-top: 30px;">Technical Skills:</h3>
                <?php
                    $links = mysqli_connect("localhost", "root", "", "personal-cv");
                    $Sql = "SELECT * FROM skills";
                    $result = mysqli_query($links, $Sql);
                    while($row = mysqli_fetch_array($result)){
                ?>
                <p class="about-para">
                    <?php echo $row['id']; ?>.<?php echo $row['skills']; ?>
                </p>
                <?php
                    }
                ?>
            </div>
        </div>
        <?php
            include("footer.php");
        ?>
    </body>
    <script src="/personalwebsite/javascript/design.js"></script>
</html>