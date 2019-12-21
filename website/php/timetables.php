<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="el">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Δρομολόγια</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../../website/css/header_footer.css" type="text/css">
    <link rel="stylesheet" href="../../website/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../website/css/timetables.css" type="text/css">
</head>

<body>
    <?php
        $page = 'three'; include(dirname(__FILE__)."/header.php");
    ?>

    <div class="tab-wrapper">
        <ul class="tab-menu">
            <li class="active">Ηλεκτρικός</li>
            <li>Μετρό</li>
            <li>Λεωφορεία</li>
            <li>Τραμ</li>
            <li>Προαστιακός</li>
            <li>Τρόλεϊ</li>
        </ul>
        <div class="tab-content">
            <div>
                <h5>Επιλέξτε μια γραμμή</h5>
                <br>
                <a href="google.com" class="icon-border-m1">
                    <span>M1</span>
                </a>
            </div>
            <div>
                <h5>Επιλέξτε μια γραμμή</h5>
                <br>
                <a href="google.com" class="icon-border-m2">
                    <span>M2</span>
                </a>
                <a href="google.com" class="icon-border-m3">
                    <span>M3</span>
                </a>
            </div>
            <div>
                <h5>Επιλέξτε μια γραμμή</h5>
                <br>
                <p onClick = "openList(this)" id="l0" class="icon-border-l">
                    <span>0</span>
                </p>
                <p onClick = "openList(this)" id="l1" class="icon-border-l">
                    <span>1</span>
                </p>
                <p onClick = "openList(this)" id="l6" class="icon-border-l">
                    <span>6</span>
                </p>
                <ul id="lil0" style="display: none">
                    <li>
                        <a href="google.com" class="icon-border-l">
                            <span>021</span>
                        </a>
                    </li>
                    <li>
                        <a href="google.com" class="icon-border-l">
                            <span>024</span>
                        </a>
                    </li>
                    <li>
                        <a href="google.com" class="icon-border-l">
                            <span>049</span>
                        </a>
                    </li>
                </ul>
                <ul id="lil1" style="display: none">
                    <li>
                        <a href="google.com" class="icon-border-l">
                            <span>101</span>
                        </a>
                    </li>
                    <li>
                        <a href="google.com" class="icon-border-l">
                            <span>122</span>
                        </a>
                    </li>
                    <li>
                        <a href="google.com" class="icon-border-l">
                            <span>140</span>
                        </a>
                    </li>
                </ul>
                <ul id="lil6" style="display: none">
                    <li>
                        <a href="google.com" class="icon-border-l">
                            <span>602</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <h5>Επιλέξτε μια γραμμή</h5>
                <br>
                <a href="google.com" class="icon-border-tram">
                    <span>T</span>
                </a>
            </div>
            <div>
                <h5>Επιλέξτε μια γραμμή</h5>
                <br>
                <a href="google.com" class="icon-border-p1">
                    <span>Π1</span>
                </a>
                <a href="google.com" class="icon-border-p2">
                    <span>Π2</span>
                </a>
                <a href="google.com" class="icon-border-p3">
                    <span>Π3</span>
                </a>
                <a href="google.com" class="icon-border-p4">
                    <span>Π4</span>
                </a>
            </div>
            <div>
                <h5>Επιλέξτε μια γραμμή</h5>
                <br>
                <a href="google.com" class="icon-border-t">
                    <span>T1</span>
                </a>
                <a href="google.com" class="icon-border-t">
                    <span>T2</span>
                </a>
                <a href="google.com" class="icon-border-t">
                    <span>T3</span>
                </a>
                <a href="google.com" class="icon-border-t">
                    <span>T4</span>
                </a>
                <a href="google.com" class="icon-border-t">
                    <span>T5</span>
                </a>
                <a href="google.com" class="icon-border-t">
                    <span>T6</span>
                </a>
            </div>
        </div><!-- //tab-content -->
    </div><!-- //tab-wrapper -->

    <?php
        include(dirname(__FILE__)."/footer.php");
    ?>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
    
        var $wrapper = $('.tab-wrapper'),
            $allTabs = $wrapper.find('.tab-content > div'),
            $tabMenu = $wrapper.find('.tab-menu li'),
            $line = $('<div class="line"></div>').appendTo($tabMenu);
        
        $allTabs.not(':first-of-type').hide();  
        $tabMenu.filter(':first-of-type').find(':first').width('100%')
        
        $tabMenu.each(function(i) {
            $(this).attr('data-tab', 'tab'+i);
        });
        
        $allTabs.each(function(i) {
            $(this).attr('data-tab', 'tab'+i);
        });
        
        $tabMenu.on('click', function() {
            
            var dataTab = $(this).data('tab'),
                $getWrapper = $(this).closest($wrapper);
            
            $getWrapper.find($tabMenu).removeClass('active');
            $(this).addClass('active');
            
            $getWrapper.find('.line').width(0);
            $(this).find($line).animate({'width':'100%'}, 'fast');
            $getWrapper.find($allTabs).hide();
            $getWrapper.find($allTabs).filter('[data-tab='+dataTab+']').show();
        });

    });//end ready
</script>

<script>
    function openList(n) {
        var sel = 'li' + n.id;
        var list = document.getElementById(sel);
        var og = document.getElementById(n.id);

        if (list.style.display == "none"){
            list.style.display = "block";
            og.style.opacity = 1;
        }else{
            og.style.opacity = 0.8;
            list.style.display = "none";
        }
    }
</script>

</html>