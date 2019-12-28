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
    <title>Συχνές Ερωτήσεις</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../../website/css/header_footer.css" type="text/css">
    <link rel="stylesheet" href="../../website/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="../../website/css/faq.css" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
</head>

<body>
    <?php
        $page = 'four'; include(dirname(__FILE__)."/header.php");
    ?>

    <!--== FAQ Area Start ==-->
    <section id="faq-page-area" class="section-padding">
		<nav aria-label="breadcrumb" style="margin-top: -153px">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" ><a href="../../index.php"><i style="color:black;" class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item" style="color:rgb(64, 152, 190);"><a style="color:inherit;" href="./faq.php">Συχνές Ερωτήσεις</a></li>
            </ol>
        </nav>
        <div class="container" style="margin-top: 50px">
            <div class="row">
                <!-- FAQ Content Start -->
				<div class="col-lg-8">
					<div class="faq-details-content">
						<!-- Single FAQ Subject  Start -->
						<h2 style="border-bottom: 1px solid #4098BE; font-weight: bold; margin-bottom: 20px; padding-bottom: 10px;">ΣΥΧΝΕΣ ΕΡΩΤΗΣΕΙΣ</h2>
						<br>

						<div class="single-faq-sub">
							<h3>Μέσα Μεταφοράς υπό την εποπτεία του ΟΑΣΑ</h3>
							<div class="single-faq-sub-content">
								<div id="accordion">
									<!-- Single FAQ Start -->
									<div class="card">
										<div class="card-header" id="headingOne">
											<h5 class="mb-0"><button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
												<span>Μητροπολιτικός Σιδηρόδρομος (Μετρό)</span>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
											</button></h5>
										</div>

										<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
											<div class="card-body">
                                                Το Μετρό της Αθήνας είναι το δίκτυο υπόγειου και επίγειου μητροπολιτικού σιδηροδρόμου της πόλης των Αθηνών, καθώς και την Μητροπολιτική περιοχή της Αθήνας. Το μετρό της Αθήνας είναι το μοναδικό δίκτυο μετρό στην Ελλάδα. Εξυπηρετεί το πολεοδομικό συγκρότημα Αθήνας, το οποίο έχει πληθυσμό άνω των τριών εκατομμυρίων κατοίκων. Προσφέρει επίσης πρόσβαση στο Διεθνές Αεροδρόμιο Αθηνών «Ελευθέριος Βενιζέλος» που βρίσκεται στην ανατολική Αττική.    
                                                <p>Το δίκτυο εκμεταλλεύεται η ΣΤΑ.ΣΥ. Α.Ε.</p>
											</div>
										</div>
									</div>
									<!-- Single FAQ End -->
									
									<!-- Single FAQ Start -->
									<div class="card">
										<div class="card-header" id="headingTwo">
											<h5 class="mb-0"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									  			<span>Προαστιακός Σιδηρόδρομος</span>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
									  		</button></h5>
										</div>
										<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
											<div class="card-body">
                                            Ο Προαστιακός σιδηρόδρομος της Αθήνας αποτελεί μια υπηρεσία προαστιακού σιδηροδρόμου που εξυπηρετεί αστικά, προαστιακά και περιφερειακά κέντρα στην Αττική και τους όμορους νομούς.
                                            </div>
										</div>
									</div>
									<!-- Single FAQ Start -->
									
									<!-- Single FAQ End -->
									<div class="card">
										<div class="card-header" id="headingThree">
											<h5 class="mb-0"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									  			<span>Τραμ</span>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
											</button></h5>
										</div>
										<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
											<div class="card-body">
                                                Το Τραμ συνδέει αφενός το κέντρο της Αθήνας (Σύνταγμα, Ζάππειο) με το παραλιακό μέτωπο, αφετέρου το Νέο Φάληρο με τα νοτιότερα προάστια (Γλυφάδα, Βούλα), μέσω της Παραλιακής οδού. Η λειτουργία του ξεκίνησε στις 19 Ιουλίου του 2004, ενόψει των Ολυμπιακών Αγώνων της Αθήνας έναν μήνα μετά, ενώ σε εξέλιξη βρίσκεται η κατασκευή της επέκτασης του μέσου προς το κέντρο του Πειραιά και η σύνδεση του παραλιακού μετώπου με το Μετρό, στο σταθμό "Αργυρούπολη" (Στάση Τραμ "Ελληνικό" - Αμαξοστάσιο Τραμ - Σταθμός Μετρό "Αργυρούπολη").
                                                <p>Το δίκτυο εκμεταλλεύεται η ΣΤΑ.ΣΥ. Α.Ε.</p>
											</div>
										</div>
									</div>
                                    <!-- Single FAQ End -->
                                    
                                    <!-- Single FAQ End -->
									<div class="card">
										<div class="card-header" id="headingBus">
											<h5 class="mb-0"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseBus" aria-expanded="false" aria-controls="collapseBus">
									  			<span>Αστικά λεωφορεία / Τρόλεϊ</span>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
											</button></h5>
										</div>
										<div id="collapseBus" class="collapse" aria-labelledby="headingBus" data-parent="#accordion">
											<div class="card-body">
                                                Το δίκτυο των αστικών λεωφορείων καλύπτει το μεγαλύτερο μέρος του συγκοινωνιακού έργου στο ΠΣ της Αθήνας. Με 280 γραμμές και 7.500 στάσεις, εξυπηρετούνται οι μετακινήσεις από τα προάστια προς τα κέντρο της Αθήνας, μετακίνηση από και προς σταθμούς του Μετρό, σύνδεση με τον Διεθνή Αερολιμένα Αθηνών καθώς και οι μετακινήσεις εντός μητροπολιτικής περιοχής αλλά εκτός του πολεοδομικού συγκροτήματος. Το δίκτυο εκμεταλλεύεται η Ο.ΣΥ. Α.Ε. Το 2020 αναμένεται να ολοκληρωθεί ο διαγωνισμός για την προμήθεια και συντήρηση (για 15 έτη) 400 νέων λεωφορείων (170 ηλεκτρικά, 180 φυσικού αερίου και 50 πετρελαίου) για την περιοχή της Αττικής.
											</div>
										</div>
									</div>
									<!-- Single FAQ End -->
								</div>
							</div>
						</div>
						<!-- Single FAQ Subject End -->
						
						<!-- Single FAQ Subject  Start -->
						<div class="single-faq-sub">
							<h3>Τιμές εισιτηρίων</h3>
							<div class="single-faq-sub-content">
								<div id="accordion_2">
									<!-- Single FAQ Start -->
									<div class="card">
										<div class="card-header" id="heading4">
											<h5 class="mb-0"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
												<span>Εισιτήριο 90 λεπτών για όλα τα Μέσα</span>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
											</button></h5>
										</div>

										<div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion_2">
											<div class="card-body">
                                                <h5>Κανονικό 1,40 ευρώ / μειωμένο 0,60 ευρώ</h5>
                                            Το Ενιαίο Εισιτήριο 90 λεπτών ισχύει σε όλα τα μέσα αρμοδιότητας ΟΑΣΑ: Λεωφορεία, Τρόλλεϋ, Τραμ, Ηλεκτρικό Σιδηρόδρομο, Μετρό (μέχρι Κορωπί) και στην ΤΡΑΙΝΟΣΕ (στο τμήμα του Προαστιακού Μαγούλα-Πειραιάς-Κορωπί). Δεν ισχύει στις λεωφορειακές γραμμές EXPRESS του Αεροδρομίου, στη γραμμή Χ80 και στο Μετρό στο τμήμα Κορωπί-Αεροδρόμιο.
