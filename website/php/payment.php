<?php
// Start the session
session_start();
if(!isset($_SESSION['chart']))
{
    $_SESSION['chart']=array();
}
?>

<?php
    if(empty($_SESSION['chart']))
    {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Δεν έχετε επιλέξει εισιτήρια');
        window.location.href='./tickets.php';
        </script>");
    }
    $total=0;
    $items=0;
    $servername="127.0.0.1";
    $username="root";
    $password="";
    $dbname="oasa";
    $error=false;
    $edit=false;
    $connection=new mysqli($servername,$username,$password,$dbname);
    
    if($connection->connect_error)
        die("Connection failed: ".$connection->connect_error);

    foreach($_SESSION['chart'] as $key=>$value)
    {
        //print $key.'->'.$value.'|';
        $sql="SELECT * FROM tickets WHERE id='".$key."'";
        if(($result=$connection->query($sql))&&$result->num_rows==1)
        {
            $row=mysqli_fetch_assoc($result);
            $total=$total+$value*$row['price'];
            $items=$items+$value;
            //print $row['id'].' '.str_replace('.',',',strval(number_format((double)$row['price'],2,'.',''))).' '.$row['name'];
        }
        //else print "else";

    }
?>

<!DOCTYPE html>
<html lang="el">

<head>
    <link rel="shortcut icon" type="image/x-icon" href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/images/favicon.ico">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Πληρωμή Εισιτηρίων</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/header_footer.css" type="text/css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/payment.css" type="text/css">
    
</head>
<style>
    .active:after {
    /* content: "\2796"; Unicode character for "minus" sign (-) */
    font-family: "Font Awesome 5 Free";
    content: "\f106";
    font-weight: 900;
    color:black;
    font-size:20px;
  }
