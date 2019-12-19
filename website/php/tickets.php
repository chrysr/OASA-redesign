<?php
// Start the session
session_start();
if(!isset($_SESSION['chart']))
{
    $_SESSION['chart']=array();
}
?>

<?php
    if(isset($_POST['addto']))
    {
        foreach ($_POST as $key=>$value)
        {
            //print $key.'->'.$value."xA";
            if($value>0)
            {
                if(isset($_SESSION['chart'][$key]))
                {
                    $_SESSION['chart'][$key]=$_SESSION['chart'][$key]+$value;
                }
                else $_SESSION['chart'][$key]=$value;
            }

        }
        foreach($_SESSION['chart'] as $key=>$value)
        {
            //print $key.'-->'.$value.'|';
        }
        header('Location: ./chart.php');
        die();
    }
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
    <!-- Header Section Begin -->
    <?php
        $page='zero'; include(dirname(__FILE__)."/header.php");
    ?>
    <!-- Header End -->

    
        
    

    <div class="container-fluid" style="padding: 14rem 0rem 30rem 0rem; background-color: white; ">
        <form action="tickets.php" method="POST" id="tick">
            <div class="tab" style="width:100%">
                <button class="tablinks lvl1" id="default" style="margin-left:0rem; width: 33.33%;" onclick="lvl1f(event, '1')">Κανονικό Εισιτήριο</button>
                <button class="tablinks lvl1" style="margin-left:0rem; width: 33.33%;" onclick="lvl1f(event, '2')">Μειωμένο Εισιτήριο</button>
                <button class="tablinks lvl1" style="margin-left:0rem; width: 33.33%;" onclick="lvl1f(event, '3')">Τουριστικά Εισιτήρια (Πακέτα)</button>

            </div>
            <div id="1" class="tabcontent lvl1tab" style="border:none;">
                <div class="tab" style="width:100%">
                    <button class="tablinks lvl2" style="margin-left:0rem; width: 33.33%;" onclick="lvl2f(event, '11')">Ενιαίο Εισιτήριο</button>
                    <button class="tablinks lvl2" style="margin-left:0rem; width: 33.33%;" onclick="lvl2f(event, '12')">Εισιτήριο Αεροδρομίου</button>
                    <button class="tablinks lvl2" style="margin-left:0rem; width: 33.33%;" onclick="lvl2f(event, '13')">Εισιτήριο Μακράς Διάρκειας</button>
                </div>
                <div id="11" class="tabcontent lvl2tab" style="border:none;"> 
                    <div class="columns">
                        <ul class="price">
                            <li class="header">90 Λεπτών</li>
                            <li class="grey">1,40&#8364</li>
                            <li class="grey">
                                <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                    <input type="number" name="n111" min=0 value=0  style="width:2.5rem; height:2rem">
                                </div> 
                            </li>
                        </ul>
                    </div>
                    <div class="columns">
                        <ul class="price">
                            <li class="header">Ημερήσιο</li>
                            <li class="grey">4,50&#8364</li>
                            <li class="grey">
                                <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                    <input type="number" name="n112" min=0 value=0  style="width:2.5rem; height:2rem">
                                </div> 
                            </li>
                        </ul>
                    </div>
                    <div class="columns">
                        <ul class="price">
                            <li class="header">5 Ημερών</li>
                            <li class="grey">9,00&#8364</li>
                            <li class="grey">
                                <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                    <input type="number" name="n113" min=0 value=0  style="width:2.5rem; height:2rem">
                                </div> 
                            </li>
                        </ul>
                    </div>
                    <div class="columns">
                        <ul class="price">
                            <li class="header">5πλό Εισιτήριο</li>
                            <li class="grey">6,50&#8364</li>
                            <li class="grey">
                                <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                    <input type="number" name="n114" min=0 value=0  style="width:2.5rem; height:2rem">
                                </div> 
                            </li>
                        </ul>
                    </div>
                    <div class="columns">
                        <ul class="price">
                            <li class="header">10+1 Ειστήρια</li>
                            <li class="grey">13,50&#8364</li>
                            <li class="grey">
                                <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                    <input type="number" name="n115" min=0 value=0  style="width:2.5rem; height:2rem">
                                </div> 
                            </li>
                        </ul>
                    </div>
                    <div class="columns">
                        <ul class="price">
                            <li class="header">2πλό Ειστήριο</li>
                            <li class="grey">2,70&#8364</li>
                            <li class="grey">
                                <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                    <input type="number" name="n116" min=0 value=0  style="width:2.5rem; height:2rem">
                                </div> 
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="12" class="tabcontent lvl2tab" style="border:none;">
                    <div class="columns">
                        <ul class="price">
                            <li class="header">1 Διαδρομής με Μετρό</li>
                            <li class="grey">10,00&#8364</li>
                            <li class="grey">
                                <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                    <input type="number" name="n121" min=0 value=0  style="width:2.5rem; height:2rem">
                                </div> 
                            </li>
                        </ul>
                    </div>
                    <div class="columns">
                        <ul class="price">
                            <li class="header">1 Διαδρομής με λεωφορείο</li>
                            <li class="grey">6,00&#8364</li>
                            <li class="grey">
                                <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                    <input type="number" name="n122" min=0 value=0  style="width:2.5rem; height:2rem">
                                </div> 
                            </li>
                        </ul>
                    </div>
                    <div class="columns">
                        <ul class="price">
                            <li class="header">1 Μετ' επιστροφής</li>
                            <li class="grey">18,00&#8364</li>
                            <li class="grey">
                                <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                    <input type="number" name="n123" min=0 value=0  style="width:2.5rem; height:2rem">
                                </div> 
                            </li>
                        </ul>
                    </div>
                    <div class="columns">
                        <ul class="price">
                            <li class="header">1 από/πρός τους σταθμούς Παλλήνη-Κάντζα-Κορωπί με Μετρό</li>
                            <li class="grey">6,00&#8364</li>
                            <li class="grey">
                                <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                    <input type="number" name="n124" min=0 value=0  style="width:2.5rem; height:2rem">
                                </div> 
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="13" class="tabcontent lvl2tab" style="border:none;">
                    <div class="tab" style="width:100%">
                        <button class="tablinks lvl3" style="margin-left:0rem; width: 25%;" onclick="lvl3f(event, '131')">30 Ημερών</button>
                        <button class="tablinks lvl3" style="margin-left:0rem; width: 25%;" onclick="lvl3f(event, '132')">90 Ημερών</button>
                        <button class="tablinks lvl3" style="margin-left:0rem; width: 25%;" onclick="lvl3f(event, '133')">180 Ημερών</button>
                        <button class="tablinks lvl3" style="margin-left:0rem; width: 25%;" onclick="lvl3f(event, '134')">365 Ημερών</button>
                    </div>
                    <div id="131" class="tabcontent lvl3tab">
                        <div class="columns">
                            <ul class="price">
                                <li class="header">Χωρίς Διαδρομές Αεροδρομίου</li>
                                <li class="grey">30,00&#8364</li>
                                <li class="grey">
                                    <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                        <input type="number" name="n1311" min=0 value=0  style="width:2.5rem; height:2rem">
                                    </div> 
                                </li>
                            </ul>
                        </div>
                        <div class="columns">
                            <ul class="price">
                                <li class="header">Με Διαδρομές Αεροδρομίου</li>
                                <li class="grey">49,00&#8364</li>
                                <li class="grey">
                                    <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                <input type="number" name="n1312" min=0 value=0  style="width:2.5rem; height:2rem">
                            </div> 
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="132" class="tabcontent lvl3tab">
                        <div class="columns">
                            <ul class="price">
                            <li class="header">Χωρίς Διαδρομές Αεροδρομίου</li>
                                <li class="grey">85,00&#8364</li>
                                <li class="grey">
                                    <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                        <input type="number" name="n1321" min=0 value=0  style="width:2.5rem; height:2rem">
                                    </div> 
                                </li>
                            </ul>
                        </div>
                        <div class="columns">
                            <ul class="price">
                            <li class="header">Με Διαδρομές Αεροδρομίου</li>
                                <li class="grey">142,00&#8364</li>
                                <li class="grey">
                                    <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                        <input type="number" name="n1322" min=0 value=0  style="width:2.5rem; height:2rem">
                                    </div> 
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="133" class="tabcontent lvl3tab">
                        <div class="columns">
                            <ul class="price">
                            <li class="header">Χωρίς Διαδρομές Αεροδρομίου</li>
                                <li class="grey">170,00&#8364</li>
                                <li class="grey">
                                    <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                        <input type="number" name="n1331" min=0 value=0  style="width:2.5rem; height:2rem">
                                    </div> 
                                </li>
                            </ul>
                        </div>
                        <div class="columns">
                            <ul class="price">
                            <li class="header">Με Διαδρομές Αεροδρομίου</li>
                                <li class="grey">250,00&#8364</li>
                                <li class="grey">
                                    <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                        <input type="number" name="n1332" min=0 value=0  style="width:2.5rem; height:2rem">
                                    </div> 
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="134" class="tabcontent lvl3tab">
                        <div class="columns">
                            <ul class="price">
                            <li class="header">Χωρίς Διαδρομές Αεροδρομίου</li>
                                <li class="grey">330,00&#8364</li>
                                <li class="grey">
                                    <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                        <input type="number" name="n1341" min=0 value=0  style="width:2.5rem; height:2rem">
                                    </div> 
                                </li>
                            </ul>
                        </div>
                        <div class="columns">
                            <ul class="price">
                            <li class="header">Με Διαδρομές Αεροδρομίου</li>
                                <li class="grey">490,00&#8364</li>
                                <li class="grey">
                                    <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                        <input type="number" name="n1342" min=0 value=0  style="width:2.5rem; height:2rem">
                                    </div> 
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="2" class="tabcontent lvl1tab" style="border:none;">
                <div class="tab" style="width:100%">
                    <button class="tablinks lvl2" style="margin-left:0rem; width: 33.33%;" onclick="lvl2f(event, '21')">Ενιαίο Εισιτήριο</button>
                    <button class="tablinks lvl2" style="margin-left:0rem; width: 33.33%;" onclick="lvl2f(event, '22')">Εισιτήριο Αεροδρομίου</button>
                    <button class="tablinks lvl2" style="margin-left:0rem; width: 33.33%;" onclick="lvl2f(event, '23')">Εισιτήριο Μακράς Διάρκειας</button>
                </div>
                <div id="21" class="tabcontent lvl2tab" style="border:none;"> 
                    <div class="columns">
                        <ul class="price">
                            <li class="header">90 Λεπτών</li>
                            <li class="grey">0,60&#8364</li>
                            <li class="grey">
                                <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                    <input type="number" name="n211" min=0 value=0  style="width:2.5rem; height:2rem">
                                </div> 
                            </li>
                        </ul>
                    </div>
                    <div class="columns">
                        <ul class="price">
                            <li class="header">5πλό Εισιτήριο</li>
                            <li class="grey">3,00&#8364</li>
                            <li class="grey">
                                <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                    <input type="number" name="n212" min=0 value=0  style="width:2.5rem; height:2rem">
                                </div> 
                            </li>
                        </ul>
                    </div>
                    <div class="columns">
                        <ul class="price">
                            <li class="header">10+1 Ειστήρια</li>
                            <li class="grey">6,00&#8364</li>
                            <li class="grey">
                                <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                    <input type="number" name="n213" min=0 value=0  style="width:2.5rem; height:2rem">
                                </div> 
                            </li>
                        </ul>
                    </div>
                    <div class="columns">
                        <ul class="price">
                            <li class="header">2πλό Ειστήριο</li>
                            <li class="grey">1,20&#8364</li>
                            <li class="grey">
                                <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                    <input type="number" name="n214" min=0 value=0  style="width:2.5rem; height:2rem">
                                </div> 
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="22" class="tabcontent lvl2tab" style="border:none;">
                    <div class="columns">
                        <ul class="price">
                            <li class="header">1 Διαδρομής με Μετρό</li>
                            <li class="grey">5,00&#8364</li>
                            <li class="grey">
                                <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                    <input type="number" name="n221" min=0 value=0  style="width:2.5rem; height:2rem">
                                </div> 
                            </li>
                        </ul>
                    </div>
                    <div class="columns">
                        <ul class="price">
                            <li class="header">1 Διαδρομής με λεωφορείο</li>
                            <li class="grey">3,00&#8364</li>
                            <li class="grey">
                                <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                    <input type="number" name="n222" min=0 value=0  style="width:2.5rem; height:2rem">
                                </div> 
                            </li>
                        </ul>
                    </div>
                    <div class="columns">
                        <ul class="price">
                            <li class="header">1 από/πρός τους σταθμούς Παλλήνη-Κάντζα-Κορωπί με Μετρό</li>
                            <li class="grey">3,00&#8364</li>
                            <li class="grey">
                                <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                <input type="number" name="n223" min=0 value=0  style="width:2.5rem; height:2rem">
                            </div> 
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="23" class="tabcontent lvl2tab" style="border:none;">
                    <div class="tab" style="width:100%">
                        <button class="tablinks lvl3" style="margin-left:0rem; width: 25%;" onclick="lvl3f(event, '231')">30 Ημερών</button>
                        <button class="tablinks lvl3" style="margin-left:0rem; width: 25%;" onclick="lvl3f(event, '232')">90 Ημερών</button>
                        <button class="tablinks lvl3" style="margin-left:0rem; width: 25%;" onclick="lvl3f(event, '233')">180 Ημερών</button>
                        <button class="tablinks lvl3" style="margin-left:0rem; width: 25%;" onclick="lvl3f(event, '234')">365 Ημερών</button>
                    </div>
                    <div id="231" class="tabcontent lvl3tab">
                        <div class="columns">
                            <ul class="price">
                                <li class="header">Χωρίς Διαδρομές Αεροδρομίου</li>
                                <li class="grey">15,00&#8364</li>
                                <li class="grey">
                                    <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                        <input type="number" name="n2311" min=0 value=0  style="width:2.5rem; height:2rem">
                                    </div> 
                                </li>
                            </ul>
                        </div>
                        <div class="columns">
                            <ul class="price">
                                <li class="header">Με Διαδρομές Αεροδρομίου</li>
                                <li class="grey">25,00&#8364</li>
                                <li class="grey">
                                    <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                        <input type="number" name="n2312" min=0 value=0  style="width:2.5rem; height:2rem">
                                    </div> 
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="232" class="tabcontent lvl3tab">
                        <div class="columns">
                            <ul class="price">
                            <li class="header">Χωρίς Διαδρομές Αεροδρομίου</li>
                                <li class="grey">43,00&#8364</li>
                                <li class="grey">
                                    <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                        <input type="number" name="n2321" min=0 value=0  style="width:2.5rem; height:2rem">
                                    </div> 
                                </li>
                            </ul>
                        </div>
                        <div class="columns">
                            <ul class="price">
                            <li class="header">Με Διαδρομές Αεροδρομίου</li>
                                <li class="grey">71,00&#8364</li>
                                <li class="grey">
                                    <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                        <input type="number" name="n2322" min=0 value=0  style="width:2.5rem; height:2rem">
                                    </div> 
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="233" class="tabcontent lvl3tab">
                        <div class="columns">
                            <ul class="price">
                            <li class="header">Χωρίς Διαδρομές Αεροδρομίου</li>
                                <li class="grey">85,00&#8364</li>
                                <li class="grey">
                                    <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                        <input type="number" name="n2331" min=0 value=0  style="width:2.5rem; height:2rem">
                                    </div> 
                                </li>
                            </ul>
                        </div>
                        <div class="columns">
                            <ul class="price">
                            <li class="header">Με Διαδρομές Αεροδρομίου</li>
                                <li class="grey">125,00&#8364</li>
                                <li class="grey">
                                    <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                        <input type="number" name="n2332" min=0 value=0  style="width:2.5rem; height:2rem">
                                    </div> 
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="234" class="tabcontent lvl3tab">
                        <div class="columns">
                            <ul class="price">
                            <li class="header">Χωρίς Διαδρομές Αεροδρομίου</li>
                                <li class="grey">165,00&#8364</li>
                                <li class="grey">
                                    <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                        <input type="number" name="n2341" min=0 value=0  style="width:2.5rem; height:2rem">
                                    </div> 
                                </li>
                            </ul>
                        </div>
                        <div class="columns">
                            <ul class="price">
                            <li class="header">Με Διαδρομές Αεροδρομίου</li>
                                <li class="grey">245,00&#8364</li>
                                <li class="grey">
                                    <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                        <input type="number" name="n2342" min=0 value=0  style="width:2.5rem; height:2rem">
                                    </div> 
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="3" class="tabcontent lvl1tab" style="border:none;">
                <div class="columns">
                    <ul class="price">
                    <li class="header">3 Ημερών + Μεταφορά και Επιστροφή στο Αεροδρόμιο</li>
                        <li class="grey" style="padding-bottom: 0;">22,00&#8364</li>
                        <li class="grey" style="padding-bottom: 1rem;">
                            <div class="form-control" style="background-color: #eee; border:none; margin:0;">
                                <input type="number" name="n31" min=0 value=0  style="width:2.5rem; height:2rem">
                            </div>                                
                        </li>
                    </ul>
                </div>                
            </div>
            <input type="text" name="hid" required style="display:none">

        </form>
        
    </div>
    <div class="form-control" style="background-color: white; border:none;margin-bottom:10rem; ">
        <button formnovalidate type="submit" class="submitticket" name="addto" form="tick" style="border-radius:5px;cursor:pointer;float:right;margin-right:5rem;margin-top:4rem;">
        Προσθήκη και μετάβαση στο Καλάθι <i class="fas fa-shopping-cart"></i></button>
    </div>
    
    <!-- <div style="margin-bottom:10rem;">
        <a href="./chart.php" style="float:right;margin-right:5rem;margin-top:4rem;padding:0.5rem;background-color:black;color:white;">Καλάθι</a>
    </div> -->
    <br> 

    

    <!-- Cards -->

    <!-- Footer Section Begin -->
    <?php
        include(dirname(__FILE__)."/footer.php");
    ?>
    <!-- Footer Section End -->

