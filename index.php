<!DOCTYPE html>
<html lang="el">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ΟΑΣΑ</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="website/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="website/css/style.css" type="text/css">
</head>

<body>
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="logo">
                <a href="./index.php"><img src="website/images/logo.png" alt="Αρχική"></a>
            </div>
            <nav class="main-menu mobile-menu">
                <ul>
                    <li class="active"><a href="index.php">Υπολογισμός Διαδρομής</a></li>
                    <li><a href="how-it-works.html">Εισιτήρια</a></li>
                    <li><a href="listings.html">Δρομολόγια</a></li>
                    <li><a href="blog.html">Πληροφορίες</a></li>
                    <li><a href="contact.html">Επικοινωνία</a></li>
                </ul>
            </nav>
            <div class="header-right">
                <div class="user-access">
                    <a href="#">Εγγραφή/</a>
                    <a href="#">Σύνδεση</a>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero-section set-bg">
        
    </section>
    <!-- Hero Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="#" class="newslatter-form">
                        <input type="text"
                            placeholder="Εισάγετε το email σας για να λαμβάνετε ενημερώσεις σχετικά με τον ΟΑΣΑ">
                        <button type="submit">Εγγραφή</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget">
                        <h4>Usefull Links</h4>
                        <ul>
                            <li>About us</li>
                            <li>Testimonials</li>
                            <li>How it works</li>
                            <li>Create an account</li>
                            <li>Our Services</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget">
                        <h4>Categories</h4>
                        <ul>
                            <li>Hotels</li>
                            <li>Restaurant</li>
                            <li>Spa & resorts</li>
                            <li>Concert & Events</li>
                            <li>Bars & Pubs</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget">
                        <h4>Usefull Links</h4>
                        <ul>
                            <li>About us</li>
                            <li>Testimonials</li>
                            <li>How it works</li>
                            <li>Create an account</li>
                            <li>Our Services</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget">
                        <h4>Usefull Links</h4>
                        <ul>
                            <li>About us</li>
                            <li>Testimonials</li>
                            <li>How it works</li>
                            <li>Create an account</li>
                            <li>Our Services</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
</body>

</html>

<?php
    print "hey\n";
    echo "hello?";
    $servername="127.0.0.1";
    $username="root";
    $password="";
    $dbname="oasa";
    
    $connection=new mysqli($servername,$username,$password,$dbname);
    
    if($connection->connect_error)
    {
        die("Connection failed: ".$connection->connect_error);
    }
    print "ok";

    $sql="SELECT * FROM users";
    $result=$connection->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        }
    } else {
        echo "0 results";
    }
    $connection->close();
?>