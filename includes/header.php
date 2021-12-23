<?php
session_start();
include('includes/config.php');

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 8;
$offset = ($pageno - 1) * $no_of_records_per_page;

$total_pages_sql = "SELECT COUNT(*) FROM tblposts";
$result = mysqli_query($con, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

?>

<style>
.goog-te-banner-frame.skiptranslate {
    display: none !important;
}

.goog-tooltip {
    display: none !important;
}

.goog-tooltip:hover {
    display: none !important;
}

.goog-text-highlight {
    background-color: transparent !important;
    border: none !important;
    box-shadow: none !important;
}

body {
    top: 0px !important;
}

.mainmenu ul#nav>li {
    margin-right: 18px;
}

.mainmenu ul.sub-menu,
.mainmenu ul.sub-menu ul.inside-menu {
    top: 60%;
}

#google_translate_element {
    display: none;
}

#dropdown-menu li {
    padding-top: 5px;
    padding-bottom: 5px;
}

.dropdown-menu span:nth-child(2) font font {
    font-size: 14px;
}
</style>

<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html class="no-js" lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>ISURA NYAYO | <?php echo ucwords(basename($_SERVER['PHP_SELF'], '.php')); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="assets/font/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/font/font.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.bxslider.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="wow/engine1/style.css" />
    <link rel="stylesheet" href="assets/css/flag-icon-css/css/flag-icon.min.css">
    <script type="text/javascript" src="wow/engine1/jquery.js"></script>
</head>

<body>
    <a id="button"></a>
    <div class="body_wrapper">
        <div class="center">
            <div class="header_area">

                <div class="logo floatleft"><a href="index.php"><img src="images/img1.png" width="240" alt="" /></a>
                </div>
                <div class="top_menu floatleft">
                    <ul>
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="./aboutus.php">About Us</a></li>
                        <li><a href="./contactus.php">Contact Us</a></li>
                        <li><a href="./admin">Login</a></li>
                    </ul>
                </div>
                <div class="social_plus_search floatright">
                    <div class="social">
                        <ul id="share">
                            <!-- whatsapp -->
                            <li><a class="whatsapp" href="#" target="blank"><i class="fa fa-whatsapp"></i></a></li>

                            <!-- facebook -->
                            <li><a class="facebook" href="#" target="blank"><i class="fa fa-facebook"></i></a></li>

                            <!-- twitter -->
                            <li><a class="twitter" href="#" target="blank"><i class="fa fa-twitter"></i></a></li>

                            <!-- google -->
                            <li><a class="googleplus" href="#" target="blank"><i class="fa fa-send"></i></a></li>

                            <!-- linkedin -->
                            <li><a class="linkedin" href="#" target="blank"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <div class="search">
                        <form action="page_results.php" method="get" id="search_form">
                            <input type="text" placeholder="Search news" value="" name="search" id="s" />
                            <input type="submit" id="searchform" value="search" />
                        </form>
                    </div>
                </div>
            </div>