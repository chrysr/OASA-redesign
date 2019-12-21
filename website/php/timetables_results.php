<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="el">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Δρομολόγιο <?php echo $_GET['TID']?> </title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../../website/css/header_footer.css" type="text/css">
    <link rel="stylesheet" href="../../website/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../website/css/timetables_results.css" type="text/css">
</head>

<body>
    <?php
        $page = 'three'; include(dirname(__FILE__)."/header.php");
    ?>

<section id="timetable-list-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Main Start -->
                <div class="col-lg-8">
                    <div class="timetable-details-content">
                        <h2>Στάση (Από- Πρός)</h2>
                        <div class="timetable-details-info blog-content">
                            <div style="font-size: 19px;">
                                <p>
                                    Για την καλύτερη εξυπηρέτηση των επιβατών αλλά και των ατόμων με αναπηρία ο ΟΑΣΑ έχει τοποθετήσει στις παρακάτω στάσεις ειδικές προεξοχές για την ευκολότερη πρόσβαση των επιβατών στα οχήματα (Λεωφορεία και Τρόλλεϋ).
                                </p>
                            </div>

                            <br>
                            <br>
            </div>
        </div>
    </section>

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

</html>