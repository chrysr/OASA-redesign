<?php
// Start the session
session_start();
?>
<?php
    if (isset($_POST['hid'])) {
        session_destroy();
        header('Location: ../../index.php');
        die();
    }
?>
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
<!DOCTYPE html>
<html lang="el">
<style>
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 35%;
  max-height: 450px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc; /*to go*/
  width: 65%;
  border-left: none;
  max-height: 450px;
}
</style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ΟΑΣΑ</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/header_footer.css" type="text/css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <!-- <link rel="stylesheet" href="../css/style.css" type="text/css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<body>
    <form action="account.php" method="POST" id="signout">
<!-- <span style="color:white">ATH.ENA Card Number*</span> -->
        <input type="hidden" value=1 name="hid">
        <!-- <input type="submit" name="signout" value="Έξοδος"> -->
    </form> 
     
    <div class="container-fluid" style="padding: 112px 0rem 30rem 0rem; background-color: white;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" ><a href="../../index.php"><i style="color:black;" class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item" style="color:rgb(64, 152, 190);"><a style="color:inherit;" href="./account.php">Η ATH.ENA Card μου</a></li>
            </ol>
        </nav>
        <div style="margin: 2rem 5rem 0 5rem;">    
            <div class="tab">
                <button class="tablinks" id="default" style="margin-left:0rem" onclick="option(event, '1')"><i class="fas fa-id-card"></i> Στοιχεία Κάρτας</button>
                <button class="tablinks" style="margin-left:0rem" onclick="option(event, '3')"><i class="fas fa-ticket-alt"></i> Ενεργά Εισιτήρια</button>
                <button class="tablinks" style="margin-left:0rem" onclick="window.location.href='./tickets.php';"><i class="fas fa-shopping-cart"></i> Αγορά Εισιτηρίου</button>
                <button class="tablinks" style="margin-left:0rem" onclick="option(event, '2')"><i class="fas fa-fast-backward"></i> Ληγμένα Εισιτήρια</button>
                <button class="tablinks" style="margin-left:0rem" onclick="option(event, '5')"><i class="fas fa-key"></i> Αλλαγή Κωδικού Πρόσβασης</button>
                <button class="tablinks" style="margin-left:0rem; " type="submit" form="signout"><i class="fas fa-sign-out-alt"></i> Έξοδος από τον Λογαριασμό</button>
            </div>                 
            <div id="1" class="tabcontent" style="padding-bottom: 2rem;">
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
                    
                    $sql="SELECT * FROM users WHERE users.card=".$_SESSION['card'];
                    //print $sql;
                    if(($result=$connection->query($sql))&&$result->num_rows==1)
                    {
                        $row=mysqli_fetch_assoc($result);
                        if(!isset($_POST['edit'])&&$edit==false)
                        {
                            print '
                            <div class="container" style="margin:5rem 3rem 4rem 3rem;">
                                <form action="account.php" method="POST">
                                    <table style="width:80%; color:black; font-size:18px; ">
                                        <tr style="border-bottom: 1px solid #dee2e6;">
                                            <td>Αριθμός Κάρτας</td>
                                            <td style="text-align:center;">'.$row['card'].'</td>
                                        </tr>
                                        <tr style="border-bottom: 1px solid #dee2e6;">
                                            <td>Όνομα Κατόχου</td>
                                            <td style="text-align:center;">'.$row['firstname'].'</td>
                                        </tr>
                                        <tr style="border-bottom: 1px solid #dee2e6;">
                                            <td>Επίθετο Κατόχου</td>
                                            <td style="text-align:center;">'.$row['lastname'].'</td>
                                        </tr>
                                        <tr style="border-bottom: 1px solid #dee2e6;">
                                            <td>Διεύθυνση Email</td>
                                            <td style="text-align:center;">'.$row['email'].'</td>
                                        <t/r>
                                    </table>
                                </form>
                                <br>
                                <div style="margin:0rem 3rem 0rem 3rem;">
                                    <form action="account.php" method="POST">
                                        <input type="hidden" value=1 name="edit">
                                        <button type="submit" style="float:right;"><i class="fas fa-cog"></i> Επεξεργασία Δεδομένων</button>
                                    </form>
                                </div>
                            </div>
                            ';
                        }
                        else
                        {
                            //success
                            print '
                            <form action="account.php" method="POST">
                                <div class="container">
                                    <div style="margin:3rem;">
                                        <table style="" color:black;font-size:18px;">
                                            <tr>
                                                <td>Αριθμός Κάρτας</td>
                                                <td>'.$row['card'].'</td>
                                            </tr>
                                            <tr>
                                                <td>Όνομα Κατόχου</td>
                                                <td>
                                                    <div class="input-group form-group" style="margin:0">
                                                        <input type="text" class="form-control" value="'.($edit==false?$row['firstname']:$_POST['firstname']).'"name="firstname" title="Όνομα" required placeholder="Όνομα">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Επίθετο Κατόχου</td>
                                                <td>
                                                    <div class="input-group form-group" style="margin:0">
                                                        <input type="text" class="form-control" value="'.($edit==false?$row['lastname']:$_POST['lastname']).'"name="lastname" title="Επίθετο" required placeholder="Επίθετο">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Διεύθυνση Email</td>
                                                <td>
                                                    <div class="input-group form-group" style="margin:0">
                                                        <input type="email" name="email" value="'.($edit==false?$row['email']:$_POST['email']).'" class="form-control" placeholder="E-mail" title="Διεύθυνση Ηλεκτρονικού Ταχυδρομίου" required>                                </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="border:none; height:3rem;">
                                                <td style="border:none;"></td>
                                                <td style="border:none;"></td>
                                            </tr>
                                            <tr>
                                                <td>Επιβεβαίωση Κωδικού</td>
                                                <td>'.
                                                    ($error==true?'<span class="error text-danger">Λανθασμένος Κωδικός Πρόσβασης</span>':'')
                                                    .'<div class="input-group form-group" style="margin:0">'.
                                                        ($error==true?'<input type="password" class="form-control is-invalid" name="password" class="form-control" placeholder="Κωδικός Πρόσβασης" title="Κωδικός Πρόσβασης" required>':'<input type="password" name="password" class="form-control" placeholder="Κωδικός Πρόσβασης" title="Κωδικός Πρόσβασης" required>')
                                                    .'</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div style="margin: 0 3rem 0 3rem;">                                   
                                        <input type="submit" name="update" value="Επιβεβαίωση Αλλαγών" style="display: none; visibility: hidden;">
                                        <button style="float:left;" type="submit" name="exit"formnovalidate ><i class="fas fa-times"></i> Ακύρωση Επεξεργασίας</button>
                                        <button style="float:right;" type="submit" name="update"><i class="fas fa-check"></i> Επιβεβαίωση Αλλαγών</button>
                                    </div>       
                                </div>
                            </form>                                                                 
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
                <a href="./tickets.php">Αγορά Εισιτηρίου
            </div>
            <div id="5" class="tabcontent">
                <a href="#">Αλλαγή Κωδικού Πρόσβασης
            </div>
            <div id="6" class="tabcontent">
                
            </div>
        </div>
    </div>
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