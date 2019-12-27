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
    <title>ΑμεΑ</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../../website/css/header_footer.css" type="text/css">
    <link rel="stylesheet" href="../../website/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../website/css/amea.css" type="text/css">
</head>

<body>
    <?php
        $page = 'four'; include(dirname(__FILE__)."/header.php");
    ?>

    <!-- AMEA Front Page Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-item">
                       <div class="blog-pic instructions">
                        </div>
                        <div class="blog-text">
                            <h2>Γενικές Οδηγίες</h2>
                            <p>Το πρόβλημα της μετακίνησης των ατόμων με αναπηρία στις σύγχρονες πόλεις παραμένει έντονο με αρνητικές συνέπειες στην ποιότητα ζωής τους λόγω της μη ικανοποιητικής πρόσβασης στα ΜΜΜ. Η κακή ποιότητα των  παρεχομένων υπηρεσιών δημιουργούν συνθήκες αποκλεισμού των ατόμων με αναπηρία στην καθημερινή τους ζωή. Ο σχεδιασμός και η ανάπτυξη των μέσων μεταφοράς δεν καλύπτει μόνο τις υπάρχουσες ανάγκες μιας μετακίνησης του πληθυσμού αλλά σχεδιάζεται να προσελκύει όλο και περισσότερες ομάδες νέων επιβατών, απαλείφοντας προβλήματα κοινωνικού αποκλεισμού και προσφέροντας καλύτερες υπηρεσίες σε  όλους τους χρήστες. Για αυτό τον λόγο για τα άτομα με αναπηρία έχει ληφθεί ειδική μέριμνα που διευκολύνει τις μετακινήσεις τους με την Αστική Συγκοινωνία.</p>
                            <a href="instructions.php" class="primary-btn">Διαβάστε Περισσότερα</a>
                        </div>
                    </div>
                    <div class="blog-item">
                       <div class="blog-pic stations">
                        </div>
                        <div class="blog-text">
                            <h2>Ειδικά Διαμορφωμένες Στάσεις</h2>
                            <p>Για την καλύτερη εξυπηρέτηση των επιβατών αλλά και των ατόμων με αναπηρία ο ΟΑΣΑ έχει τοποθετήσει σε διάφορες στάσεις ειδικές προεξοχές για την ευκολότερη πρόσβαση των επιβατών στα οχήματα (Λεωφορεία και Τρόλλεϋ). Σύμφωνα με τις προδιαγραφές έχουν τοποθετηθεί στις στάσεις των λεωφορείων μη μόνιμες μονάδες από οπλισμένο σκυρόδεμα με στόχο τη διευκόλυνση της επιβίβασης / αποβίβασης των επιβατών στα λεωφορεία, εξασφαλίζοντας την ασφάλεια τους κατά τη διάρκεια της αναμονής τους στην στάση, αφού οι προεξοχές εξασφαλίζουν τη μη στάθμευση οχημάτων στο χώρο αυτής.</p>
                            <a href="proexoxes.php" class="primary-btn">Διαβάστε Περισσότερα</a>
                        </div>
                    </div>
                    <div class="blog-item">
                       <div class="blog-pic works">
                        </div>
                        <div class="blog-text">
                            <h2>Στάσεις, ανελκυστήρες και κυλιόμενες σκάλες</h2>
                            <p>Δείτε ποιοι σταθμοί, στάσεις, ανελκυστήρες και κυλιόμενες σκάλες βρίσκονται εκτός λειτουργίας για προγραμματισμένες εργασίες.</p>
                            <a href="works.php" class="primary-btn">Διαβάστε Περισσότερα</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- AMEA Front Page End -->

    <?php
        include(dirname(__FILE__)."/footer.php");
    ?>
</body>

<script src="../javascript/modal.js"></script>

</html>