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
    <link rel="stylesheet" href="../../website/css/works.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">

</head>

<body>
    <?php
        include(dirname(__FILE__)."/header.php");
    ?>

    <!--== Works Start ==-->
    <section id="car-list-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Main Start -->
                <div class="col-lg-8">
                    <div class="car-details-content">
                        <h2>ΚΑΤΑΣΤΑΣΗ ΔΙΚΤΥΟΥ</h2>
                        <div class="car-details-info blog-content">
                            <div style="font-size: 19px;">
                                <p>
                                    Εδώ δημοσιεύουμε μια λίστα από προγραμματισμένα και έργα και συντηρήσεις που επηρεάζουν τις στάσεις, ανελκυστήρες και κυλιόμενες σκάλες που ανήκουν στο δίκτυο του ΟΑΣΑ.
                                </p>
                            </div>

                            <br>

                            <p>Αυτές οι πληροφορίες αλλάζουν συχνά, οπότε καλό είναι να συμβουλεύεστε αυτή την σελίδα πριν <a href="../../index.php">προγραμματίσετε το ταξίδι σας.</a> </p>
                            
                            <div style="font-weight: bold; color: black;">
                                <p>
                                    Τελευταία ενημέρωση: 7 Δεκεμβρίου 2019
                                </p>
                            </div>

                            <br>
                            <br>

                            <!-- Table Start -->
                            <table id="mytable" class="table-fill">
                                <thead>
                                    <tr>
                                        <th onclick="sortTable(0)" class="text-left">Στάση<i class="fa fa-fw fa-sort"></i></th>
                                        <th class="text-left" style="padding-right: 120px;">Ημερομηνίες</th>
                                        <th class="text-left">Περιγραφή προβλήματος</th>
                                    </tr>
                                </thead>
                                <tbody class="table-hover">
                                    <tr>
                                        <td class="text-left">Πανόρμου</td>
                                        <td class="text-left">12/12/2019 - 24/12/2019</td>
                                        <td class="text-left">Δεν λειτουργούν οι ανελκυστήρες.</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Κατεχάκη</td>
                                        <td class="text-left">1/12/2019 - 28/12/2019</td>
                                        <td class="text-left">Δεν λειτουργούν οι κυλιόμενες σκάλες.</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Ειρήνη</td>
                                        <td class="text-left">29/11/2019 - 13/12/2019</td>
                                        <td class="text-left">Από τις δύο κυλιόμενες σκάλες λειτουργεί η μία.</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Μαρούσι</td>
                                        <td class="text-left">23/12/2019 - 26/12/2019</td>
                                        <td class="text-left">Τα τραίνα δεν θα κάνουν στάση, παρακαλούμε χρησιμοποιήστε κοντινούς σταθμούς.</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Ειρήνη</td>
                                        <td class="text-left">13/1/2020 - 16/1/2020</td>
                                        <td class="text-left">Δεν θα λειτουργούν οι ανελκυστήρες λόγω συντήρησής τους.</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Ευαγγελισμός</td>
                                        <td class="text-left">1/2/2020 - 18/2/2020</td>
                                        <td class="text-left">Δεν θα λειτουργούν οι κυλιόμενες σκάλες προς Αγία Μαρίνα λόγω συντήρησής τους.</td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- Table End -->

                        </div>
                    </div>
                </div>
                <!-- Main End -->

                <!-- Sidebar Area Start -->
                <div class="col-lg-4">
                    <div class="sidebar-content-wrap m-t-50">
                        <!-- Single Sidebar Start -->
                        <div class="single-sidebar">
                            <h3>ΓΡΑΜΜΗ ΑΠΟΚΛΕΙΣΤΙΚΗΣ ΕΞΥΠΗΡΕΤΗΣΗΣ</h3>

                            <div class="sidebar-body">
                                <p><i class="fa fa-mobile"></i> 210 82 00 887</p>
                                <p><i class="fa fa-clock-o"></i> Δευ - Παρ 6.30 - 22.30 <p style="padding-left: 28px;">Σαβ - Κυρ 7.30 - 22.30</p> </p>
                            </div>
                        </div>
                        <!-- Single Sidebar End -->

                        <!-- Single Sidebar Start -->
                        <div class="single-sidebar">
                            <h3>ΣΥΜΒΟΥΛΕΣ ΤΑΞΙΔΙΟΥ</h3>

                            <div class="sidebar-body">
                                <ul class="recent-tips">
                                    <li class="single-recent-tips">
                                        <div class="recent-tip-body">
                                            <h4><a href="coming_soon.php">Προσβάσιμοι Σταθμοί Λεωφορείου</a></h4>
                                        </div>
                                    </li>

                                    <hr>

                                    <li class="single-recent-tips">
                                        <div class="recent-tip-body">
                                            <h4><a href="coming_soon.php">Προσβάσιμοι Σταθμοί Τραμ</a></h4>
                                        </div>
                                    </li>

                                    <hr>

                                    <li class="single-recent-tips">
                                        <div class="recent-tip-body">
                                            <h4><a href="coming_soon.php">Οδηγίες Ταξιδιού με Μετρό</a></h4>
                                        </div>
                                    </li>

                                    <hr>
                                </ul>
                            </div>
                        </div>
                        <!-- Single Sidebar End -->
                    </div>
                </div>
                <!-- Sidebar Area End -->
            </div>
        </div>
    </section>
    <!--== Works End ==-->

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

<script src="../javascript/table_sort.js"></script>

</html>