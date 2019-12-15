<?php
// Start the session
session_start();
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
    <link rel="stylesheet" href="website/css/header_footer.css" type="text/css">
    <link rel="stylesheet" href="website/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="website/css/style.css" type="text/css">
</head>

<body>

    <?php
        include(dirname(__FILE__)."/website/php/header.php");
    ?>
    
    <!-- Hero Section Begin -->
    <section class="hero-section set-bg">
    </section>
    <!-- Hero Section End -->

    <!-- Cards Section Begin-->
    <div class="container-fluid" style="padding: 4rem 8rem 8rem 8rem; background-color: #F9F9F9;">
        <div class="row">
			<div class="col-md-4">
				<div class="card">
                    <a href="">
					    <img src="website/images/ticket_front_page.jpeg" class="card-img-top" alt="Tickets">
                    </a>
					<div class="card-body">
						<a href="">
                            <h5 class="card-title">Εισιτήρια</h5>
                        </a>
						<p class="card-text">Αγοράστε και επαναφορτίστε ηλεκτρονικά την ΑΤΗ.ΕΝΑ κάρτα σας</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<a href="">
                        <img src="website/images/news_front_page.jpeg" class="card-img-top" alt="News">
                    </a>
					<div class="card-body">
                        <a href="">
                            <h5 class="card-title">Νέα</h5>
                        </a>
						<p class="card-text">Ενημερωθείτε για εκδηλώσεις και έργα που μπορεί να επηρεάσουν το ταξίδι σας</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
                    <a href="">
					    <img src="website/images/places_front_page.jpeg" class="card-img-top" alt="Places">
                    </a>
					<div class="card-body">
                    <a href="">
                            <h5 class="card-title">Σημεία Ενδιαφέροντος</h5>
                        </a>
						<p class="card-text">Δείτε ενδιαφέροντα σημεία που μπορείτε να επισκεφθείτε με τον ΟΑΣΑ</p>
					</div>
				</div>
			</div>
		</div>
    </div>
    <!-- Cards Section End-->

    <?php
        include(dirname(__FILE__)."/website/php/footer.php");
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

</html>