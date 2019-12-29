<?php
// Start the session
session_start();
?>

<?php
    $card=false;
    $pass=false;
    if(isset($_POST['card']))
    {    
        $servername="127.0.0.1";
        $username="root";
        $password="";
        $dbname="oasa";
    
        $connection=new mysqli($servername,$username,$password,$dbname);
        
        if($connection->connect_error)
            die("Connection failed: ".$connection->connect_error);
        
        $sql="SELECT * FROM users WHERE users.card=".$_POST['card']." and users.password='".$_POST['password']."'";
        //print $sql;
        if(($result=$connection->query($sql))&&$result->num_rows==1)
        {
            //success
            $_SESSION['loggedin']=true;
            $_SESSION['card']=$_POST['card'];
        } 
        else 
        {
            $sql="SELECT * FROM users where users.card=".$_POST['card'];
            //print $sql;
            if(!($result=$connection->query($sql))||$result->num_rows==0)
                $card=true;
                
            else
            {
                //print $result->num_rows."\n\n\n";
                $sql="SELECT * FROM users where users.card=".$_POST['card']." and users.password=".$_POST['password'];
                //print $sql;
                if(!($result=$connection->query($sql))||$result->num_rows==0)
                    $pass=true;
            }
            //nosuccess
        }
        $connection->close();
        //header('Location: ./login.php');
        //set env for signin/signup
        //die();
    }
?>
<!DOCTYPE html>
<html lang="el">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/images/favicon.ico">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Σύνδεση</title>

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
<style>
    .bln{
        color:#007bff;
        background-color:#212529;
    }
    .bln:hover{
        background-color:#212529;
        opacity:0.6;
    }
</style>
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
        $page='six'; include(dirname(__FILE__)."/header.php");
    ?>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <!-- <section class="hero-section set-bg2">
    </section> -->
    <!-- Hero Section End -->

    <!-- Cards Section -->
    
            <!-- <h1>SET</h1> -->
           

             <!-- <h1>$_POST['card']." ".$_POST['password']</h1>; -->
        
    

    <div class="container-fluid" style="padding-top: 100px; background-color: black; background-size:contain; background-position: center center;background-repeat: no-repeat; background-image: url('../images/login-background.jpg')">
        <div class="row">
            <div class="container" style="margin-bottom:0rem; padding:4rem 0 4rem 0; padding-right:44rem">
                <div class="d-flex justify-content-center h-100">
                    <div class="cardlogin" style="border-radius:10px;">
                        <div class="card-header" style="color: white">
                            <h3>Σύνδεση</h3>
                        </div>
                        <div class="card-body">
                            <form action="login.php" method="POST">
                                <!-- <span style="color:white">ATH.ENA Card Number*</span> -->
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-id-card" title="Αριθμός ATH.ENA Card"></i></span>
                                    </div>
                                    <!-- <input type="tel" name='card' class="form-control" placeholder="ATH.ENA Card Number" pattern=".{16}" required title="ATH.ENA Card has 16 digits" > -->
                                    <?php if($card==true) print '<input pattern="[0-9]{16}" type="tel" name="card" class="form-control is-invalid" value="'.(isset($_POST['card'])?$_POST['card']:'').'" placeholder="Αριθμός ATH.ENA Card" required title="Η ATH.ENA Card έχει 16 ψηφία" >' ?>
                                    <?php if($card==false) print '<input pattern="[0-9]{16}" type="tel" name="card" class="form-control '.(isset($_POST['card'])?'is-valid ':'').'" value="'.(isset($_POST['card'])?$_POST['card']:'').'" placeholder="Αριθμός ATH.ENA Card" required title="Η ATH.ENA Card έχει 16 ψηφία" >' ?>
                                    <?php if($card) print '<div style="font-size:15px;" class="invalid-feedback">
                                        Αυτός ο αριθμός κάρτας δεν έχει εγγραφεί
                                    </div> ' ?>
                                </div>
                                <!-- <span style="color:white">Password*</span> -->
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key" title="Κωδικός Πρόσβασης"></i></span>
                                    </div>
                                    <?php if($pass==true) print '<input type="password" name="password" class="form-control is-invalid" placeholder="Κωδικός Πρόσβασης" title="Κωδικός Πρόσβασης" required>' ?>
                                    <?php if($pass==false) print '<input type="password" name="password" class="form-control" placeholder="Κωδικός Πρόσβασης" title="Κωδικός Πρόσβασης" required>' ?>
                                    <?php if($pass) print '<div style="font-size:15px;" class="invalid-feedback">
                                        Λανθασμένος Κωδικός Πρόσβασης
                                    </div> ' ?>
                                </div>
                                <div class="row align-items-center remember">
                                    <input type="checkbox">Να παραμένω συνδεδεμένος
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Σύνδεση" class="btn float-right login_btn">
                                </div>
                            </form>
                        </div>
                        <div class="card-footer" style="margin-top:1.25rem;background-color: #212529; border-radius:10px;">
                            <div class="d-flex justify-content-center links">
                                Δεν έχετε εγγραφεί;<a style="padding-left:5px" href="./signup.php">Εγγραφή</a>
                            </div>
                            <br>
                            <div class="d-flex justify-content-center links">
                                <form action="forgot.php" method="post" >    
                                    Ξεχάσατε τον κωδικό σας;<input name="forg" style="border:none;padding:0;margin:0;vertical-align:middle;" class="btn login_btn bln" type="submit" value="Επαναφορά">                 
                                </form>
                            </div>
                        </div>
                    </div>
	            </div>
            </div>
		</div>
    </div>
    <!-- Cards -->

    <!-- Footer Section Begin -->
    <?php
        $page='zero';  include(dirname(__FILE__)."/footer.php");
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

<script src="../javascript/modal.js"></script>

</html>