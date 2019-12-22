<?php
    // Storing the values from the user
    $starting_station = $_POST["start"];
    $ending_station = $_POST["destination"];
    $date_var = $_POST["date"];
    $time_var = $_POST["time"];
?>

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
    <title>Υπολογισμός Διαδρομής</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../../website/css/header_footer.css" type="text/css">
    <link rel="stylesheet" href="../../website/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../website/css/results.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
</head>

<body>
    <?php
        $page = 'one'; include(dirname(__FILE__)."/header.php");
    ?>

    <div class="row" style="padding-top: 200px; padding-left: 277px; max-width: 1760px; margin-bottom: -100px;">
    <!-- <div class="row" style="padding-top: 200px; padding-left: 615px; max-width: 1700px; margin-bottom: -100px;"> -->
        <div class="col-sm-10">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Αποτελέσματα αναζήτησης</h3>
                    <p style="font-size: 18px;" class="card-text">Από: <span style="font-weight: bold;"><?php echo $starting_station;?></span></p>
                    <p style="font-size: 18px;" class="card-text">Προς: <span style="font-weight: bold;"><?php echo $ending_station;?></span></p>
                    <?php
                        if ($date_var !== '') {
                            echo '<p style="font-size: 18px; class="card-text">Ημερομηνία: <span style="font-weight: bold;">';
                            echo $date_var . '&nbsp;';
                            echo '</span></p>';
                        }
                        if ($time_var !== '') {
                            echo '<p style="font-size: 18px; class="card-text">Ώρα: <span style="font-weight: bold;">';
                            echo $time_var . '&nbsp;';
                            echo '</span></p>';
                        } 
                    ?>
                    <i class="fa fa-map-marker" style="padding-right: 10px"></i><a style="font-size: 18px;" href="../../index.php">Νέα Αναζήτηση</a>
                </div>
            </div>
        </div>
    </div>

    <?php
        // Connecting to the database
        $servername="127.0.0.1";
        $username="root";
        $password="";
        $dbname="oasa";
        
        $connection=new mysqli($servername,$username,$password,$dbname);

        if($connection->connect_error)
            die("Connection failed: ".$connection->connect_error);

        // Querying the database
        $sql="select * FROM routes WHERE starting_station LIKE '%$starting_station%' AND ending_station LIKE '%$ending_station%'";
        $result=$connection->query($sql);
        
        if ($result->num_rows > 0) {
            echo '<div class="container" style="padding-top: 80px; max-width: 640px; margin-left: 262px">
            <ul class="acc">';
            $curr_scenario = 0;
            while($row = $result->fetch_assoc()) {
                if ($curr_scenario == $row["scenario"]) {
                    echo '<div class="station">
                            <h5>' . $row["current_station"] . '</h5>';
                    if ($row["action"] == "M1") {
                        echo "<div class='station-details-m1'>";        
                    } else if ($row["action"] == "M2") {
                        echo "<div class='station-details-m2'>";  
                    } else if ($row["action"] == "M3") {
                        echo "<div class='station-details-m3'>";
                    } else {
                        echo "<div class='station-details-bus'>";
                    }
                    echo        '<p style="font-size: 20px">';
                    if ($row["action"] == "M1") {
                        echo "<span class='action-m1'>";        
                    } else if ($row["action"] == "M2") {
                        echo "<span class='action-m2'>";  
                    } else if ($row["action"] == "M3") {
                        echo "<span class='action-m3'>";
                    } else {
                        echo "<span class='action-bus'>";
                    }
                    echo            $row["action"] . '</span> &nbsp;'
                                    . $row["explanation"] .
                                '</p>
                                
                                <p>' . $row["time_stations"] . '</p>
                            </div>
                        </div>';
                } else {
                    if ($curr_scenario != 0) {
                        echo '<div class="eye"><h5>' . $ending_station . '</h5></div>';
                        echo '<br>';
                        echo '<span style="padding: 150px 0 0 6px;">Κόστος Εισιτηρίου: ' . $row["ticket"] . '</span>';
                        echo '</div>';
                        echo '</li>'; 
                    }
                    echo '<li>';
                    echo '<button class="acc_ctrl"><h2>';
                    $ticket_last = $row["ticket"];
                    if ($time_var !== '') {
                        date_default_timezone_set("Europe/Athens");
                        $curr_time = $date_var . ' ' . $time_var;
                        $dt = new DateTime($curr_time, new DateTimeZone("Europe/Athens"));
                        echo $dt->format("h:ia"), ' ';

                        $adding = 'PT' . $row["total_time"] . 'M';
                        $dt->add(new DateInterval($adding));
                        echo $dt->format("h:ia"), PHP_EOL;
                    } else {
                        date_default_timezone_set("Europe/Athens");
                        $dt = new DateTime(date("Y-m-d h:i:s"), new DateTimeZone("Europe/Athens"));
                        echo $dt->format("h:ia"), ' ';
                        
                        $adding = 'PT' . $row["total_time"] . 'M';
                        $dt->add(new DateInterval($adding));
                        echo $dt->format("h:ia"), PHP_EOL;
                    }
                    echo '(';
                    if ($row["total_time"] > 60) {
                        $hours = (int)floor($row["total_time"] / 60);
                        $minutes = $row["total_time"] % 60;
                        echo $hours . '&nbsp;ώρ.&nbsp;&nbsp;' . $minutes . '&nbsp;λεπτ.';
                    } else {
                        echo $row["total_time"] . ' λεπτ.';
                    }
                    echo ')</h2></button>';
                    echo '<div class="acc_panel">';
                    echo '<div class="station">
                            <h5>' . $row["current_station"] . '</h5>';
                    if ($row["action"] == "M1") {
                        echo "<div class='station-details-m1'>";        
                    } else if ($row["action"] == "M2") {
                        echo "<div class='station-details-m2'>";  
                    } else if ($row["action"] == "M3") {
                        echo "<div class='station-details-m3'>";
                    } else {
                        echo "<div class='station-details-bus'>";
                    }
                    echo        '<p style="font-size: 20px">';
                    if ($row["action"] == "M1") {
                        echo "<span class='action-m1'>";        
                    } else if ($row["action"] == "M2") {
                        echo "<span class='action-m2'>";  
                    } else if ($row["action"] == "M3") {
                        echo "<span class='action-m3'>";
                    } else {
                        echo "<span class='action-bus'>";
                    }
                    echo            $row["action"] . '</span> &nbsp;'
                                    . $row["explanation"] .
                                '</p>
                                
                                <p>' . $row["time_stations"] . '</p>
                            </div>
                        </div>';
                    $curr_scenario += 1;
                }
            }

            echo '<div class="eye"><h5>' . $ending_station . '</h5></div>';
            echo '<br>';
            echo '<span style="padding: 150px 0 0 6px;">Κόστος Εισιτηρίου: ' . $ticket_last . '</span>';
            echo '</div>';
            echo '</li>'; 
            echo '</ul>
            </div>';
        } else {
            echo '<div style="padding: 150px 0 100px 615px;">
            <h5>Δυστυχώς δεν υπάρχουν αποτελέσματα, δοκιμάστε μια <a href="../../index.php">καινούργια αναζήτηση</a>.</h5>
            </div>';
        }
        $connection->close();
    ?>

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