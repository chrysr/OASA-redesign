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
    <title>Δρομολόγιο <?php echo $_GET['TID']?> </title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../../website/css/header_footer.css" type="text/css">
    <link rel="stylesheet" href="../../website/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../website/css/timetables_results.css" type="text/css">
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
            <li class="breadcrumb-item" style="color:rgb(64, 152, 190);"><a style="color:inherit;" href="#">Εμφάνιση Δρομολογίου</a></li>
        </ol>
    </nav>

    <!--== Start ==-->
    <section class="section-padding">
        <div class="container" style="width: 1000px">
            <div class="row">
                <!-- Main Start -->
                <div class="timetable-details-content">
                    <?php
                        $line_var = $_GET['TID'];

                        // Connecting to the database
                        $servername="127.0.0.1";
                        $username="root";
                        $password="";
                        $dbname="sdi1500205";
                        
                        $connection=new mysqli($servername,$username,$password,$dbname);

                        if($connection->connect_error)
                            die("Connection failed: ".$connection->connect_error);

                        // Querying the database
                        $sql="select * FROM timetables WHERE line_name LIKE '%$line_var%'";
                        $result=$connection->query($sql);

                        if ($result->num_rows > 0) {
                            $curr_row = 1;

                            while($row = $result->fetch_assoc()) {
                                if ($curr_row == 1) {
                                    echo '<h2 class="'; 
                                    if ($row["line_name"] == 'Μ1') {
                                        echo 'm1_c';
                                    } else if ($row["line_name"] == 'Μ2') {
                                        echo 'm2_c';
                                    } else if ($row["line_name"] == 'Π1') {
                                        echo 'p1_c';
                                    } else {
                                        echo 'bus_c';
                                    }
                                    echo '">Δρομολόγιο ' . $row["line_name"] . '<p style="padding: 15px 0 0 20px; font-size: 18px;">' . $row["full_name"] . '</p></h2>';
                                    echo '<div class="timetable-details-info blog-content" style="width: 1000px">';
                                    echo '<br>';
                                    echo '<table class="table-fill">';
                                    echo '<tbody class="table-hover">';
                                    echo '<tr>
                                            <td class="text-left">';
                                    echo $curr_row . '. ' . $row["station"];
                                    echo         '<p class="address">Διεύθυνση: ' . $row["address"] . '</p>
                                            </td>
                                          </tr>';
                                } else {
                                    echo '<tr>
                                            <td class="text-left">';
                                    echo $curr_row . '. ' . $row["station"];
                                    echo         '<p class="address">Διεύθυνση: ' . $row["address"] . '</p>
                                            </td>
                                          </tr>';
                                }
    
                                $curr_row += 1;
                            }

                            echo '</tbody>
                                </table>
                                </div>';
                        } else {
                            echo '<h5>Δυστυχώς δεν υπάρχουν αποτελέσματα, δοκιμάστε μια <a href="timetables.php">καινούργια αναζήτηση</a>.</h5>';
                        }

                        $connection->close();
                    ?>
                </div>
                <!-- Main End -->
            </div>
        </div>
    </section>
    <!--== End ==-->

    <?php
        include(dirname(__FILE__)."/footer.php");
    ?>
</body>

<script src="../javascript/modal.js"></script>

</html>