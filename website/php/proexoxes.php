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
    <title>ΑμεΑ - Προεξοχές</title>

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
        $page = 'four'; include(dirname(__FILE__)."/header.php");
    ?>

    <!--== Start ==-->
    <section id="car-list-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Main Start -->
                <div class="col-lg-8">
                    <div class="car-details-content">
                        <h2>ΣΤΑΣΕΙΣ ΜΕ ΠΡΟΕΞΟΧΕΣ</h2>
                        <div class="car-details-info blog-content">
                            <div style="font-size: 19px;">
                                <p>
                                    Για την καλύτερη εξυπηρέτηση των επιβατών αλλά και των ατόμων με αναπηρία ο ΟΑΣΑ έχει τοποθετήσει στις παρακάτω στάσεις ειδικές προεξοχές για την ευκολότερη πρόσβαση των επιβατών στα οχήματα (Λεωφορεία και Τρόλλεϋ).
                                </p>
                            </div>

                            <br>
                            <br>

                            <!-- Table Start -->
                            <table id="mytable" class="table-fill">
                                <thead>
                                    <tr>
                                        <th onclick="sortTable(0)" class="text-left" style="padding-right: 5px;">Κωδικός<i class="fa fa-fw fa-sort"></i></th>
                                        <th onclick="sortTable(1)" class="text-left" style="padding-right: -20px;">Στάση<i class="fa fa-fw fa-sort"></i></th>
                                        <th onclick="sortTable(2)" class="text-left" style="padding-right: 5px;">Οδός<i class="fa fa-fw fa-sort"></i></th>
                                        <th onclick="sortTable(3)" class="text-left" style="padding-right: 10px;">Δήμος<i class="fa fa-fw fa-sort"></i></th>
                                    </tr>
                                </thead>
                                <tbody class="table-hover">
                                    <tr>
                                        <td class="text-left">010058</td>
                                        <td class="text-left">Αστυνομία</td>
                                        <td class="text-left">Στεφάνου Σαράφη</td>
                                        <td class="text-left">Αγίας Βαρβάρας</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">010062</td>
                                        <td class="text-left">Λυκούργου</td>
                                        <td class="text-left">Λυκούργου</td>
                                        <td class="text-left">Αγίας Βαρβάρας</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">040078</td>
                                        <td class="text-left">3η Ασυρμάτου</td>
                                        <td class="text-left">Ασυρμάτου</td>
                                        <td class="text-left">Άγιος Δημήτριος</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">060038</td>
                                        <td class="text-left">1η Βαλτίνων</td>
                                        <td class="text-left">Βαλτίνων</td>
                                        <td class="text-left">Αθηναίων</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">090167</td>
                                        <td class="text-left">Interamerican</td>
                                        <td class="text-left">Αγίου Κωνσταντίνου</td>
                                        <td class="text-left">Αμαρουσίου</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">140003</td>
                                        <td class="text-left">Αγορά Βύρωνα</td>
                                        <td class="text-left">Λεωφόρος Κύπρου</td>
                                        <td class="text-left">Βύρωνα</td>
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
                            <h3>ΧΑΡΤΗΣ</h3>

                            <div class="sidebar-body">
                                <ul class="recent-tips">
                                    <li class="single-recent-tips">
                                        <div class="recent-tip-body" style="text-align: center; padding-right: 20px">
                                            <h4><a href="coming_soon.php">Αποθηκεύστε όλες τις στάσεις με προεξοχές στο Google Maps</a></h4>
                                        </div>
                                    </li>
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
    <!--== End ==-->

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