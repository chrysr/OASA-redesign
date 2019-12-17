<!-- <?php
    echo $_POST["start"];
    echo $_POST["destination"];
    echo $_POST["date"];
    echo $_POST["time"];
?> -->

<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="el">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ΑμεΑ - Κατάσταση Δικτύου</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../../website/css/header_footer.css" type="text/css">
    <link rel="stylesheet" href="../../website/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../website/css/results.css" type="text/css">
</head>

<body>
    <?php
        $page = 'one'; include(dirname(__FILE__)."/header.php");
    ?>

    <div class="container" style="padding-top: 80px; max-width: 640px;">
        <ul class="acc">
            <li>
            <button class="acc_ctrl"><h2>41 λεπτ.</h2></button>
            <div class="acc_panel">
                <div class="station">
                    <h5>Ομόνοια</h5>
                    <div class="station-details-green">
                        <p>Οδηγίες
                        </p>
                    </div>
                </div>
                <div class="station">
                    <h5>Ομόνοια</h5>
                    <div class="station-details-red">
                        <p>Οδηγίες
                        </p>
                    </div>
                </div>
            </div>
            </li>
            <li>
            <button class="acc_ctrl"><h2>Ford</h2></button>
            <div class="acc_panel">
                <p>The Ford Motor Company (commonly referred to as simply Ford) is an American multinational automaker headquartered in Dearborn, Michigan, a suburb of Detroit. It was founded by Henry Ford and incorporated on June 16, 1903.</p>
            </div>
            </li>
            <li>
            <button class="acc_ctrl"><h2>Toyota</h2></button>
            <div class="acc_panel">
                <p>Toyota Motor Corporation is a Japanese automotive manufacturer which was founded by Kiichiro Toyoda in 1937 as a spinoff from his father's company Toyota Industries, which is currently headquartered in Toyota, Aichi Prefecture, Japan.</p>
            </div>
            </li>
        </ul>
    </div>

    <?php
        include(dirname(__FILE__)."/footer.php");
    ?>
</body>

<script>
    document.getElementById('button').addEventListener('click',
    function() {
        document.querySelector('.bg-modal').style.display = 'flex';
    });

    document.querySelector('.close').addEventListener('click',
    function() {
        document.querySelector('.bg-modal').style.display = 'none';
    });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="../javascript/accordion.js"></script>

</html>