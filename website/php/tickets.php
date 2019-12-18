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
        <div class="tab">
            <button class="tablinks lvl1" id="default" style="margin-left:0rem" onclick="lvl1f(event, '1')">Κανονικό Εισιτήριο</button>
            <button class="tablinks lvl1" style="margin-left:0rem" onclick="lvl1f(event, '2')">Μειωμένο Εισιτήριο</button>
            <button class="tablinks lvl1" style="margin-left:0rem" onclick="lvl1f(event, '3')">Τουριστικά Εισιτήρια (Πακέτα)</button>

        </div>
        <div id="1" class="tabcontent lvl1tab">
            <h3>Κανονικό Εισιτήριο</h3>
            <div class="tab">
                <button class="tablinks lvl2" style="margin-left:0rem" onclick="lvl2f(event, '11')">Ενιάιο Εισιτήριο</button>
                <button class="tablinks lvl2" style="margin-left:0rem" onclick="lvl2f(event, '12')">Εισιτήριο Αεροδρομίου</button>
                <button class="tablinks lvl2" style="margin-left:0rem" onclick="lvl2f(event, '13')">Εισιτήριο Μακράς Διάρκειας</button>
            </div>
            <div id="11" class="tabcontent lvl2tab">
                <h3>Ενιάιο Εισιτήριο</h3>
                <div class="columns">
                    <ul class="price">
                        <li class="header">90 Λεπτών</li>
                        <li class="grey">1,40&#8364</li>
                        <li class="grey"><a href="#" class="button">Sign Up</a></li>
                    </ul>
                </div>
                <div class="columns">
                    <ul class="price">
                        <li class="header">Ημερήσιο</li>
                        <li class="grey">4,50&#8364</li>
                        <li class="grey"><a href="#" class="button">Sign Up</a></li>
                    </ul>
                </div>
                <div class="columns">
                    <ul class="price">
                        <li class="header">5 Ημερών</li>
                        <li class="grey">6&#8364</li>
                        <li class="grey"><a href="#" class="button">Sign Up</a></li>
                    </ul>
                </div>
                <div class="columns">
                    <ul class="price">
                        <li class="header">5πλό Εισιτήριο</li>
                        <li class="grey">6,5&#8364</li>
                        <li class="grey"><a href="#" class="button">Sign Up</a></li>
                    </ul>
                </div>
                <div class="columns">
                    <ul class="price">
                        <li class="header">10+1 Ειστήρια</li>
                        <li class="grey">6&#8364</li>
                        <li class="grey"><a href="#" class="button">Sign Up</a></li>
                    </ul>
                </div>
                <div class="columns">
                    <ul class="price">
                        <li class="header">2πλό Ειστήριο</li>
                        <li class="grey">2,7&#8364</li>
                        <li class="grey"><a href="#" class="button">Sign Up</a></li>
                    </ul>
                </div>
            </div>
            <div id="12" class="tabcontent lvl2tab">
                <h3>Εισιτήριο Αεροδρομίου</h3>
                <div class="columns">
                    <ul class="price">
                        <li class="header">1 Διαδρομής με Μετρό</li>
                        <li class="grey">10&#8364</li>
                        <li class="grey"><a href="#" class="button">Sign Up</a></li>
                    </ul>
                </div>
                <div class="columns">
                    <ul class="price">
                        <li class="header">1 Διαδρομής με λεωφορείο</li>
                        <li class="grey">6&#8364</li>
                        <li class="grey"><a href="#" class="button">Sign Up</a></li>
                    </ul>
                </div>
                <div class="columns">
                    <ul class="price">
                        <li class="header">1 Μετ' επιστροφής</li>
                        <li class="grey">18&#8364</li>
                        <li class="grey"><a href="#" class="button">Sign Up</a></li>
                    </ul>
                </div>
                <div class="columns">
                    <ul class="price">
                        <li class="header">1 από/πρός τους σταθμούς Παλλήνη-Κάντζα-Κορωπί με Μετρό</li>
                        <li class="grey">6,5&#8364</li>
                        <li class="grey"><a href="#" class="button">Sign Up</a></li>
                    </ul>
                </div>
            </div>
            <div id="13" class="tabcontent lvl2tab">
                <h3>Εισιτήριο Μακράς Διάρκειας</h3>
                <div class="tab">
                    <button class="tablinks lvl3" style="margin-left:0rem" onclick="lvl3f(event, '131')">30 Ημερών</button>
                    <button class="tablinks lvl3" style="margin-left:0rem" onclick="lvl3f(event, '132')">90 Ημερών</button>
                    <button class="tablinks lvl3" style="margin-left:0rem" onclick="lvl3f(event, '133')">180 Ημερών</button>
                    <button class="tablinks lvl3" style="margin-left:0rem" onclick="lvl3f(event, '134')">365 Ημερών</button>
                </div>
                <div id="131" class="tabcontent lvl2tab">
                    <h3>30 Ημερών</h3>
                    <div class="columns">
                        <ul class="price">
                            <li class="header">Χωρίς Διαδρομές Αεροδρομίου</li>
                            <li class="grey">30&#8364</li>
                            <li class="grey"><a href="#" class="button">Sign Up</a></li>
                        </ul>
                    </div>
                    <div class="columns">
                        <ul class="price">
                            <li class="header">Με Διαδρομές Αεροδρομίου</li>
                            <li class="grey">49&#8364</li>
                            <li class="grey"><a href="#" class="button">Sign Up</a></li>
                        </ul>
                    </div>
                </div>
                <div id="132" class="tabcontent lvl2tab">
                    <h3>90 Ημερών</h3>
                    <div class="columns">
                        <ul class="price">
                        <li class="header">Χωρίς Διαδρομές Αεροδρομίου</li>
                            <li class="grey">85&#8364</li>
                            <li class="grey"><a href="#" class="button">Sign Up</a></li>
                        </ul>
                    </div>
                    <div class="columns">
                        <ul class="price">
                        <li class="header">Με Διαδρομές Αεροδρομίου</li>
                            <li class="grey">142&#8364</li>
                            <li class="grey"><a href="#" class="button">Sign Up</a></li>
                        </ul>
                    </div>
                </div>
                <div id="133" class="tabcontent lvl2tab">
                    <h3>180 Ημερών</h3>
                    <div class="columns">
                        <ul class="price">
                        <li class="header">Χωρίς Διαδρομές Αεροδρομίου</li>
                            <li class="grey">170&#8364</li>
                            <li class="grey"><a href="#" class="button">Sign Up</a></li>
                        </ul>
                    </div>
                    <div class="columns">
                        <ul class="price">
                        <li class="header">Με Διαδρομές Αεροδρομίου</li>
                            <li class="grey">250&#8364</li>
                            <li class="grey"><a href="#" class="button">Sign Up</a></li>
                        </ul>
                    </div>
                </div>
                <div id="134" class="tabcontent lvl2tab">
                    <h3>365 Ημερών</h3>
                    <div class="columns">
                        <ul class="price">
                        <li class="header">Χωρίς Διαδρομές Αεροδρομίου</li>
                            <li class="grey">330&#8364</li>
                            <li class="grey"><a href="#" class="button">Sign Up</a></li>
                        </ul>
                    </div>
                    <div class="columns">
                        <ul class="price">
                        <li class="header">Με Διαδρομές Αεροδρομίου</li>
                            <li class="grey">490&#8364</li>
                            <li class="grey"><a href="#" class="button">Sign Up</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="2" class="tabcontent lvl1tab">
            <h3>Μειωμένο Εισιτήριο</h3>
            <div class="tab">
                <button class="tablinks lvl2" style="margin-left:0rem" onclick="lvl2f(event, '21')">21</button>
                <button class="tablinks lvl2" style="margin-left:0rem" onclick="lvl2f(event, '22')">22</button>
                <button class="tablinks lvl2" style="margin-left:0rem" onclick="lvl2f(event, '23')">23</button>
            </div>
            <div id="21" class="tabcontent lvl2tab">
                <h3>London</h3>
                <p>London is the capital city of England.</p>
            </div>
            <div id="22" class="tabcontent lvl2tab">
                <h3>London</h3>
                <p> is the capital city of England.</p>
            </div>
            <div id="23" class="tabcontent lvl2tab">
                <a href="#">Αγορία Εισιτηρίου
            </div>
        </div>
        
    </div>
    
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
        console.log(document.getElementById(id));
        document.getElementById(id).style.display="block";
        evt.currentTarget.className += " active";
        lvl1=id;
        lvl1evt=evt.currentTarget;
        
        
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