<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="el">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ΟΑΣΑ</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/header_footer.css" type="text/css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<body>
    <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
        {
            header('Location: ./account.php');
            die();
        }
    ?>
    <!-- Header Section Begin -->
    <?php
        include(dirname(__FILE__)."/header.php");
    ?>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <!-- <section class="hero-section set-bg2">
    </section> -->
    <!-- Hero Section End -->

    <!-- Cards Section -->
    
            <!-- <h1>SET</h1> -->
           

             <!-- <h1>$_POST['card']." ".$_POST['password']</h1>; -->
        
    
    <div class="container-fluid" style="padding: 14rem 8rem 12rem 8rem; background-color: #1d1d1d; background-position: center center;background-repeat: no-repeat; background-image: url('../images/signup-background.jpg')">
        <div class="row">
            <div class="container">
                <div class="d-flex justify-content-center h-100">
                    <div class="cardsignup">
                        <div class="card-header" style="color: white">
                            <h3>Εγγραφή</h3>
                        </div>
                        <div class="card-body">
                            <form action="register.php" method="POST">
                                <!-- <span style="color:white">ATH.ENA Card Number*</span> -->
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-id-card" title="Αριθμός ATH.ENA Card"></i></span>
                                    </div>
                                    <!-- <input type="tel" name='card' class="form-control" placeholder="ATH.ENA Card Number" pattern=".{16}" required title="ATH.ENA Card has 16 digits" > -->
                                    <input type="tel" name='card' class="form-control" placeholder="Αριθμός ATH.ENA Card" required title="Η ATH.ENA Card έχει 16 ψηφία" >

                                </div>
                                <!-- <span style="color:white">Password*</span> -->
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key" title="Κωδικός Πρόσβασης"></i></span>
                                    </div>
                                    <input type="password" name='password' class="form-control" placeholder="Κωδικός Πρόσβασης" title="Κωδικός Πρόσβασης" required>
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope" title="Διεύθυνση Ηλεκτρονικού Ταχυδρομίου"></i></span>
                                    </div>
                                    <input type="email" name='email' class="form-control" placeholder="E-mail" title="Διεύθυνση Ηλεκτρονικού Ταχυδρομίου" required>
                                </div>
                                <div class="row">
                                    <div class="form-group name1 col-md-6">
                                        <input type="text" class="form-control" name="firstaname" title="Όνομα" required placeholder="Όνομα">
                                    </div>

                                    <div class="form-group name2 col-md-6">
                                        <input type="text" class="form-control" name="lastname" title="Επίθετο" required placeholder="Επίθετο">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Εγγραφή" class="btn float-right login_btn">
                                </div>
                            </form>
                        </div>
                    </div>
	            </div>
            </div>
		</div>
    </div>
    <!-- Cards -->

    <!-- Footer Section Begin -->
    <?php
        include(dirname(__FILE__)."/footer.php");
    ?>
    <!-- Footer Section End -->

    <div class="bg-modal">
        <div class="modal-content">
            <div class="close">+</div>
            <img src="../images/email_subscription.png" alt="Email Subscription">
            <h3>Ευχαριστούμε για την εγγραφή!</h3>
        </div>
    </div>

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