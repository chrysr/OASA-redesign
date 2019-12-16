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
        if(empty($_SESSION['loggedin']) || $_SESSION['loggedin'] == false)
        {
            header('Location: ./login.php');
            die();
        }
    ?>
    <!-- Header Section Begin -->
    <?php
        $page='zero'; include(dirname(__FILE__)."/header.php");
    ?>

    <!-- <?php 
        
        print $_SESSION['card'];
    ?> -->
    <?php
        if (isset($_POST['hid'])) {
            session_destroy();
            header('Location: ../../index.php');
        }
    ?>
    <div class="container-fluid" style="padding: 8rem 0rem 12rem 0rem; background-color: #1d1d1d;)">
        <div class="tab">
            <button class="tablinks" id="default" style="margin-left:0rem" onclick="option(event, '1')">Στοιχεία Κάρτας</button>
            <button class="tablinks" style="margin-left:0rem" onclick="option(event, '2')">Ληγμένα Εισιτήρια</button>
            <button class="tablinks" style="margin-left:0rem" onclick="option(event, '3')">Ενεργά Εισιτήρια</button>
            <button class="tablinks" style="margin-left:0rem" onclick="option(event, '4')">Αγορά Εισιτηρίου</button>
            <button class="tablinks" style="margin-left:0rem" onclick="option(event, '5')">Αλλαγή Κωδικού Πρόσβασης</button>

        </div>
        
            
        <div id="1" class="tabcontent">
            
            <?php
                $servername="127.0.0.1";
                $username="root";
                $password="";
                $dbname="oasa";
                $error=false;
                $edit=false;
                $connection=new mysqli($servername,$username,$password,$dbname);
                
                if($connection->connect_error)
                    die("Connection failed: ".$connection->connect_error);
                
                if(isset($_POST['update']))
                {
                    print "try to update";
                    $sql="SELECT * FROM users WHERE card=".$_SESSION['card'].' and password="'.$_POST['password'].'"';
                    if(($result=$connection->query($sql))&&$result->num_rows==1)
                    {
                        $sql='UPDATE users SET firstname="'.$_POST['firstname'].'",lastname="'.$_POST['lastname'].'",email="'.$_POST['email'].'" WHERE card='.$_SESSION['card'];
                        print $_POST['password'];
                        if(($result=$connection->query($sql)))
                        {
                            print "successfully updated";
                            echo ("<script LANGUAGE='JavaScript'>
                            window.alert('Τα στοιχεία σας ενημερώθηκαν με επιτυχία');
                            </script>");
                        }
                        else
                        {
                            print "error update";
                            $error=true;
                            //error
                        }
                    }
                    else
                    {
                        //error
                        $edit=true;
                        $error=true;
                    }
                    
                }
                else print "no update";
                
                $sql="SELECT * FROM users WHERE users.card=".$_SESSION['card'];
                //print $sql;
                if(($result=$connection->query($sql))&&$result->num_rows==1)
                {
                    $row=mysqli_fetch_assoc($result);
                    if(!isset($_POST['edit'])&&$edit==false)
                    {
                        print '
                        <div class="container" style="margin:0;">
                            <form action="account.php" method="POST">
                                <table style="width:40%; color:white;">
                                    <tr>
                                        <td>Αριθμός Κάρτας</td>
                                        <td>'.$row['card'].'</td>
                                    <tr>
                                    <tr>
                                        <td>Όνομα Κατόχου</td>
                                        <td>'.$row['firstname'].'</td>
                                    <tr>
                                    <tr>
                                        <td>Επίθετο Κατόχου</td>
                                        <td>'.$row['lastname'].'</td>
                                    <tr>
                                    <tr>
                                        <td>Διεύθυνση Email</td>
                                        <td>'.$row['email'].'</td>
                                    <tr>
                                </table>
                            </form>
                            <br>
                            <form action="account.php" method="POST">
                                <input type="hidden" value=1 name="edit">
                                <input type="submit" value="Επεξεργασία Δεδομένων">
                            </form>
                        </div>
                        
                        ';
                    }
                    else
                    {
                            //success
                            print '
                            <div class="container" style="margin:0;">
                                <form action="account.php" method="POST">
                                    <table style="width:60%; color:white;">
                                        <tr>
                                            <td>Αριθμός Κάρτας</td>
                                            <td>'.$row['card'].'</td>
                                        <tr>
                                        <tr>
                                            <td>Όνομα Κατόχου</td>
                                            <td>
                                                <div class="input-group form-group" style="margin:0">
                                                    <input type="text" class="form-control" value="'.($edit==false?$row['firstname']:$_POST['firstname']).'"name="firstname" title="Όνομα" required placeholder="Όνομα">
                                                </div>
                                            </td>
                                        <tr>
                                        <tr>
                                            <td>Επίθετο Κατόχου</td>
                                            <td>
                                                <div class="input-group form-group" style="margin:0">
                                                    <input type="text" class="form-control" value="'.($edit==false?$row['lastname']:$_POST['lastname']).'"name="lastname" title="Επίθετο" required placeholder="Επίθετο">
                                                </div>
                                            </td>
                                        <tr>
                                        <tr>
                                            <td>Διεύθυνση Email</td>
                                            <td>
                                                <div class="input-group form-group" style="margin:0">
                                                    <input type="email" name="email" value="'.($edit==false?$row['email']:$_POST['email']).'" class="form-control" placeholder="E-mail" title="Διεύθυνση Ηλεκτρονικού Ταχυδρομίου" required>                                </div>
                                                </div>
                                            </td>
                                        <tr>
                                        <tr>
                                            <td>Κωδικός Πρόσβασης</td>
                                            <td>'.
                                                ($error==true?'<span class="error text-danger">Λανθασμένος Κωδικός Πρόσβασης</span>':'')
                                                .'<div class="input-group form-group" style="margin:0">'.
                                                    ($error==true?'<input type="password" class="form-control is-invalid" name="password" class="form-control" placeholder="Κωδικός Πρόσβασης" title="Κωδικός Πρόσβασης" required>':'<input type="password" name="password" class="form-control" placeholder="Κωδικός Πρόσβασης" title="Κωδικός Πρόσβασης" required>')
                                                .'</div>
                                            </td>
                                        <tr>
                                    </table>
                                    <br>
                                    <div class="input-group">
                                        <div class="form-group" style="margin-right:1rem">
                                            <input type="submit" name="exit" value="Ακύρωση Επεξεργασίας" formnovalidate>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="update" value="Eνημέρωση Δεδομένων">
                                        </div>
                                    
                                    </div>
                                </form>
                            </div>
                            ';
                        } 
                    }
                    
                ?>
        </div>
        <div id="2" class="tabcontent">
            <h3>London</h3>
            <p>London is the capital city of England.</p>
        </div>
        <div id="3" class="tabcontent">
            <h3>London</h3>
            <p> is the capital city of England.</p>
        </div>
        <div id="4" class="tabcontent">
            <a href="#">Αγορία Εισιτηρίου
        </div>
        <div id="5" class="tabcontent">
            <a href="#">Αλλαγή Κωδικού Πρόσβασης
        </div>
    </div>
    <form action="account.php" method="POST" >
        <!-- <span style="color:white">ATH.ENA Card Number*</span> -->
        <input type="hidden" value=1 name="hid">
        <input type="submit" name="signout" value="Έξοδος">
        
    </form>    
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <!-- <section class="hero-section set-bg2">
    </section> -->
    <!-- Hero Section End -->

    <!-- Cards Section -->
    
            <!-- <h1>SET</h1> -->
           

             <!-- <h1>$_POST['card']." ".$_POST['password']</h1>; -->
        
    
    
    <?php
        include(dirname(__FILE__)."/footer.php");
    ?>
    <!-- Footer Section End -->

</body>

<script>
    function option(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
    }
</script>

<script>
// Get the element with id="defaultOpen" and click on it
    document.getElementById('default').click();
</script>