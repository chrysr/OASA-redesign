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
<?php
    $nomatch=false;
    $errorpass=false;

    if(isset($_POST['changepass']))
    {
        $servername="127.0.0.1";
        $username="root";
        $password="";
        $dbname="oasa";
        $connection=new mysqli($servername,$username,$password,$dbname);
        
        if($connection->connect_error)
            die("Connection failed: ".$connection->connect_error);
        $sql="SELECT * FROM users WHERE card=".$_SESSION['card'].' and password="'.$_POST['passwordcur'].'"';
        if(($result=$connection->query($sql))&&$result->num_rows==1)
        {
            if($_POST['passwordnew']==$_POST['passwordchk'])
            {
                $sql='UPDATE users SET password="'.$_POST['passwordnew'].'" WHERE card='.$_SESSION['card'];
                if(($result=$connection->query($sql)))
                {
                    echo ("<script LANGUAGE='JavaScript'>
                    window.alert('O κωδικός σας άλλαξε με επιτυχία');
                    </script>");
                }
            }
                
            
        }
        else
        {
            $errorpass=true;
        }
        if($_POST['passwordnew']!=$_POST['passwordchk'])
        {
            $nomatch=true;
        }
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
  background-color: darkgrey;
  width: 35%;
  max-height: 420px;
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
  background-color: #ccc;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: rgb(64, 152, 190);
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  width: 65%;
  border-left: none;
  max-height: 420px;
}
.active:after {
    /* content: "\2796"; Unicode character for "minus" sign (-) */
    color:black;
    font-size:20px;
  }
</style>
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
    <!-- <link rel="stylesheet" href="../css/style.css" type="text/css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/payment.css" type="text/css">

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
                <button class="tablinks" <?php if(!$nomatch) print 'id="default" ';?>style="margin-left:0rem" onclick="option(event, '1')"><i class="fas fa-id-card"></i> Στοιχεία Κάρτας</button>
                <button class="tablinks" style="margin-left:0rem" onclick="option(event, '3')"><i class="fas fa-ticket-alt"></i> Ενεργά Εισιτήρια</button>
                <button class="tablinks" style="margin-left:0rem" onclick="window.location.href='./tickets.php';"><i class="fas fa-shopping-cart"></i> Αγορά Εισιτηρίου</button>
                <button class="tablinks" style="margin-left:0rem" onclick="option(event, '2')"><i class="far fa-clock"></i> Ιστορικό Αγορών</button>
                <button class="tablinks" <?php if($nomatch) print 'id="default" ';?>style="margin-left:0rem" onclick="option(event, '5')"><i class="fas fa-key"></i> Αλλαγή Κωδικού Πρόσβασης</button>
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
                        // print "try to update";
                        $sql="SELECT * FROM users WHERE card=".$_SESSION['card'].' and password="'.$_POST['password'].'"';
                        if(($result=$connection->query($sql))&&$result->num_rows==1)
                        {
                            $sql='UPDATE users SET firstname="'.$_POST['firstname'].'",lastname="'.$_POST['lastname'].'",email="'.$_POST['email'].'" WHERE card='.$_SESSION['card'];
                            // print $_POST['password'];
                            if(($result=$connection->query($sql)))
                            {
                                // print "successfully updated";
                                echo ("<script LANGUAGE='JavaScript'>
                                window.alert('Τα στοιχεία σας ενημερώθηκαν με επιτυχία');
                                </script>");
                            }
                            else
                            {
                                // print "error update";
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
                            <div class="container" style="margin:3rem 3rem 4rem 3rem;">
                                <form action="account.php" method="POST">
                                    <table style="width:80%; color:black; font-size:18px; ">
                                        <tr style="border-bottom: 1px solid #dee2e6;">
                                            <td style="padding-bottom:0.25rem;">Αριθμός Κάρτας</td>
                                            <td style="text-align:center; padding-bottom:0.25rem;">'.$row['card'].'</td>
                                        </tr>
                                        <tr style="height:0.5rem";></tr>
                                        <tr style="border-bottom: 1px solid #dee2e6;">
                                            <td style="padding-bottom:0.25rem;">Όνομα Κατόχου</td>
                                            <td style="text-align:center; padding-bottom:0.25rem;">'.$row['firstname'].'</td>
                                        </tr>
                                        <tr style="height:0.5rem";></tr>
                                        <tr style="border-bottom: 1px solid #dee2e6;">
                                            <td style="padding-bottom:0.25rem;">Επίθετο Κατόχου</td>
                                            <td style="text-align:center; padding-bottom:0.25rem;">'.$row['lastname'].'</td>
                                        </tr>
                                        <tr style="height:0.5rem";></tr>
                                        <tr style="border-bottom: 1px solid #dee2e6;">
                                            <td style="padding-bottom:0.25rem;">Διεύθυνση Email</td>
                                            <td style="text-align:center; padding-bottom:0.25rem;">'.$row['email'].'</td>
                                        <t/r>
                                    </table>
                                </form>
                                <br>
                                <div style="margin:2rem 0rem 0rem 0rem;">
                                    <form action="account.php" method="POST">
                                        <input type="hidden" value=1 name="edit">
                                        <button type="submit" style="float:left; background-color:black; cursor:pointer; border:none; color:white; padding:0.5rem; border-radius:3px;"><i class="fas fa-user-edit"></i> Επεξεργασία Δεδομένων</button>
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
                                    <div style="margin:1rem 3rem 3rem 3rem;">
                                        <table style="" color:black;font-size:18px;">
                                            <tr style="border-bottom: 1px solid #dee2e6;">
                                                <td style="padding-bottom:0.5rem;">Αριθμός Κάρτας</td>
                                                <td style="padding-bottom:0.5rem;">'.$row['card'].'</td>
                                            </tr>
                                            <tr style="height:0.5rem";></tr>
                                            <tr style="border-bottom: 1px solid #dee2e6;">
                                                <td style="padding-bottom:0.5rem;">Όνομα Κατόχου</td>
                                                <td style="padding-bottom:0.5rem;">
                                                    <div class="input-group form-group" style="margin:0">
                                                        <input type="text" class="form-control" value="'.($edit==false?$row['firstname']:$_POST['firstname']).'"name="firstname" title="Όνομα" required placeholder="Όνομα">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="height:0.5rem";></tr>
                                            <tr style="border-bottom: 1px solid #dee2e6;">
                                                <td style="padding-bottom:0.5rem;">Επίθετο Κατόχου</td>
                                                <td style="padding-bottom:0.5rem;">
                                                    <div class="input-group form-group" style="margin:0">
                                                        <input type="text" class="form-control" value="'.($edit==false?$row['lastname']:$_POST['lastname']).'"name="lastname" title="Επίθετο" required placeholder="Επίθετο">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="height:0.5rem";></tr>
                                            <tr style="border-bottom: 1px solid #dee2e6;">
                                                <td style="padding-bottom:0.5rem;">Διεύθυνση Email</td>
                                                <td style="padding-bottom:0.5rem;">
                                                    <div class="input-group form-group" style="margin:0">
                                                        <input type="email" name="email" value="'.($edit==false?$row['email']:$_POST['email']).'" class="form-control" placeholder="E-mail" title="Διεύθυνση Ηλεκτρονικού Ταχυδρομίου" required>                                </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="height:0.5rem";></tr>
                                            <tr style="border:none; height:3rem;">
                                                <td style="border:none;"></td>
                                                <td style="border:none;"></td>
                                            </tr>
                                            <tr style="border-bottom: 1px solid #dee2e6;">
                                                <td style="padding-bottom:0.5rem;">Επιβεβαίωση Κωδικού</td>
                                                <td style="padding-bottom:0.5rem;">
                                                    <div class="input-group form-group" style="margin:0">'.
                                                        ($error==true?'<input type="password" class="form-control is-invalid" name="password" class="form-control" placeholder="Κωδικός Πρόσβασης" title="Κωδικός Πρόσβασης" required>':'<input type="password" name="password" class="form-control" placeholder="Κωδικός Πρόσβασης" title="Κωδικός Πρόσβασης" required>')
                                                    .''.
                                                    ($error==true?'
                                                        <div class="invalid-feedback" >
                                                            Λανθασμένος Κωδικός 
                                                        </div> ':'')
                                                    .'</div>
                                                    
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div style="margin: 0 3rem 0 3rem;">                                   
                                        <input type="submit" name="update" value="Επιβεβαίωση Αλλαγών" style="display: none; visibility: hidden;">
                                        <button style="float:left; background-color:#de1010; cursor:pointer; border:none; color:white; padding:0.5rem; border-radius:3px;" type="submit" name="exit"formnovalidate ><i class="fas fa-times"></i> Ακύρωση Επεξεργασίας</button>
                                        <button style="float:right; background-color:#009129; cursor:pointer; border:none; color:white; padding:0.5rem; border-radius:3px;" type="submit" name="update"><i class="fas fa-check"></i> Επιβεβαίωση Αλλαγών</button>
                                    </div>       
                                </div>
                            </form>                                                                 
                            ';
                        } 
                    }
                        
                ?>
            </div>
            <style>
            /* width */
            ::-webkit-scrollbar {
            width: 10px;
            height: 200px;
            }

            /* Track */
            ::-webkit-scrollbar-track {
            background: #f1f1f1;
            }

            /* Handle */
            ::-webkit-scrollbar-thumb {
            background: #888;
            }

            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
            background: #555;
            }

            </style>
            <div id="2" class="tabcontent" style="overflow:auto;">
                <div style=" ">
                    <?php
                        $servername="127.0.0.1";
                        $username="root";
                        $password="";
                        $dbname="oasa";
                        $connection=new mysqli($servername,$username,$password,$dbname);
                        
                        if($connection->connect_error)
                            die("Connection failed: ".$connection->connect_error);

                        $sql='select * from tickets,ticket_purchase where ticket_purchase.ticketid=tickets.id and ticket_purchase.buyer="'.$_SESSION['card'].'" order by date desc';
                        if($result=$connection->query($sql))
                        {
                            $date='';
                            $arr=array();
                            while(($row=mysqli_fetch_assoc($result)))
                            {
                                $newdate=date_format(new DateTime($row['date']),"d/m/Y H:i");
                                if($newdate!=$date)
                                {
                                    $date=$newdate;
                                    $arr[$date]=array();
                                }
                                array_push($arr[$date],$row);
                            }
                                
                            foreach($arr as $key=>$value)
                            {
                                print '
                                    <button style="font-size:17px;" type="button" class="collapsible">Ημερομηνία Αγοράς: '.$key.'</button>
                                    <div class="content" >
                                        <div>
                                            <table class="table table-hover" style="text-align:center;">
                                                <thead>
                                                    <tr>
                                                        <th>Προϊόν</th>
                                                        <th>Ποσότητα</th>
                                                        <th>Τιμή μονάδας
                                                        <th>Επιμέρους Σύνολο</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                ';
                                $sum=0;
                                foreach($value as $k=>$v)
                                {
                                    $sum=$sum+($v['price']*$v['amount']);
                                    print '<tr>                                    
                                        <td>'.$v['name'].'</td>
                                        <td>'.$v['amount'].'</td>
                                        <td>'.str_replace('.',',',strval(number_format((double)$v['price'],2,'.',''))).'&#8364</td>    
                                        <td>'.str_replace('.',',',strval(number_format((double)$v['price']*$v['amount'],2,'.',''))).'&#8364</td> 
                                    </tr>';
                                }
                                print'
                                    <tr style="height:1rem;"></tr>
                                    '
                                ;
                                print '
                                                </tbody>
                                            </table>
                                        </div>
                                        <div>
                                            <div style="float:right; border-bottom: 2px solid #dee2e6; padding-left:1rem; padding-right:1rem; margin-bottom:1rem;">
                                                <span>
                                                    Σύνολο: '.str_replace('.',',',strval(number_format((double)$sum,2,'.',''))).'&#8364
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                ';
                            }
                        }
                    ?>
                </div>
            </div>
            <style>
            .columns {
                float: left;
                width: 33.3%;
                padding: 8px;
            }
            
            </style>
            <div id="3" class="tabcontent" style="overflow:auto;">
                <?php
                    $servername="127.0.0.1";
                    $username="root";
                    $password="";
                    $dbname="oasa";
                    $connection=new mysqli($servername,$username,$password,$dbname);
                    
                    if($connection->connect_error)
                        die("Connection failed: ".$connection->connect_error);

                    $sql='select * from tickets,ticket_purchase where ticket_purchase.ticketid=tickets.id and ticket_purchase.buyer="'.$_SESSION['card'].'" order by date desc';
                    if($result=$connection->query($sql))
                    {
                        while(($row=mysqli_fetch_assoc($result)))
                        {
                            print'
                                <div style="width:75%; display:table; margin-left:3rem;">
                                    <div style=" display:table-cell; padding:1rem;  width:75%; background-color:#ccc; color:black; border-radius:3px 0 0 3px; margin-bottom: 1rem;">
                                        <span>'.$row['name'].'</span>
                                    </div>  
                                    <div style="text-align:center; vertical-align:middle; display:table-cell;  width:25%; border-left: 2px solid black; background-color:#ccc; color:black; border-radius:0 3px 3px 0; padding:1rem; margin-bottom: 1rem;">
                                        <span>'.str_replace('.',',',strval(number_format((double)$row['price'],2,'.',''))).'&#8364</span>
                                    </div>
                                </div>   
                                <div style="display:table; height:1rem;">
                                    <div style="display:table-cell; height:1rem;">
                                    </div>
                                </div>

                            ';
                        }
                    }
                ?>                              
            </div>
            <div id="5" class="tabcontent">
                <div style="margin: 3rem;">
                    <form action="account.php" method="POST">
                        <table style="width:100%; color:black; font-size:18px; ">
                            <tr style="border-bottom: 1px solid #dee2e6;">
                            <!-- 'value="'.$_POST['passwordcur'].'"  -->
                            <!-- '.(isset($_POST['passwordcur'])?'class="form-control is-valid" ':'class="form-control"'). ' -->
                                <td style="padding-bottom:0.5rem;">Τωρινός Κωδικός</td>
                                <td style="padding-bottom:0.5rem;">
                                    <?php if($errorpass==true) print '<input type="password" name="passwordcur" class="form-control is-invalid" placeholder="Τωρινός Κωδικός" title="Τωρινός Κωδικός" required>' ?>
                                    <?php if($errorpass==false) print '<input style="margin:0;" type="password" name="passwordcur" '.(isset($_POST['passwordcur'])?'value="'.$_POST['passwordcur'].'" class="form-control is-valid" ':'class="form-control"'). '  placeholder="Τωρινός Κωδικός" title="Τωρινός Κωδικός" required>'; ?>
                                    <?php if($errorpass==true) print '<div class="invalid-feedback">
                                        Λανθασμένος Κωδικός 
                                    </div> ' ?>


                                </td>
                            </tr>
                            <tr style="height:0.5rem;"></tr>
                            <tr style="border-bottom: 1px solid #dee2e6;">
                                <td style="padding-bottom:0.5rem;">Νέος Κωδικός</td>
                                <td style="padding-bottom:0.5rem;">
                                    <?php if($nomatch==true) print  '<input type="password" name="passwordnew" '.($errorpass==true?'style="border-color: darkorange;"':'').' class="form-control is-invalid" placeholder="Νέος Κωδικός" title="Νέος Κωδικός" required>';?>
                                    <?php if($nomatch==false) print '<input type="password" name="passwordnew" class="form-control" placeholder="Νέος Κωδικός" title="Νέος Κωδικός" required>';?>
                                    <?php if($nomatch==true) print'
                                    <div class="invalid-feedback" '.($errorpass==true?'style="color: darkorange;"':'').'>
                                        Οι κωδικοί δεν είναι ίδιοι 
                                    </div> ';?>
                                </td>
                            </tr>
                            <tr style="height:0.5rem;"></tr>
                            <tr style="border-bottom: 1px solid #dee2e6;">
                                <td style="padding-bottom:0.5rem;">Επιβεβαίωση Νέου Κωδικού</td>
                                <td style="padding-bottom:0.5rem;">
                                    <?php if($nomatch==true) print  '<input type="password" name="passwordchk" '.($errorpass==true?'style="border-color: darkorange;"':'').' class="form-control is-invalid" placeholder="Επιβεβαίωση Νέου Κωδικού" title="Επιβεβάιωση Νέου Κωδικού" required>';?>
                                    <?php if($nomatch==false) print '<input type="password" name="passwordchk" class="form-control" placeholder="Επιβεβαίωση Νέου Κωδικού" title="Επιβεβάιωση Νέου Κωδικού" required>' ;?>
                                    <?php if($nomatch==true) print'
                                    <div class="invalid-feedback" '.($errorpass==true?'style="color: darkorange;"':'').'>
                                        Οι κωδικοί δεν είναι ίδιοι 
                                    </div> ';?>
                                </td>
                            </tr>
                            <tr style="height:0.5rem;"></tr>                            
                        </table>
                        <div style="margin-top: 2rem; margin-bottom:2rem;">
                            <button style="float:right; background-color:#009129; cursor:pointer; border:none; color:white; padding:0.5rem; border-radius:3px; margin-bottom:2rem;" type="submit" name="changepass" required><i class="fas fa-check"></i> Αλλαγή Κωδικού </button>
                        </div>
                    </form>
                </div>
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

<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight){
            content.style.maxHeight = null;
            } else {
            content.style.maxHeight = content.scrollHeight + "px";
            }
        });
    }
</script>