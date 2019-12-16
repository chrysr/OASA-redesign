<!-- Header Section Begin -->
<header class="header-section">
    <div class="container-fluid">
        <div class="logo">
            <a href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/index.php"><img src="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/images/logo.png" alt="Αρχική"></a>
        </div>
        <nav class="main-menu mobile-menu">
            <ul>
                <li <?php echo ($page == 'one') ? "class='active'" : ""; ?>><a href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/index.php">Υπολογισμός Διαδρομής</a></li>
                <li <?php echo ($page == 'two') ? "class='active'" : ""; ?>><a href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/php/coming_soon.php">Εισιτήρια</a></li>
                <li <?php echo ($page == 'three') ? "class='active'" : ""; ?>><a href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/php/coming_soon.php">Δρομολόγια</a></li>
                <li <?php echo ($page == 'four') ? "class='active'" : ""; ?>>
                    <div class="dropdown">
                        <a class="dropbtn">Πληροφορίες</a>
                        <div class="dropdown-content">
                            <a href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/php/coming_soon.php">Σταθμοί</a>
                            <a href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/php/amea.php">ΑμεΑ</a>
                            <a href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/php/coming_soon.php">Νέα & Ανακοινώσεις</a>
                        </div>
                    </div>
                </li>
                <li <?php echo ($page == 'five') ? "class='active'" : ""; ?>>
                    <div class="dropdown">
                        <a class="dropbtn">Επικοινωνία</a>
                        <div class="dropdown-content">
                            <a href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/php/coming_soon.php">Επικοινωνία με τον ΟΑΣΑ</a>
                            <a href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/php/coming_soon.php">Συχνές Ερωτήσεις</a>
                            <a href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/php/coming_soon.php">Σχετικά με τον ΟΑΣΑ</a>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="header-right">
            
            <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true):?>
                <div class="user-access">
                    <a href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/php/account.php">Η ATH.ENA Card μου</a>
                </div> 
            <?php else:?>
                <div class="user-access">
                    <a href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/php/signup.php">Εγγραφή/</a>
                    <a href="<?$_SERVER['DOCUMENT_ROOT']?>/OASA-redesign/website/php/login.php">Σύνδεση</a>
                </div>        
            <?php endif;?>
            
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
<!-- Header End -->