Ο χρόνος ισχύος του ενιαίου εισιτηρίου είναι 90 λεπτά από την πρώτη επικύρωσή του σε πύλη σταθμού του μετρό ή σε επικυρωτικό μηχάνημα στα λεωφορεία, τρόλλευ, τραμ.


Τα εισιτήρια των 90 λεπτών για όλα τα μέσα διατίθενται σε εκπτωτικά πακέτα,  2πλου εισιτηρίου, 5 εισιτηρίων και 10+1 εισιτηρίων.
Στην περίπτωση αγοράς πακέτου εισιτηρίων αξίας 1,40 ευρώ, συνολικής τιμής 6,50 ευρώ (πακέτο 5 εισιτηρίων) ή 13,50 ευρώ (πακέτο 10+1 εισιτηρίων), ισχύει η μέγιστη χρέωση ανά ημέρα.
Δηλαδή, εάν επικυρώσετε 4 εισιτήρια από το πακέτο σας σε μία ημέρα, δεν χρεώνεστε με άλλο εισιτήριο για τις υπόλοιπες μετακινήσεις σας την ίδια ημέρα. (Συνεχίζετε να επικυρώνετε την κάρτα/εισιτήριό σας, χωρίς να ακυρωθεί άλλο εισιτήριο).
											</div>
										</div>
									</div>
									<!-- Single FAQ End -->
									
									<!-- Single FAQ Start -->
									<div class="card">
										<div class="card-header" id="headingFour">
											<h5 class="mb-0"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
									  			<span>Ημερήσιο Εισιτήριο για όλα τα Μέσα</span>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
									  		</button></h5>
										</div>
										<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion_2">
											<div class="card-body">
                                                <h5>4,50 ευρώ</h5>
                                            Το Ημερήσιο εισιτήριο ισχύει σε όλα τα μέσα αρμοδιότητας ΟΑΣΑ: Λεωφορεία, Τρόλλεϋ, Τραμ, Ηλεκτρικό Σιδηρόδρομο, Μετρό (μέχρι Κορωπί) και στην ΤΡΑΙΝΟΣΕ (στο τμήμα του Προαστιακού Μαγούλα-Πειραιάς-Κορωπί).Το εισιτήριο αυτό ισχύει στη γραμμή Χ80, ενώ δεν ισχύει στις λεωφορειακές γραμμές EXPRESS του Αεροδρομίου, και στο Μετρό στο τμήμα Κορωπί-Αεροδρόμιο.