</style>
<body>
    <!-- Header Section Begin -->
    <?php
        $page='zero'; include(dirname(__FILE__)."/header.php");
    ?>

    <div class="container-fluid" style="padding: 112px 0rem 0rem 0rem; background-color: white;display:flex;flex-direction:column;"> <!--flex;flex-direction:row; -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" ><a href="../../index.php"><i style="color:black;" class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item" style="color:rgb(64, 152, 190);"><a style="color:inherit;" href="./tickets.php">Αγορά Εισιτηρίων</a></li>
            </ol>
        </nav>
        <div style="margin: 1rem 3rem 0rem 3rem; ">
            <nav aria-label="breadcrumb" >
                <ol class="breadcrumb" >
                    <li class="breadcrumb-item" style="color:#6c757d;"><a href="./tickets.php" style="color:inherit;">Επιλογή Εισιτηρίων</a></li>                
                    <li class="breadcrumb-item" style="color:#6c757d;" ><a href="./chart.php" style="color:inherit;">Καλάθι Αγορών</a></li>
                    <li class="breadcrumb-item" style="color:rgb(64, 152, 190);" ><a href="./payment.php" style="color:inherit;">Τρόποι Πληρωμής</a></li>
                    <li class="breadcrumb-item" style="color:#6c757d;">Σύνοψη</li>
                </ol>
            </nav>
        </div>
        
    </div>
    <div>
        <form action="after.php" method="POST" id="checkout" onsubmit="return false;" >

        <div class="row" style="margin-left:3rem; margin-right:3rem;">
            <div class="col-7" >
                <button onclick="card=1-card;" type="button" class="collapsible"><i class="far fa-credit-card"></i> Πληρωμή με Χρεωστική ή Πιστωτική Κάρτα</button>
                <div class="content" >
                    <div class="containerp" style="padding-top:2rem;margin: 2rem 0 2rem 0;">
                            <input type='hidden' value=0 id='ms' name='ms'>
                            <input type='hidden' value=0 id='pp' name='pp'>
                            <input type='hidden' value=0 name="subcheck">
                            <div class="row">
                                <div class="col-8">
                                    <label for="cname">Όνομα Κατόχου</label>
                                    <input type="text" id="cname" name="cardname" placeholder="Όνομα Κατόχου">
                                </div>
                                <div class="col-4">
                                    <label for="fname" style="margin-bottom:2rem;"></label>
                                    <div class="icon-container" style="margin-left:0;">
                                        <i class="fab fa-cc-visa" style="color:navy;"></i>
                                        <i class="fab fa-cc-amex" style="color:blue;"></i>
                                        <i class="fab fa-cc-mastercard" style="color:red;"></i>
                                        <i class="fab fa-cc-discover" style="color:orange;"></i>
                                        <i class="fab fa-cc-diners-club" style="color:orange;"></i>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <label for="ccnum">Αριθμός Πιστωτικής ή Χρεωστικής Κάρτας</label>
                                    <input type="text" id="ccnum" name="cardnumber" placeholder="Αριθμός Πιστωτικής ή Χρεωστικής Κάρτας">
                                </div>
                                <div class="col-4">
                                    <label for="cvv">CVV</label>
                                    <input type="number" id="cvv" name="cvv" max=999 min=100 placeholder="CVV">
                                </div>
                            </div>                                        
                            <div class="row">
                                <div class="col-8">                                
                                    <label for="expmonth">Μήνας Λήξης Κάρτας</label>
                                    <select name='expireMM' id='expireMM'>
                                        <option value=''>Μήνας Λήξης Κάρτας</option>
                                        <option value='01'>January</option>
                                        <option value='02'>February</option>
                                        <option value='03'>March</option>
                                        <option value='04'>April</option>
                                        <option value='05'>May</option>
                                        <option value='06'>June</option>
                                        <option value='07'>July</option>
                                        <option value='08'>August</option>
                                        <option value='09'>September</option>
                                        <option value='10'>October</option>
                                        <option value='11'>November</option>
                                        <option value='12'>December</option>
                                    </select> 
                                </div>
                                <div class="col-4">
                                    <label for="expyear">Χρόνος Λήξης</label>
                                    <select name='expireYY' id='expireYY'>
                                        <option value=''>Χρόνος Λήξης</option>
                                        <option value='19'>2019</option>
                                        <option value='20'>2020</option>
                                        <option value='21'>2021</option>
                                        <option value='22'>2022</option>
                                        <option value='23'>2023</option>
                                        <option value='24'>2024</option>
                                    </select> 
                                </div>                            
                            </div>
                    </div>
                </div>
                <div>
                    <button onclick="if(paypal==0){window.open('https://www.paypal.com/login');}paypal=1-paypal;" type="button" class="collapsible"><i class="fab fa-paypal"></i> Πληρωμή μέσω PayPal </button>
                    <div class="content" style="padding:0;">
                        <div class="alert alert-success" role="alert">
                            Έχετε επιλέξει πληρωμή μέσω PayPal
                        </div>
                        <!-- <p>Έχετε πραγματοποιήσει πληρωμή μέσω PayPal</p> -->
                    </div>
                </div>
                <div>
                    <button onclick="station=1-station;" type="button" class="collapsible"><i class="fas fa-subway"></i> Πληρωμή και Παραλαβή σε Σταθμό</button>
                    <div class="content" style="padding:0;">
                        <div class="alert alert-success" role="alert">
                            Έχετε επιλέξει πληρωμή και παραλαβή σε σταθμό
                        </div>
                        <!-- <p>Έχετε επιλέξει πληρωμή και παραλαβή σε σταθμό</p> -->
                    </div>
                </div>
                <?php
                if(!isset($_SESSION['loggedin']))
                print'
                <div style="margin-top:2rem; ">
                    <span style="border-bottom:2px solid #ccc">Στοιχεία Κράτησης</span>
                </div>
                <div class="row" style="margin-top:1.5rem;" >
                    <div class="col-6">
                        <label>Όνομα</label>
                        <input  type="text" class="form-control" name="firstname" title="Όνομα" required placeholder="Όνομα">
                    </div>
                    <div class="col-6">
                        <label>Επίθετο</label>
                        <input type="text" class="form-control" name="lastname" title="Επίθετο" required placeholder="Επίθετο">
                    </div>
                </div>';
                else print'
                <div style="display:none"> 
                    <input type="text" name="firstname" value=1>
                    <input type="text" name="lastname" value=1>
                </div>
                ';
                ?>
            </form>

            </div>
            <div class="col-5">
                <div class="containerp" style="padding-top:1rem;">
                    <h4 >Καλάθι
                        <span class="price" style="color:black">
                            <i class="fa fa-shopping-cart"></i>
                            <b><?php print $items; ?></b>
                        </span>
                    </h4>
                    <?php
                        $total=0;
                        $servername="127.0.0.1";
                        $username="root";
                        $password="";
                        $dbname="oasa";
                        $error=false;
                        $edit=false;
                        $connection=new mysqli($servername,$username,$password,$dbname);
                        
                        if($connection->connect_error)
                            die("Connection failed: ".$connection->connect_error);

                        foreach($_SESSION['chart'] as $key=>$value)
                        {
                            $sql="SELECT * FROM tickets WHERE id='".$key."'";
                            if(($result=$connection->query($sql))&&$result->num_rows==1)
                            {
                                $row=mysqli_fetch_assoc($result);
                                $total=$total+$value*$row['price'];
                                print'
                                <div class="row">
                                <div class="col-9">
                                <p>'.$row['name'].' ('.$value.') </p></div><div class="col-3"><p><span class="price">'.str_replace('.',',',strval(number_format((double)$row['price']*$value,2,'.',''))).'&#8364
                                </span></p></div>
                                </div>
                                ';
                            }
                        }
                    ?>
                    <hr>
                    <p>Συνολικό Ποσό:<span class="price" style="color:black"><b><?php print str_replace('.',',',strval(number_format((double)$total,2,'.','')));?>&#8364 </b></span></p>
                </div>
            </div>
        </div>
    </div>
    
    <br>
    <div style="margin-bottom:5rem;">
        <div style="border-radius:5px; float:left; margin-left:4rem;padding:0.5rem;background-color:black;color:white">
            <a style="color:white;" href="./chart.php">Καλάθι</a>
        </div>
        <div style="border-radius:5px;float:right; margin-right:4rem;padding:0.5rem;background-color:black;color:white">
            <button onclick="validateForm();" style="font-size:17px;float:left;cursor:pointer; background-color:black; color:white; border:none; " id="subbtn" type="submit"  form="checkout">
            Πληρωμή και Ολοκλήρωση Αγοράς</button>
            <div class="spinner-border"  id='spinner' style="float:right; display:none;"></div>

        </div>
    </div>

    
    <?php
        include(dirname(__FILE__)."/footer.php");
    ?>
    <!-- Footer Section End -->

