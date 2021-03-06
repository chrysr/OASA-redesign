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
    if(isset($_POST['addto']))
    {
        $_SESSION['chart']=array();
        foreach ($_POST as $key=>$value)
        {
            //print $key.'->'.$value."xA";
            if($value>0)
                $_SESSION['chart'][$key]=$value;
        }
    }
    else if(isset($_POST['pay']))
    {
        $_SESSION['chart']=array();
        foreach ($_POST as $key=>$value)
        {
            //print $key.'->'.$value."xA";
            if($value>0)
                $_SESSION['chart'][$key]=$value;
        }
        header('Location: ./payment.php');
        die();
    }
?>
<!DOCTYPE html>
<html lang="el">

<head>
    <link rel="shortcut icon" type="image/x-icon" href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/images/favicon.ico">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Καλάθι Αγορών</title>

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
    <!-- Header Section Begin -->
    <?php
        $page='two'; include(dirname(__FILE__)."/header.php");
    ?>

    <form action="chart.php" method="POST" id="tick">
        <div class="container-fluid" style="padding: 2.65rem 0rem 4rem 0rem; background-color: white;display:flex;flex-direction:column;"> <!--flex;flex-direction:row; -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" ><a href="../../index.php"><i style="color:black;" class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item" style="color:rgb(64, 152, 190);"><a style="color:inherit;" href="./tickets.php">Αγορά Εισιτηρίων</a></li>
                </ol>
            </nav>
            <div style="margin: 1rem 3rem 0rem 3rem; display:flex;flex-direction:column;">
                <nav aria-label="breadcrumb" >
                    <ol class="breadcrumb" >
                        <li class="breadcrumb-item active"><a href="./tickets.php" style="color:inherit;">Επιλογή Εισιτηρίων</a></li>                
                        <li class="breadcrumb-item" style="color:rgb(64, 152, 190);" ><a href="./chart.php" style="color:inherit;">Καλάθι Αγορών</a></li>
                        <li class="breadcrumb-item active" >Τρόποι Πληρωμής</li>
                        <li class="breadcrumb-item active" >Σύνοψη</li>
                    </ol>
                </nav>
                <?php
                    $total=0;
                    $servername="127.0.0.1";
                    $username="root";
                    $password="";
                    $dbname="sdi1500205";
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
                            <div class="columns">
                                <ul class="price">
                                    <li class="header">'.$row['name'].'</li>
                                    <li class="grey">'.str_replace('.',',',strval(number_format((double)$row['price'],2,'.',''))).'&#8364</li>
                                    <li class="grey">
                                        <div class="form-control" style="background-color: #ccc; border:none; margin:0;">
                                            <input type="number" name='.$row['id'].' min=0 value='.$value.'  style="width:2.5rem; height:2rem">
                                        </div> 
                                    </li>
                                </ul>
                            </div>
                            ';
                        }
                        //else print "else";

                    }
                ?>
            </div>
        </div>
    </form>
    <div style="margin-bottom:10rem;">
        <div style="float:right;margin-right:6rem;"> 
            <div style="background-color:black;color:white; text-align:center; border-radius:5px;">
                <div style=" border-bottom:1px solid white; padding:0.5rem;">
                    <button style="cursor:pointer; background-color:black; color:white; border:none;" formnovalidate type="submit" name="addto" form="tick">
                    Ανανέωση Καλαθιού <i class="fas fa-sync-alt"></i></button>
                </div>
                <div style="padding:0.5rem;border-top:1px solid white;">
                    <span style="border:none; ">Τελικό Ποσό: <?php print str_replace('.',',',strval(number_format((double)$total,2,'.','')));?>&#8364</span>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div style="margin-bottom:5rem;">
        <div style="border-radius:5px; float:left; margin-left:4rem;padding:0.5rem;background-color:black;color:white">
            <a style="color:white;" href="./tickets.php">Εισιτήρια</a>
        </div>
        <div style="border-radius:5px;float:right; margin-right:4rem;padding:0.5rem;background-color:black;color:white">
            <button style="cursor:pointer; background-color:black; color:white; border:none;" formnovalidate type="submit" name="pay" form="tick">
            Τρόποι Πληρωμής</button>
        <!-- <a style="color:white;" href="./payment.php">Πληρωμή</a> -->
        </div>
    </div>

    
    <?php
        include(dirname(__FILE__)."/footer.php");
    ?>
    <!-- Footer Section End -->

</body>

<script src="../javascript/modal.js"></script>