Το Ημερήσιο Εισιτήριο ισχύει για 24 ώρες από την πρώτη επικύρωσή του σε πύλη σταθμού του μετρό ή σε επικυρωτικό μηχάνημα στα λεωφορεία, τρόλλευ, τραμ.
											</div>
										</div>
									</div>
									<!-- Single FAQ Start -->
									
									<!-- Single FAQ End -->
									<div class="card">
										<div class="card-header" id="headingFive">
											<h5 class="mb-0"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
									  			<span>Εισιτήριο πέντε ημερών για όλα τα Μέσα</span>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
											</button></h5>
										</div>
										<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion_2">
											<div class="card-body">
                                                <h5>9,00 ευρώ</h5>
                                            Το εισιτήριο 5 ημερών ισχύει σε όλα τα μέσα αρμοδιότητας ΟΑΣΑ Λεωφορεία, Τρόλλεϋ, Τραμ, Ηλεκτρικό Σιδηρόδρομο, Μετρό (μέχρι Κορωπί) και στην ΤΡΑΙΝΟΣΕ (στο τμήμα του Προαστιακού Μαγούλα-Πειραιάς-Κορωπί). Δεν ισχύει στις λεωφορειακές γραμμές EXPRESS του Αεροδρομίου, στη γραμμή Χ80 και στο Μετρό στο τμήμα Κορωπί-Αεροδρόμιο.
