<div class="dash-nav dash-nav-dark">
    <header>
        <a href="#!" class="menu-toggle">
            <i class="fas fa-bars"></i>
        </a>
        <a href="index.php" class="spur-logo"> <span><?php echo $_SESSION['Name']; ?></span></a>
    </header>
    <nav class="dash-nav-list">
        <a href="index.php" class="dash-nav-item">
            <i class="fas fa-home"></i> Dashboard 
        </a>
        <a href="profile.php" class="dash-nav-item">
            <i class="fas fa-user-circle"></i> Profile 
        </a>
        <a href="forms.php" class="dash-nav-item">
            <i class="fas fa-user-edit"></i> Edit Profile 
        </a>
        <a href="editpage.php" class="dash-nav-item">
            <i class="fas fa-cube"></i> Edit Front Page 
        </a>
        <!--<div class="dash-nav-dropdown">
            <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                <i class="fas fa-file"></i> Layouts </a>
            <div class="dash-nav-dropdown-menu">
                <a href="blank.html" class="dash-nav-dropdown-item">Blank</a>
                <a href="content.html" class="dash-nav-dropdown-item">Content</a>
                <a href="login.html" class="dash-nav-dropdown-item">Log in</a>
                <a href="signup.html" class="dash-nav-dropdown-item">Sign up</a>
            </div>
        </div>-->
    </nav>
</div>