</body>
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
<script>
    function load()
    {
        document.getElementById('spinner').style.display="block";
    }
</script>
<script>
    var paypal=0;
    var station=0;
    var card=0;
    function validateForm() {
        if(document.forms['checkout']['firstname'].value==''||document.forms['checkout']['lastname'].value=='')
            return false;
        var ret=0;
        if(paypal)
        {
            if(card==0&&station==0)
            {    
                ret=1;
                document.forms['checkout']['ms'].value=0;
                document.forms['checkout']['pp'].value=1;
            }
            else
            {
                alert('Επιλέξτε μόνο μία μέθοδο πληρωμής');
            }
        }
        else if(station)
        {
            if(card==0&&paypal==0)
            {
                ret=1;
                document.forms['checkout']['ms'].value=1;
                document.forms['checkout']['pp'].value=0;
            }
            else
            {
                alert('Επιλέξτε μόνο μία μέθοδο πληρωμής');
            }
        }
        else if(card)
        {
            if(document.forms['checkout']['cname'].value!=''
            &&document.forms['checkout']['ccnum'].value!=''
            &&document.forms['checkout']['cvv'].value!=''
            &&document.forms['checkout']['expireMM'].value!=''
            &&document.forms['checkout']['expireYY'].value!='')
            {
                if(paypal==0&&station==0)
                    ret=1;
                else
                {
                    alert('Επιλέξτε μόνο μία μέθοδο πληρωμής');
                }
            }
            else
            {
                alert('Συπληρώστε όλα τα στοιχεία της φόρμας');
            }
        }
        else
        {
            alert('Επιλέξτε μία μέθοδο πληρωμής πριν συνεχίσετε');
        }
        console.log("ret = "+ret);
        if(ret)
        {
            document.forms['checkout']['subcheck'].value=1;
            document.getElementById('spinner').style.display="block";
            setTimeout(function() {
                document.getElementById("checkout").submit();
            }, 3000);
            return true;
        }
        return false;
    }
</script>

<script src="../javascript/modal.js"></script>