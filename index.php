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
    <link rel="stylesheet" href="website/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="website/css/jquery.timepicker.css">
</head>

<body>

    <?php
        include(dirname(__FILE__)."/website/php/header.php");
    ?>
    
    <!-- Hero Section Begin -->
    <section class="hero-section set-bg">
    <section class="ftco-section ftco-no-pt">
    	<div class="container-fluid" style="padding-left: 280px !important">
    		<div class="row no-gutters">
    			<div class="col-md-10 featured-top">
    				<div class="row no-gutters">
	  					<div class="col-md-4">
	  						<form action="website/php/results.php" method="post" class="request-form ftco-animate bg-primary">
		          		        <h2>Υπολογισμός Διαδρομής</h2>
			    				<div class="form-group">
			    					<label class="label">Σημείο Εκκίνησης</label>
			    					<input name="start" type="text" class="form-control" placeholder="Σταθμός Εκκίνησης" required>
			    				</div>
			    				<div class="form-group">
			    					<label class="label">Προορισμός</label>
			    					<input name="destination" type="text" class="form-control" placeholder="Σταθμός Προορισμού" required>
			    				</div>
			    				<div class="d-flex">
			    					<div class="form-group mr-2">
			                            <label class="label">Ημερομηνία Αναχώρησης</label>
			                            <input name="date" type="text" class="form-control" id="book_pick_date" placeholder="Ημερομηνία" readonly/>
			                        </div>
                                    <!-- <div class="form-group ml-2">
                                        <label for="" class="label">Drop-off date</label>
                                        <input type="text" class="form-control" id="book_off_date" placeholder="Date">
                                    </div> -->
		                        </div>
                                <div class="form-group">
                                    <label class="label">Ωρα Αναχώρησης</label>
                                    <input name="time" type="text" class="form-control" id="time_pick" placeholder="Ώρα"/>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Πάμε" class="btn btn-secondary py-3 px-4">
                                </div>
			    			</form>
	  					</div>
	  				</div>
				</div>
  		    </div>
        </section>
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

<script src="website/javascript/jquery.min.js"></script>
<script src="website/javascript/jquery-migrate-3.0.1.min.js"></script>
<script src="website/javascript/bootstrap.min.js"></script>
<script src="website/javascript/bootstrap-datepicker.js"></script>
<script src="website/javascript/jquery.timepicker.min.js"></script>
<script src="website/javascript/index.js"></script>
</html>