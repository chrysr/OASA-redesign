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
    <title>Αναζήτηση Δρομολογίου</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../../website/css/header_footer.css" type="text/css">
    <link rel="stylesheet" href="../../website/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../website/css/timetables.css" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>

<body>
    <?php
        $page = 'three'; include(dirname(__FILE__)."/header.php");
    ?>

    <nav aria-label="breadcrumb" style="padding-top: 42px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" ><a href="../../index.php"><i style="color:black;" class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item" style="color:rgb(64, 152, 190);"><a style="color:inherit;" href="./timetables.php">Αναζήτηση Δρομολογίου</a></li>
        </ol>
    </nav>

    <div class="container-fluid" style="padding:60px 0 0 285px;">
        <h5 style="font-weight: bold;"><i style="padding-right: 10px;" class="fas fa-search"></i>Αναζήτηση</h5>
        <br>
        <div class="search-box">
            <input type="text" autocomplete="off" placeholder="Αναζητείστε σταθμό ή περιοχή" />
            <div class="result"></div>
        </div>
    </div>

    <div class="tab-wrapper">
        <ul class="tab-menu">
            <li class="active">Ηλεκτρικός</li>
            <li>Μετρό</li>
            <li>Λεωφορεία</li>
            <li>Τραμ</li>
            <li>Προαστιακός</li>
            <li>Τρόλεϊ</li>
        </ul>
        <div class="tab-content">
            <div>
                <h5>Επιλέξτε μια γραμμή</h5>
                <br>
                <a href="timetables_results.php?TID=<?php echo 'Μ1'; ?>" class="icon-border-m1">
                    <span>M1</span>
                </a>
            </div>
            <div>
                <h5>Επιλέξτε μια γραμμή</h5>
                <br>
                <a href="timetables_results.php?TID=<?php echo 'Μ2'; ?>" class="icon-border-m2">
                    <span>M2</span>
                </a>
                <a href="coming_soon.php" class="icon-border-m3">
                    <span>M3</span>
                </a>
            </div>
            <div>
                <h5>Επιλέξτε μια γραμμή</h5>
                <br>
                <p onClick = "openList(this)" id="l0" class="icon-border-l">
                    <span>0</span>
                </p>
                <p onClick = "openList(this)" id="l1" class="icon-border-l">
                    <span>1</span>
                </p>
                <p onClick = "openList(this)" id="l6" class="icon-border-l">
                    <span>6</span>
                </p>
                <ul id="lil0" style="display: none">
                    <li>
                        <a href="coming_soon.php" class="icon-border-l">
                            <span>022</span>
                        </a>
                    </li>
                    <li>
                        <a href="timetables_results.php?TID=<?php echo '024'; ?>" class="icon-border-l">
                            <span>024</span>
                        </a>
                    </li>
                    <li>
                        <a href="coming_soon.php" class="icon-border-l">
                            <span>049</span>
                        </a>
                    </li>
                </ul>
                <ul id="lil1" style="display: none">
                    <li>
                        <a href="coming_soon.php" class="icon-border-l">
                            <span>101</span>
                        </a>
                    </li>
                    <li>
                        <a href="coming_soon.php" class="icon-border-l">
                            <span>122</span>
                        </a>
                    </li>
                    <li>
                        <a href="timetables_results.php?TID=<?php echo '140'; ?>" class="icon-border-l">
                            <span>140</span>
                        </a>
                    </li>
                </ul>
                <ul id="lil6" style="display: none">
                    <li>
                        <a href="coming_soon.php" class="icon-border-l">
                            <span>602</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <h5>Επιλέξτε μια γραμμή</h5>
                <br>
                <a href="coming_soon.php" class="icon-border-tram">
                    <span>T</span>
                </a>
            </div>
            <div>
                <h5>Επιλέξτε μια γραμμή</h5>
                <br>
                <a href="timetables_results.php?TID=<?php echo 'Π1'; ?>" class="icon-border-p1">
                    <span>Π1</span>
                </a>
                <a href="coming_soon.php" class="icon-border-p2">
                    <span>Π2</span>
                </a>
                <a href="coming_soon.php" class="icon-border-p3">
                    <span>Π3</span>
                </a>
                <a href="coming_soon.php" class="icon-border-p4">
                    <span>Π4</span>
                </a>
            </div>
            <div>
                <h5>Επιλέξτε μια γραμμή</h5>
                <br>
                <a href="coming_soon.php" class="icon-border-t">
                    <span>T1</span>
                </a>
                <a href="coming_soon.php" class="icon-border-t">
                    <span>T2</span>
                </a>
                <a href="coming_soon.php" class="icon-border-t">
                    <span>T3</span>
                </a>
                <a href="coming_soon.php" class="icon-border-t">
                    <span>T4</span>
                </a>
                <a href="coming_soon.php" class="icon-border-t">
                    <span>T5</span>
                </a>
                <a href="coming_soon.php" class="icon-border-t">
                    <span>T6</span>
                </a>
            </div>
        </div><!-- //tab-content -->
    </div><!-- //tab-wrapper -->

    <?php
        include(dirname(__FILE__)."/footer.php");
    ?>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="../javascript/timetables.js"></script>
<script src="../javascript/modal.js"></script>

</html>