Το εισιτήριο 5 ημερών ισχύει για πέντε 24ωρα από την πρώτη επικύρωσή του σε πύλη σταθμού του μετρό ή σε επικυρωτικό μηχάνημα στα λεωφορεία, τρόλλευ, τραμ.
											</div>
										</div>
									</div>
									<!-- Single FAQ End -->
									
									<!-- Single FAQ End -->
									<div class="card">
										<div class="card-header" id="headingSix">
											<h5 class="mb-0"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
									  			<span>3ημερο Τουριστικό εισιτήριο</span>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
											</button></h5>
										</div>
										<div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion_2">
											<div class="card-body">
                                                <h5>22,00 ευρώ</h5>
                                            Το 3ημερο Τουριστικό  εισιτήριο ισχύει  για 3 πλήρη 24ωρα από την πρώτη επικύρωσή του σε πύλη σταθμού του μετρό ή σε επικυρωτικό μηχάνημα στα λεωφορεία, τρόλλευ, τραμ, σε όλα τα μέσα αρμοδιότητας ΟΑΣΑ:  Λεωφορεία, Τρόλλεϋ, Τραμ, Ηλεκτρικό Σιδηρόδρομο, Μετρό (μέχρι Κορωπί) και στην ΤΡΑΙΝΟΣΕ (στο τμήμα του Προαστιακού Μαγούλα-Πειραιάς-Κορωπί). Επίσης περιλαμβάνει από μια διαδρομή από και προς τον Διεθνή Αερολιμένα Αθηνών με το Μετρό ή τις αντίστοιχες λεωφορειακές γραμμές express της Ο.ΣΥ. Το εισιτήριο αυτό ισχύει στη γραμμή Χ80.
											</div>
										</div>
									</div>
                                    <!-- Single FAQ End -->
                                    
                                    <!-- Single FAQ End -->
									<div class="card">
										<div class="card-header" id="headingSeven">
											<h5 class="mb-0"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
									  			<span>Εισιτήριο λεωφορειακών γραμμών EXPRESS Αεροδρομίου</span>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
											</button></h5>
										</div>
										<div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion_2">
											<div class="card-body">
                                                <h5>Κανονικό 6,00 ευρώ / μειωμένο 3,00 ευρώ</h5>
                                                Τα εισιτήρια για τις λεωφορειακές γραμμές EXPRESS του Αεροδρομίου ισχύουν για μία μόνο διαδρομή, από ή προς το Αεροδρόμιο.
Η αποβίβαση από τις λεωφορειακές γραμμές EXPRESS του Αεροδρομίου με κατεύθυνση το Αεροδρόμιο επιτρέπεται μόνο στο Αεροδρόμιο, και αντίστροφα, η επιβίβαση στις λεωφορειακές γραμμές EXPRESS του Αεροδρομίου με αφετηρία το Αεροδρόμιο επιτρέπεται μόνο από το Αεροδρόμιο.
											</div>
										</div>
									</div>
                                    <!-- Single FAQ End -->
                                    
                                    <!-- Single FAQ End -->
									<div class="card">
										<div class="card-header" id="heading8">
											<h5 class="mb-0"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
									  			<span>Εισιτήριο Αεροδρομίου του ΜΕΤΡΟ</span>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
											</button></h5>
										</div>
										<div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#accordion_2">
											<div class="card-body">
                                                <h5>Κανονικό 10,00 ευρώ / μειωμένο 5,00 ευρώ</h5>
                                                Το Εισιτήρια Αεροδρομίου του ΜΕΤΡΟ ισχύουν σε όλα τα μέσα αρμοδιότητας ΟΑΣΑ για 90 λεπτά από την επικύρωσή τους σε πύλη σταθμού του μετρό ή σε επικυρωτικό μηχάνημα στα λεωφορεία, τρόλλευ, τραμ.
