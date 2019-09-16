<?php
    $_SESSION['username'] = 'Admin';

    $filename = $_SERVER["PHP_SELF"];
    $pageName  = basename($filename);

    $splitPageName = explode('.', $pageName);
    $actualPageName = $splitPageName[0];

 ?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="styles/style.css">

    <title>
        <?php
            if ($actualPageName == 'index'){
                echo 'Home | Welcome to E2PTECH';
            }elseif ($actualPageName == 'gallery'){
                echo 'Gallery | E2PTECH';
            }elseif ($actualPageName == 'about'){
                echo 'About Us';
            }elseif ($actualPageName == 'upload'){
                echo 'Create Post';
            }

        ?>

    </title>
</head>

<div id="gravity">

    <header id="banner">
        <img src="images\banners\banner.png" alt="">
    </header>


    <nav>
        <div class="container ">
            <ul class="link-group">
                <li class="link-group-item"><a href="index.php">HOME</a></li>
                <li class="link-group-item"><a href="gallery.php">GALLERY</a></li>
                <li class="link-group-item"><a href="contact.php">CONTACT</a></li>
                <li class="link-group-item"><a href="about.php">ABOUT</a></li>
                <?php
            if (isset($_SESSION['username'])) {
                        echo '
                        <li class="link-group-item"><a href="upload.php">POST</a></li>';
                    }
            ?>
            </ul>
        </div>
    </nav>

    
<body>