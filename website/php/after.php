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
?>
<?php
    if(isset($_POST['subcheck']))
    {
        $mysqltime = date ("Y-m-d H:i:s", time()+3600);
        // echo $mysqltime;
        $servername="127.0.0.1";
        $username="root";
        $password="";
        $dbname="oasa";
        $connection=new mysqli($servername,$username,$password,$dbname);
        
        if($connection->connect_error)
            die("Connection failed: ".$connection->connect_error);
        foreach ($_SESSION['chart'] as $key=>$value)
        {
            // print $key.'->'.$value."xA";
            $sql='INSERT INTO ticket_purchase (ticketid,buyer,date,amount) VALUES ("'.$key.'",'.((empty($_SESSION['loggedin']) || $_SESSION['loggedin'] == false)?0:$_SESSION['card']).',"'.$mysqltime.'",'.$value.')';            
            if($connection->query($sql))
            {
                ;
                // print "all good";
            }
            // else print "bad";
        }
    }
?>
<!DOCTYPE html>
<html lang="el">

<head>
    <link rel="shortcut icon" type="image/x-icon" href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/images/favicon.ico">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Σύνοψη</title>

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
    <!-- Header Section Begin -->
    <?php
        $page='two'; include(dirname(__FILE__)."/header.php");
    ?>

    <div class="container-fluid" style="padding: 112px 0rem 4rem 0rem; background-color: white;display:flex;flex-direction:column;"> <!--flex;flex-direction:row; -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" ><a href="../../index.php"><i style="color:black;" class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item" style="color:rgb(64, 152, 190);"><a style="color:inherit;" href="./tickets.php">Αγορά Εισιτηρίων</a></li>
            </ol>
        </nav>
        <div style="margin: 1rem 3rem 2rem 3rem;">
            <nav aria-label="breadcrumb" >
                <ol class="breadcrumb" style="margin:0;">
                    <li class="breadcrumb-item active" >Επιλογή Εισιτηρίων</li>                
                    <li class="breadcrumb-item active" >Καλάθι Αγορών</li>
                    <li class="breadcrumb-item active" >Τρόποι Πληρωμής</li>
                    <li class="breadcrumb-item" style="color:rgb(64, 152, 190);" >Σύνοψη</li>
                </ol>
            </nav>
        </div>
        <div style="margin-left:5rem;margin-right:5rem;">    
            <h3>Σύνοψη</h3>
            <table class="table table-hover" style="text-align:center;">
                <thead>
                <tr>
                    <th>Προϊόν</th>
                    <th>Ποσότητα</th>
                    <th>Τιμή μονάδας</th>
                    <th>Επιμέρους Σύνολο</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        if(isset($_POST['subcheck']))
                        {
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
                                //print $key.'->'.$value.'|';
                                $sql="SELECT * FROM tickets WHERE id='".$key."'";
                                if(($result=$connection->query($sql))&&$result->num_rows==1)
                                {
                                    $row=mysqli_fetch_assoc($result);
                                    $total=$total+$value*$row['price'];
                                    //print $row['id'].' '.str_replace('.',',',strval(number_format((double)$row['price'],2,'.',''))).' '.$row['name'];
                                    print'
                                    <tr>
                                        <td>'.$row['name'].'</td>
                                        <td>'.$value.'</td>
                                        <td>'.str_replace('.',',',strval(number_format((double)$row['price'],2,'.',''))).'&#8364</td>
                                        <td>'.str_replace('.',',',strval(number_format((double)$row['price']*$value,2,'.',''))).'&#8364</td>
                                    </tr>';
                                }
                            }                        
                        }
                    ?>
                    <tr style="border-bottom: 5rem solid #fff; pointer-events: none;">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <div>
                <div style="float:right; border-bottom: 2px solid #dee2e6; padding-left:1rem; padding-right:1rem;">
                    <span>Συνολικό Ποσό: <?php print str_replace('.',',',strval(number_format((double)$total,2,'.','')));?>&#8364</span>
                </div>

            </div>
        </div>
        <div class="alert alert-success" role="alert" style="margin:5rem 5rem 5rem 5rem;">
            <?php
                if(isset($_POST['subcheck']))
                {
                    if($_POST['ms'])
                    {
                        print '<h4 class="alert-heading">Ολοκληρώσατε την κράτηση των εισιτηρίων σας!</h4>';
                    }
                    else if($_POST['pp'])
                    {
                        print '<h4 class="alert-heading">Ολοκληρώσατε την αγορά των εισιτηρίων σας μέσω PayPal!</h4>';
                    }
                    else
                    {
                        print '<h4 class="alert-heading">Ολοκληρώσατε την αγορά των εισιτηρίων σας μέσω Πιστωτικής Κάρτας!</h4>';
                    }
                }
            ?>
            <?php
                if(isset($_POST['subcheck']))
                {
                    if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin'])
                    {
                        if($_POST['ms'])
                        {
                            print '<p>Μπορείτε να παραλάβετε τα εισιτήριά σας σε οποιονδήποτε σταθμό του Μετρό δίνοντας το ονοματεπώνυμό σας!</p>';
                        }
                        else if($_POST['pp'])
                        {
                            print '<p>Τα εισιτήρια σας θα πιστωθούν στην κάρτα σας με αριθμό: '.$_SESSION['card'].'</p>';
                        }
                        else
                        {
                            print '<p>Τα εισιτήρια σας θα πιστωθούν στην κάρτα σας με αριθμό: '.$_SESSION['card'].'</p>';
                        }
                    }
                    else
                    {
                        if($_POST['ms'])
                        {
                            print '<p>Μπορείτε να παραλάβετε τα εισιτήριά σας σε οποιονδήποτε σταθμό του Μετρό δίνοντας το ονοματεπώνυμό σας!</p>';
                        }
                        else if($_POST['pp'])
                        {
                            print '<p>Μπορείτε να πιστώσετε τα εισιτήρια σας στην κάρτα σας σε οποιονδήποτε σταθμό του Μετρό δίνοντας το ονοματεπώνυμό σας!</p>';    
                        }
                        else
                        {
                            print '<p>Μπορείτε να πιστώσετε τα εισιτήρια σας στην κάρτα σας σε οποιονδήποτε σταθμό του Μετρό δίνοντας το ονοματεπώνυμό σας!</p>';
                        }
                    }
                    $_SESSION['chart']=array();
                }
            ?>
            <hr>
            <p class="mb-0">Ευχαριστούμε για την αγορά σας!</p>
        </div>
    </div>
    <!-- <form method="POST" action="./after.php" id="tostart">
        <input type='hidden' value=1 name="tostart">
    </form> -->
    <div style="margin-bottom:5rem;">
        <div style="border-radius:5px;float:right; margin-right:4rem;padding:0.5rem;background-color:black;color:white">
        <!-- <button style="cursor:pointer; background-color:black; color:white; border:none;" type="submit" form="tostart">
            Μετάβαση στην Αρχική</button> -->
            <a style="color:white;" href="../../index.php">Μετάβαση στην Αρχική</a>
        </div>
    </div>

    
    <?php
        include(dirname(__FILE__)."/footer.php");
    ?>
    <!-- Footer Section End -->

</body>

<script src="../javascript/modal.js"></script>