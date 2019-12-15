<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="el">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ΟΑΣΑ</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/header_footer.css" type="text/css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<body>
    <?php
        if(empty($_SESSION['loggedin']) || $_SESSION['loggedin'] == false)
        {
            header('Location: ./login.php');
            die();
        }
    ?>
    <!-- Header Section Begin -->
    <?php
        include(dirname(__FILE__)."/header.php");
    ?>

    <?php 
        
        print $_SESSION['username'];
    ?>
    <?php
        if (isset($_POST['hid'])) {
            session_destroy();
            header('Location: ../../index.php');
        }
    ?>
    <form action="account.php" method="POST" style="padding-top: 20rem">
        <!-- <span style="color:white">ATH.ENA Card Number*</span> -->
        <input type="hidden" value=1 name="hid">
        <input type="submit" name="signout">
        
    </form>    
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <!-- <section class="hero-section set-bg2">
    </section> -->
    <!-- Hero Section End -->

    <!-- Cards Section -->
    
            <!-- <h1>SET</h1> -->
           

             <!-- <h1>$_POST['card']." ".$_POST['password']</h1>; -->
        
    
    
    <?php
        include(dirname(__FILE__)."/footer.php");
    ?>
    <!-- Footer Section End -->

</body>

