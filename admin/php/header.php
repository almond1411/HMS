<?php session_start(); ?>
<!-- header-wrap -->
<div class="header-wrap">
    <!-- header-contents -->
    <div class="header-contents">
        <!-- header-contents-left -->
        <div class="header-contents-left">
            <div class="menu-button" onclick="Toggle('.menu-contents')" title="Menu">&#9776;</div>
        </div>
        <!-- header-contents-left ends -->
        <!-- header-contents-center -->
        <div class="header-contents-center"><?php echo $_POST['location']; ?></div>
        <!-- header-contents-center ends -->
        <!-- header-contents-right -->
        <div class="header-contents-right">
            <?php echo $_SESSION['Username']; ?>
            <img src="./images/md-person.svg" onclick="Toggle('.user-menu-contents');" title="My info">
            <img src="./images/logout.svg" onclick="location.href='./php/logout.php';" title="logout">
        </div>
        <!-- header-contents-right ends -->
    </div>
    <!-- header-contents ends -->
</div>
<!-- header-wrap ends -->
<!-- menu-contents -->
<div class="menu-contents">
    <a href="home.html"><div>Home</div></a>
    <a href="./change_my_password.html"><div>Change My Password</div></a>
    <a href="./update_my_info.html"><div>Change My Info</div></a>
</div>
<!-- menu-contents ends -->
<!-- user-menu-contents -->
<div class="user-menu-contents">
    <a href="change_my_password.html"><div>Change my Password</div></a>
    <a href="update_my_info.html"><div>Update my Info</div></a>
</div>
<!-- user-menu-contents ends -->
