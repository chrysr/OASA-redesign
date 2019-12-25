<?php
// Start the session
session_start();
?>

<?php
    $card=false;
    $mail=false;
    $reset=false;
    if(isset($_POST['card']))
    {    
        $servername="127.0.0.1";
        $username="root";
        $password="";
        $dbname="oasa";
    
        $connection=new mysqli($servername,$username,$password,$dbname);
        
        if($connection->connect_error)
            die("Connection failed: ".$connection->connect_error);
        
        $sql="SELECT * FROM users WHERE users.card=".$_POST['card']." and users.email='".$_POST['email']."'";
        //print $sql;
        if(($result=$connection->query($sql))&&$result->num_rows==1)
        {
            //success
            print 'epanafora ok';
            $sql='UPDATE users SET password="'.$_POST['password'].'" WHERE card='.$_POST['card'];
            if(($result=$connection->query($sql)))
            {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('O κωδικός σας άλλαξε με επιτυχία');
                </script>");
            }
            
        } 
        else 
        {
            $sql="SELECT * FROM users where users.card=".$_POST['card'];
            //print $sql;
            if(!($result=$connection->query($sql))||$result->num_rows==0)
                $card=true;
            else
            {
                $sql="SELECT * FROM users where users.email='".$_POST["email"]."' and users.card=".$_POST['card'];
                //print $sql;
                if(!($result=$connection->query($sql))||$result->num_rows==0)
                    $mail=true;
            }
                
            // else
            // {
            //     //print $result->num_rows."\n\n\n";
            //     $sql="SELECT * FROM users where users.card=".$_POST['card']." and users.password=".$_POST['password'];
            //     //print $sql;
            //     if(!($result=$connection->query($sql))||$result->num_rows==0)
            //         $pass=true;
            // }
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
        $page='zero'; include(dirname(__FILE__)."/header.php");
    ?>   
    

    <div class="container-fluid" style="padding: 112px 0rem 0rem 0rem; background-color: black; background-size:contain; background-position: center center;background-repeat: no-repeat; background-image: url('../images/login-background.jpg')">
        <div class="row">
            <div class="container" style="margin-bottom:0rem; padding:4rem 0 4rem 0; padding-right:44rem">
                <div class="d-flex justify-content-center h-100">
                    <div class="cardlogin" style="border-radius:10px;">
                        <div class="card-header" style="color: white">
                            <h3>Επαναφορά Κωδικού</h3>
                        </div>
                        <div class="card-body">
                            <form action="forgot.php" method="POST">
                                <!-- <span style="color:white">ATH.ENA Card Number*</span> -->
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-id-card" title="Αριθμός ATH.ENA Card"></i></span>
                                    </div>
                                    <!-- <input type="tel" name='card' class="form-control" placeholder="ATH.ENA Card Number" pattern=".{16}" required title="ATH.ENA Card has 16 digits" > -->
                                    <?php if($card==true) print '<input type="tel" pattern=".{16}" name="card" class="form-control is-invalid" value="'.(isset($_POST['card'])?$_POST['card']:'').'" placeholder="Αριθμός ATH.ENA Card" required title="Η ATH.ENA Card έχει 16 ψηφία" >' ?>
                                    <?php if($card==false) print '<input type="tel" pattern=".{16}"  name="card" class="form-control '.(isset($_POST['card'])?'is-valid ':'').'" value="'.(isset($_POST['card'])?$_POST['card']:'').'" placeholder="Αριθμός ATH.ENA Card" required title="Η ATH.ENA Card έχει 16 ψηφία" >' ?>
                                    <?php if($card) print '<div style="font-size:15px;" class="invalid-feedback">
                                        Ο αριθμός κάρτας δεν υπάρχει
                                    </div> ' ?>
                                </div>
                                <!-- <span style="color:white">Password*</span> -->
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope" title="Διεύθυνση Ηλεκτρονικού Ταχυδρομίου"></i></span>
                                    </div>
                                    <?php if($mail==false) print '<input type="email" name="email" value="'.((isset($_POST['email']))?$_POST['email']:'').'"  class="form-control" placeholder="E-mail" title="Διεύθυνση Ηλεκτρονικού Ταχυδρομίου" required>' ?>
                                    <?php if($mail==true) print '<input type="email" name="email" value="'.((isset($_POST['email']))?$_POST['email']:'').'" class="form-control is-invalid" placeholder="E-mail" title="Διεύθυνση Ηλεκτρονικού Ταχυδρομίου" required>' ?>
                                    <?php if($mail) print '<div style="font-size:15px;" class="invalid-feedback">
                                        Το email δεν είναι σωστό 
                                    </div> ' ?>
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key" title="Νέος Κωδικός Πρόσβασης"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control" placeholder="Νέος Κωδικός Πρόσβασης" title="Νέος Κωδικός Πρόσβασης" required>
                                </div>
                                
                                <br>
                                <div class="form-group">
                                    <input type="submit" value="Επαναφορά" class="btn float-right login_btn">
                                </div>
                            </form>
                        </div>
                        <div class="card-footer" style="vertical-align:middle;padding:1rem 0 1rem 0;margin-top:1.25rem;background-color: #212529; border-radius:10px;">
                            <div class="d-flex justify-content-center links">
                                Επιστροφή στη σελίδα σύνδεσης<a style="padding-left:5px" href="./login.php">Σύνδεση</a>
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