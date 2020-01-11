<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="el">

<head>
<link rel="shortcut icon" type="image/x-icon" href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/images/favicon.ico">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Υπό Κατασκευή</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../../website/css/header_footer.css" type="text/css">
    <link rel="stylesheet" href="../../website/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../website/css/coming_soon.css" type="text/css">
</head>

<body>
    <?php
        $page = 'zero'; include(dirname(__FILE__)."/header.php");
    ?>

    <!-- Countdown Section Begin -->
    <div class="main_header">
        <div class="main">
            <p>Η σελίδα είναι υπό κατασκευή</p>
            <h1>ΣΥΝΤΟΜΑ ΚΟΝΤΑ ΣΑΣ</h1>
            <hr>
            <p id="launch"></p>
        </div>
   </header>
    <!-- Countdown Section End -->

    <?php
        include(dirname(__FILE__)."/footer.php");
    ?>
</body>

<script>
    var countDownDate = new Date("Feb 15, 2020 00:00:00").getTime();
    var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / (1000));

        document.getElementById("launch").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
    }, 1000);
</script>

<script src="../javascript/modal.js"></script>

</html>