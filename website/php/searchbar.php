<?php
// Start the session
session_start();
?>


<!DOCTYPE html>
<html lang="el">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/images/favicon.ico">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Αναζήτηση</title>

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
        $page='two'; include(dirname(__FILE__)."/header.php");
    ?>
    
    <div class="container-fluid" style="padding: 2.65rem 0rem 20rem 0rem; background-color: white;display:flex;flex-direction:column;"> <!--flex;flex-direction:row; -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" ><a href="../../index.php"><i style="color:black;" class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item" style="color:rgb(64, 152, 190);"><a style="color:inherit;" href="#">Αναζήτηση</a></li>
            </ol>
        </nav>   
        <?php
            $files=array('./amea.php' => "ΑμεΑ",'./faq.php'=>'Συχνές Ερωτήσεις','./proexoxes.php'=>'Στάσεις με Προεξοχές','./instructions.php'=>'Γενικές Οδηγίες','./works.php'=>'Κατάσταση Δικτύου');
            if(isset($_GET['search']))
            {    
                print '<div style="margin: 2rem 4rem 2rem 4rem;">
                <h3 style="">Αποτελέσματα για: <b>'.$_GET['search'].'</b></h3>
                </div>';
                $pieces=explode(" ",$_GET['search']);
                $counter=0;
                foreach($files as $file=>$title)
                {
                    foreach($pieces as $word)
                    {
                        $curfile=strip_tags(file_get_contents($file));
                        $curfilearr=explode(" ",$curfile);
                        $position=0;
                        foreach($curfilearr as $index=>$arrword)
                        {
                            if(strtolower($arrword)==strtolower($word))
                            {
                                $counter+=1;
                                print '<div style="margin:1rem 6rem;border-radius:7px;border:2px solid #ccc;">
                                <div style="border-bottom:5px solid #ccc;vertical-align:middle; margin:0;"> ';
                                print '<h3 style="padding: 0.5rem 0rem 0.5rem 1rem; margin:0;"><a href="'.$file.'">'.$title.'</a></h3></div>';
                                print '<div style="padding:1rem;" ><span>';
                                if($index-50<0)
                                {
                                    if($index+50>count($curfilearr))
                                    {
                                        foreach($curfilearr as $indx=>$arrwrd)
                                        {
                                            if(strtolower($arrwrd)==strtolower($word))
                                                print '<b>'.$arrwrd.'</b> ';
                                            else
                                                print $arrwrd.' ';   
                                        }
                                    }
                                    else
                                    {
                                        foreach($curfilearr as $indx=>$arrwrd)
                                        {
                                            if($indx==$index+50)
                                                break;
                                            if(strtolower($arrwrd)==strtolower($word))
                                                print '<b>'.$arrwrd.'</b> ';
                                            else
                                                print $arrwrd.' ';   
                                        }
                                    }
                                }
                                else
                                {

                                    if($index+50>count($curfilearr))
                                    {
                                        foreach($curfilearr as $indx=>$arrwrd)
                                        {
                                            if($indx<$index)
                                                continue;
                                            if(strtolower($arrwrd)==strtolower($word))
                                                print '<b>'.$arrwrd.'</b> ';
                                            else
                                                print $arrwrd.' ';   
                                        }
                                    }
                                    else
                                    {
                                        foreach($curfilearr as $indx=>$arrwrd)
                                        {
                                            if($indx<$index-50)
                                                continue;
                                            if($indx>$index+50)
                                                break;
                                            if(strtolower($arrwrd)==strtolower($word))
                                                print '<b>'.$arrwrd.'</b> ';
                                            else
                                                print $arrwrd.' ';   
                                        }
                                    }
                                }
                                print ' ...</span></div>';
                                print '</div>';
                            }
                        }
                    }
                }
                if($counter==0)
                {
                    print '<div style="margin:0 4rem 0 4rem;">Δεν βρέθηκαν αποτελέσματα</div>';
                }
            }
        ?>     
    </div>    
    <?php
        include(dirname(__FILE__)."/footer.php");
    ?>
</body>

<script src="../javascript/modal.js"></script>

</html>