</body>

</html>

<script>
    var lvl1='',lvl2='',lvl3='';
    var lvl1evt,lvl2evt,lvl3evt;
    function lvl1f(evt,id)
    {
        if(lvl1!='')
        {
            document.getElementById(lvl1).style.display="none";
            lvl1evt.className=lvl1evt.className.replace(" active","");
        }
        if(lvl2!='')
        {
            document.getElementById(lvl2).style.display="none";
            lvl2evt.className=lvl2evt.className.replace(" active","");
            lvl2='';
            lvl2evt='';
        }
        if(lvl3!='')
        {
            document.getElementById(lvl3).style.display="none";
            lvl3evt.className=lvl3evt.className.replace( "active","");
            lvl3='';
            lvl3evt='';
        }
        //console.log(document.getElementById(id));
        console.log(1);
        document.getElementById(id).style.display="block";
        console.log(2);
        evt.currentTarget.className += " active";
        console.log(3);
        lvl1=id;
        console.log(4);
        lvl1evt=evt.currentTarget;
        console.log(5);
        
        
    };
    function lvl2f(evt,id)
    {
        if(lvl2!='')
        {
            document.getElementById(lvl2).style.display="none";
            lvl2evt.className=lvl2evt.className.replace(" active","");
        }
        if(lvl3!='')
        {
            document.getElementById(lvl3).style.display="none";
            lvl3evt.className=lvl3evt.className.replace( "active","");
            lvl3='';
            lvl3evt='';
        }
        console.log(document.getElementById(id));
        document.getElementById(id).style.display="block";
        evt.currentTarget.className += " active";
        lvl2=id;
        lvl2evt=evt.currentTarget;
    };
    function lvl3f(evt,id)
    {
        if(lvl3!='')
        {
            document.getElementById(lvl3).style.display="none";
            lvl3evt.className=lvl3evt.className.replace(" active","");
        }
        console.log(document.getElementById(id));
        document.getElementById(id).style.display="block";
        evt.currentTarget.className += " active";
        lvl3=id;
        lvl3evt=evt.currentTarget;
    };



    // function option(evt, cityName) {
    // // Declare all variables
    // var i, tabcontent, tablinks;

    // // Get all elements with class="tabcontent" and hide them
    // tabcontent = document.getElementsByClassName("lvl1");
    // for (i = 0; i < tabcontent.length; i++) {
    //     tabcontent[i].style.display = "none";
    // }

    // // Get all elements with class="tablinks" and remove the class "active"
    // tablinks = document.getElementsByClassName("lvl1");
    // for (i = 0; i < tablinks.length; i++) {
    //     tablinks[i].className = tablinks[i].className.replace(" active", "");
    // }

    // // Show the current tab, and add an "active" class to the button that opened the tab
    // document.getElementById(cityName).style.display = "block";
    // evt.currentTarget.className += " active";
    // }
</script>

<script>
// Get the element with id="defaultOpen" and click on it
    //document.getElementById('default').click();
</script>