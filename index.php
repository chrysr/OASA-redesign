<!DOCTYPE html>
<html lang="el">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ΟΑΣΑ</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="website/css/header_footer.css" type="text/css">
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
                    <li><a href="website/php/coming_soon.php">Εισιτήρια</a></li>
                    <li><a href="website/php/coming_soon.php">Δρομολόγια</a></li>
                    <li>
                        <div class="dropdown">
                            <a class="dropbtn">Πληροφορίες</a>
                            <div class="dropdown-content">
                                <a href="website/php/coming_soon.php">Σταθμοί</a>
                                <a href="website/php/amea.php">ΑμεΑ</a>
                                <a href="website/php/coming_soon.php">Νέα & Ανακοινώσεις</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown">
                            <a class="dropbtn">Επικοινωνία</a>
                            <div class="dropdown-content">
                                <a href="website/php/coming_soon.php">Επικοινωνία με τον ΟΑΣΑ</a>
                                <a href="website/php/coming_soon.php">Συχνές Ερωτήσεις</a>
                                <a href="website/php/coming_soon.php">Σχετικά με τον ΟΑΣΑ</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="header-right">
                <div class="user-access">
                    <a href="website/php/coming_soon.php">Εγγραφή/</a>
                    <a href="website/php/login.php">Σύνδεση</a>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <?php
        include(dirname(__FILE__)."/website/php/header.php");
    ?>
    
    <!-- Hero Section Begin -->
    <section class="hero-section set-bg">
    </section>
    <!-- Hero Section End -->

    <!-- Cards Section Begin-->
    <div class="container-fluid" style="padding: 4rem 8rem 8rem 8rem; background-color: #F9F9F9;">
        <div class="row">
			<div class="col-md-4">
				<div class="card">
                    <a href="">
					    <img src="website/images/ticket_front_page.jpeg" class="card-img-top" alt="Tickets">
                    </a>
					<div class="card-body">
						<a href="">
                            <h5 class="card-title">Εισιτήρια</h5>
                        </a>
						<p class="card-text">Αγοράστε και επαναφορτίστε ηλεκτρονικά την ΑΤΗ.ΕΝΑ κάρτα σας</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<a href="">
                        <img src="website/images/news_front_page.jpeg" class="card-img-top" alt="News">
                    </a>
					<div class="card-body">
                        <a href="">
                            <h5 class="card-title">Νέα</h5>
                        </a>
						<p class="card-text">Ενημερωθείτε για εκδηλώσεις και έργα που μπορεί να επηρεάσουν το ταξίδι σας</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
                    <a href="">
					    <img src="website/images/places_front_page.jpeg" class="card-img-top" alt="Places">
                    </a>
					<div class="card-body">
                    <a href="">
                            <h5 class="card-title">Σημεία Ενδιαφέροντος</h5>
                        </a>
						<p class="card-text">Δείτε ενδιαφέροντα σημεία που μπορείτε να επισκεφθείτε με τον ΟΑΣΑ</p>
					</div>
				</div>
			</div>
		</div>
    </div>
    <!-- Cards Section End-->

    <?php
        include(dirname(__FILE__)."/website/php/footer.php");
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