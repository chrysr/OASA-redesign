<?php
// Start the session
session_start();
?>
<?php
    $exists=false;
    if(isset($_POST['card']))
    {
        $servername="127.0.0.1";
        $username="root";
        $password="";
        $dbname="oasa";
        
        $connection=new mysqli($servername,$username,$password,$dbname);
        if($connection->connect_error)
            die("Connection failed: ".$connection->connect_error);
            
        $sql="SELECT * FROM users WHERE users.card=".$_POST['card'];
        //print $sql;
        if(($result=$connection->query($sql))&&$result->num_rows>0)
            $exists=true;
        else
        {            
            $sql="INSERT INTO users (firstname,lastname,email,card,password) VALUES ('".$_POST["firstname"]."','".$_POST["lastname"]."','".$_POST["email"]."','".$_POST["card"]."','".$_POST["password"]."')";
            print $sql;
            if($connection->query($sql))
            {
                $connection->close();
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Η εγγραφή σας ολοκληρώθηκε με επιτυχία');
                window.location.href='./login.php';
                </script>");

            }
            else
            {
                $connection->close();
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Υπήρξε κάποιο σφάλμα');
                window.location.href='./signup.php';
                </script>");
            }
        }
    }
    //$exists=true;
?>
<!DOCTYPE html>
<html lang="el">

<head>
    <link rel="shortcut icon" type="image/x-icon" href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/images/favicon.ico">

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
       $page='zero';  include(dirname(__FILE__)."/header.php");
    ?>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <!-- <section class="hero-section set-bg2">
    </section> -->
    <!-- Hero Section End -->

    <!-- Cards Section -->
    
            <!-- <h1>SET</h1> -->
           

             <!-- <h1>$_POST['card']." ".$_POST['password']</h1>; -->
        
    

    <div class="container-fluid" style="padding: 112px 0rem 0rem 0rem; background-size:contain; background-color: black; background-position: center center;background-repeat: no-repeat; background-image: url('../images/signup-background.jpg')">
        <div class="row">
            <div class="container" style="margin-bottom:0rem; padding:4rem 0 4rem 0; padding-right:44rem">
                <div class="d-flex justify-content-center h-100">
                    <div class="cardsignup" style="border-radius:10px;">
                        <div class="card-header" style="color: white">
                            <h3>Εγγραφή</h3>
                        </div>
                        <div class="card-body card-body-signup">
                            <form action="signup.php" method="POST">
                                <!-- <span style="color:white">ATH.ENA Card Number*</span> -->
                                <?php if($exists==true) print '<span class="error text-danger">Αυτός ο αριθμός κάρτας έχει ήδη εγγραφεί</span>' ?>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-id-card" title="Αριθμός ATH.ENA Card"></i></span>
                                    </div>
                                    <!-- <input type="tel" name='card' class="form-control" placeholder="ATH.ENA Card Number" pattern=".{16}" required title="ATH.ENA Card has 16 digits" > -->
                                    <?php if($exists==true) print '<input type="tel" name="card" class="form-control is-invalid" placeholder="Αριθμός ATH.ENA Card" required title="Η ATH.ENA Card έχει 16 ψηφία" >' ?>
                                    <?php if($exists==false) print '<input type="tel" name="card" class="form-control" placeholder="Αριθμός ATH.ENA Card" required title="Η ATH.ENA Card έχει 16 ψηφία" >' ?>


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
                                    <?php print '<input type="email" name="email" value="'.(isset($_POST['email'])?$_POST['email']:'').'" class="form-control" placeholder="E-mail" title="Διεύθυνση Ηλεκτρονικού Ταχυδρομίου" required>' ?>
                                </div>
                                <div class="row">
                                    <div class="form-group name1 col-md-6">
                                        <?php print '<input type="text" class="form-control" value="'.(isset($_POST['firstname'])?$_POST['firstname']:'').'"name="firstname" title="Όνομα" required placeholder="Όνομα">' ?>
                                    </div>

                                    <div class="form-group name2 col-md-6">
                                        <?php print '<input type="text" class="form-control" value="'.(isset($_POST['lastname'])?$_POST['lastname']:'').'"name="lastname" title="Επίθετο" required placeholder="Επίθετο">' ?>
                                    </div>
                                </div>
                                <div class="form-group" style="padding-top:1rem">
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