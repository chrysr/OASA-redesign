<!DOCTYPE html>
<html lang="el">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Υπό Κατασκευή</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../../website/css/header_footer.css" type="text/css">
    <link rel="stylesheet" href="../../website/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../website/css/coming_soon.css" type="text/css">
</head>

<body>
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="logo">
                <a href="../../index.php"><img src="../images/logo.png" alt="Αρχική"></a>
            </div>
            <nav class="main-menu mobile-menu">
                <ul>
                    <li class="active"><a href="../../index.php">Υπολογισμός Διαδρομής</a></li>
                    <li><a href="coming_soon.php">Εισιτήρια</a></li>
                    <li><a href="coming_soon.php">Δρομολόγια</a></li>
                    <li><a href="coming_soon.php">Πληροφορίες</a></li>
                    <li><a href="coming_soon.php">Επικοινωνία</a></li>
                </ul>
            </nav>
            <div class="header-right">
                <div class="user-access">
                    <a href="coming_soon.php">Εγγραφή/</a>
                    <a href="coming_soon.php">Σύνδεση</a>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Countdown Section Begin -->
    <div class="main_header">
        <div class="main">
            <p>Η σελίδα είναι υπό κατασκευή</p>
            <h1>ΣΥΝΤΟΜΑ ΚΟΝΤΑ ΣΑΣ</h1>
            <hr>
            <p id="launch"></p>
        </div>
   </header>
    <!-- Countdown Section End -->

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
                <div class="col-lg-6 col-sm-6">
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
                        <div class="last">
                            <h4>Social Media</h4>
                            <ul>
                                <li>Instagram</li>
                                <li>Facebook</li>
                                <li>YouTube</li>
                                <li>Twitter</li>
                                <li>SoundCloud</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
</body>

<script>
    var countDownDate = new Date("Jan 27, 2020 00:00:00").getTime();
    var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / (1000));

        document.getElementById("launch").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
    }, 1000);
</script>

</html>