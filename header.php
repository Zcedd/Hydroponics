<?php
    session_start();

    /*if(!isset($_SESSION["username"])){
        header("location: ../index.php?error=nouser");
        exit();
    }
    else{
        $now = time();
        if($now > $_SESSION["expire"]){
            session_destroy();
            header("location: ../index.php?error=sessionexpire");
            exit();
        }
    }*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--==================== UNICONS ====================-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

    <!--==================== Reset CSS ====================-->
    <link href="http://web.simmons.edu/~grovesd/comm244/notes/week4/reset.css" rel="stylesheet" />

    <!--==================== FONTAWESOME ====================-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />

    <!--==================== DATA TABLE ====================-->
    <link href="assets/css/bootstrap-5/bootstrap.min.css" rel="stylesheet" />
    <!--<link href="assets/css/dataTables.bootstrap5.min.css" rel="stylesheet" />-->
    <link href="assets/css/daterangepicker.css" rel="stylesheet" />

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/css/bootstrap-5/bootstrap.bundle.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/daterangepicker.min.js"></script>
    <script src="assets/js/Chart.bundle.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://kit.fontawesome.com/0bb69a1b42.js" crossorigin="anonymous"></script>

    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>

        
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!--<link rel="stylesheet" type="text/css" href="assets/css/DataTables/datatables.min.css"/>
    <script type="text/javascript" src="assets/css/DataTables/datatables.min.js"></script>-->


    <!--==================== CSS ====================-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

<body>
    <!-------------nav bar------------->
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <div>
                <img src="assets/img/mmsu.png" alt="" class="nav__logo-img" />
                <img src="assets/img/icpep.png" alt="" class="nav__logo-img" />
                <img src="assets/img/logo.png" alt="" class="nav__logo-img" />
                <a href="#" class="nav__logo text-decoration-none">Hydrotech</a>
            </div>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list grid" id="nav__list">
                    <li class="nav__item">
                        <a href="/index.php" class="nav__link text-decoration-none">
                            <i class="uil uil-dashboard nav__icon"></i>Dashboard
                        </a>
                    </li>

                    <?php 
                        if(isset($_SESSION["userrole"])){
                            if($_SESSION["userrole"] === "Admin"){
                                echo "<li class=\"nav__item\">
                                   <a href=\"/Scheduler.php\" class=\"nav__link text-decoration-none\">
                                       <i class=\"uil uil-schedule nav__icon\"></i>Scheduler
                                   </a>
                                </li>
                                <li class=\"nav__item\">
                                    <a href=\"/Notification.php\" class=\"nav__link text-decoration-none\">
                                        <i class=\"uil uil-bell nav__icon\"></i><span class=\"notification\">Notification<span id=\"notificationBadge\"></span></span>
                                    </a>
                                </li>
                                <li class=\"nav__item\">
                                    <a href=\"/UserLog.php\" class=\"nav__link text-decoration-none\">
                                        <i class=\"uil uil-user nav__icon\"></i>User Log
                                    </a>
                                </li>";
                            }
                        }
                    ?>

                    <li class="nav__item">
                        <a href="/AboutUs.php" class="nav__link text-decoration-none">
                            <i class="uil uil-scenery nav__icon"></i>About Us
                        </a>
                    </li>

                    <?php 
                        if(isset($_SESSION["userrole"])){
                            if($_SESSION["userrole"] === "Admin"){
                                echo "<li class=\"nav__item\">
                                <a href=\"#\"class=\"nav__link text-decoration-none\" data-bs-toggle=\"modal\" data-bs-target=\"#logout\"
                                    data-backdrop=\"static\" data-keyboard=\"false\">
                                    <i class=\"uil uil-message nav__icon\"></i>Logout
                                </a>
                            </li>";
                            }
                        }
                    ?>
                </ul>
                <i class="uil uil-times nav__close" id="nav-close"></i>
            </div>

            <div class="nav__btns">
                <div class="nav__toggle" id="nav-toggle">
                    <i class="uil uil-apps"></i>
                </div>
            </div>
        </nav>

        <!--==================== LOGOUT MODAL ====================-->
        <div class="modal fade" id="logout">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h1>Confirm</h1>
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">Are you sure to logout?</div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <a href="#" class="btn1" data-bs-dismiss="modal">Cancel</a>
                        <a href="includes/logout.inc.php" class="btn2">Confirm</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <script>
        $(function(){
    var current = location.pathname;
    $('#nav__list li a').each(function(){
        var $this = $(this);
        // if the current path is like this link, make it active
        if($this.attr('href').indexOf(current) !== -1){
            $this.addClass('active-link');
        }
    })
})
    </script>