Ισχύουν επίσης και στην ΤΡΑΙΝΟΣΕ (στο τμήμα του Προαστιακού Μαγούλα-Πειραιάς-Αεροδρόμιο). Εξαιρούνται μόνο οι λεωφορειακές γραμμές EXPRESS Αεροδρομίου και η γραμμή Χ80.
											</div>
										</div>
									</div>
									<!-- Single FAQ End -->
								</div>
							</div>
						</div>
                        <!-- Single FAQ Subject End -->
                        
                        <!-- Single FAQ Subject  Start -->
						<div class="single-faq-sub">
							<h3>Περιοχές που εξυπηρετεί ο ΟΑΣΑ</h3>
							<div class="single-faq-sub-content">
								<div id="accordion_2">
									<!-- Single FAQ Start -->
									<div class="card">
										<div class="card-header" id="heading9">
											<h5 class="mb-0"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
												<span>Περιοχή Ευθύνης</span>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
											</button></h5>
										</div>

										<div id="collapse9" class="collapse" aria-labelledby="heading9" data-parent="#accordion_2">
											<div class="card-body">
												Η περιοχή που εξυπηρετείται σήμερα από αστική συγκοινωνία εκτείνεται Δυτικά μέχρι την Ελευσίνα, Μάνδρα και Μαγούλα (Θριάσιο Πεδίο). Ανατολικά μέχρι την Πεντέλη, την Παλλήνη, τα Σπάτα, τη Λούτσα και το Κορωπί (περιοχή Μεσογείων). Βόρεια μέχρι τη Φυλή, τη Πάρνηθα, το Κρυονέρι, το φράγμα της Λίμνης του Μαραθώνα, το Διόνυσο, τη Σταμάτα και τη Νέα και την Παλαιά Πεντέλη. Νότια μέχρι τη θάλασσα και νοτιοανατολικά μέχρι και την Σαρωνίδα. Η περιοχή αυτή περιλαμβάνει ένα σύνολο 84 δήμων και κοινοτήτων/οικισμών,
											</div>
										</div>
									</div>
									<!-- Single FAQ End -->
									
									<!-- Single FAQ Start -->
									<div class="card">
										<div class="card-header" id="heading10">
											<h5 class="mb-0"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
									  			<span>Δήμοι και Κοινότητες</span>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
									  		</button></h5>
										</div>
										<div id="collapse10" class="collapse" aria-labelledby="heading10" data-parent="#accordion_2">
											<div class="card-body">
												Οι Δήμοι και Κοινότητες/Οικισμοί της Περιοχής Εξυπηρέτησης των Αστικών Συγκοινωνιών ομαδοποιούνται στους παρακάτω 10 Τομείς Αστικών Συγκοινωνιών, οι οποίοι χρησιμοποιούνται και για την αρίθμηση των κεντρικών, διαδημοτικών και τοπικών λεωφορειακών γραμμών.
												<br>
												<ul>
													<li>Τομέας 0: Αθήνα</li>
													<li>Τομέας 1: Νέα Σμύρνη, Παλαιό Φάληρο, Άλιμος, Ελληνικό, Γλυφάδα, Βούλα, Βουλιαγμένη, Βάρη</li>
													<li>Τομέας 2: Δάφνη, Άγιος Δημήτριος, Αργυρούπολη, Ηλιούπολη, Υμηττός, Βύρωνας, Καισαριανή, Ζωγράφου</li>
													<li>Τομέας 3: Γέρακας, Ανθούσα, Γλυκά Νερά, Παλλήνη, Σπάτα, Παιανία, Κορωπί, Αρτέμιδα, Σαρωνίδα</li>
												</ul>
											</div>
										</div>
									</div>
									<!-- Single FAQ Start -->
								</div>
							</div>
						</div>
						<!-- Single FAQ Subject End -->
					</div>
				</div>
                <!-- FAQ Content End -->

                <!-- Sidebar Area Start -->
                <div class="col-lg-4">
                    <div class="sidebar-content-wrap m-t-50">
                        <!-- Single Sidebar Start -->
                        <div class="single-sidebar">
                            <h3>Για περισσότερες πληροφορίες</h3>

                            <div class="sidebar-body">
                                <p><i class="fa fa-mobile"></i> 210 82 00 999</p>
                                <p><i class="fa fa-mobile"></i> 11 185</p>
                                <p><i class="fa fa-clock-o"></i> Δευ - Κυρ 8.00 - 18.00</p>
                            </div>
                        </div>
                        <!-- Single Sidebar End -->
                    </div>
                </div>
                <!-- Sidebar Area End -->
            </div>
        </div>
    </section>
    <!--== FAQ Area End ==-->

    <?php
        include(dirname(__FILE__)."/footer.php");
    ?>
</body>

<script src="../javascript/jquery.min.js"></script>
<script src="../javascript/bootstrap.min.js"></script>
<script src="../javascript/modal.js"></script>

</html>