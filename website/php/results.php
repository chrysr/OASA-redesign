<?php
    // Storing the values from the user
    $starting_station = $_POST["start"];
    $ending_station = $_POST["destination"];
    $date = $_POST["date"];
    $time = $_POST["time"];
?>

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
            echo '<div class="container" style="padding-top: 80px; max-width: 640px;">
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
                        echo '</div>';
                        echo '</li>'; 
                    }
                    echo '<li>';
                    echo '<button class="acc_ctrl"><h2>(' . $row["total_time"] . ' λεπτ.)</h2></button>';
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
            echo '</div>';
            echo '</li>'; 
            echo '</ul>
            </div>';
        } else {
            echo "0 results";
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