<!-- Header Section Begin -->
<link rel="shortcut icon" type="image/x-icon" href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/images/favicon.ico">

<header class="header-section">

    <div class="container-fluid">
        <div class="logo">
            <a href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/index.php"><img src="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/images/logo.png" alt="Αρχική"></a>
        </div>
        <nav class="main-menu mobile-menu">
            <ul>
                <li><a <?php echo ($page == 'one') ? "class='active_head'" : ""; ?> href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/index.php">Υπολογισμός Διαδρομής</a></li>
                <li><a <?php echo ($page == 'two') ? "class='active_head'" : ""; ?> href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/php/tickets.php">Εισιτήρια</a></li>
                <li><a <?php echo ($page == 'three') ? "class='active_head'" : ""; ?> href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/php/timetables.php">Δρομολόγια</a></li>
                <li >
                    <div class="dropdown">
                        <a <?php echo ($page == 'four') ? "class='active_head'" : ""; ?> class="dropbtn">Πληροφορίες</a><i class="arrow down"></i>
                        <div class="dropdown-content">
                            <a href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/php/amea.php">ΑμεΑ</a>
                            <a href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/php/coming_soon.php">Νέα & Ανακοινώσεις</a>
                            <a href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/php/faq.php">Συχνές Ερωτήσεις</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <a <?php echo ($page == 'five') ? "class='active_head'" : ""; ?> class="dropbtn">Επικοινωνία</a><i class="arrow down"></i>
                        <div class="dropdown-content">
                            <a href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/php/coming_soon.php">Επικοινωνία με τον ΟΑΣΑ</a>
                            <a href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/php/coming_soon.php">Σχετικά με τον ΟΑΣΑ</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="searchbar">
                        <input class="search_input" type="text" name="" placeholder="Αναζήτηση...">
                        <button type="submit" class="search_icon"><img src="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/images/search.png" alt="search icon"></button>
                    </div>
                </li>
            </ul>    
        </nav>
        <div class="header-right">
            
            <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true):?>
                <div class="user-access">
                    <a <?php echo ($page == 'eight') ? "class='active_head'" : ""; ?> href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/php/account.php">Η ATH.ENA Card μου</a>
                </div> 
            <?php else:?>
                <div class="user-access">
                    <a <?php echo ($page == 'seven') ? "class='active_head'" : ""; ?> href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/php/signup.php">Εγγραφή</a>
                    <a href="#"> / </a>
                    <a <?php echo ($page == 'six') ? "class='active_head'" : ""; ?> href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/php/login.php">Σύνδεση</a>
                </div>        
            <?php endif;?>
            
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
<!-- Header End -->
