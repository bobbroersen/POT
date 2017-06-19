<?php include('header.php'); ?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Placeholder</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="/css/factuur.css" rel="stylesheet" type="text/css">
	    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>	
	</head>
	<body style="margin-top: 200px!important;">

<?php
$startdatum = htmlspecialchars($_GET['startdatum']);
$einddatum = htmlspecialchars($_GET['einddatum']);
$huisID = htmlspecialchars($_GET['huisID']);
$klantVnaam = $_SESSION['vnaam'];
$klantAnaam = $_SESSION['anaam'];
$klantEmail = $_SESSION['email'];
$klantWoonplaats = $_SESSION['woonplaats'];
$klantAdres = $_SESSION['adres'];
$klantTel = $_SESSION['tel'];
$klantPostcode = $_SESSION['postcode'];
$klantLand = $_SESSION['land'];
//$aantalNachten = abs(strtotime($einddatum) - strtotime($startdatum));
$date1 = new DateTime($startdatum);
$date2 = new DateTime($einddatum);
$interval = $date1->diff($date2);
$aantaldagen = $interval->days;


	$result_huis = mysqli_query($conn,"SELECT huis_ID, huis_oppervlakte, huis_prijs, huis_parkeren, park_park_ID, huis_idhuis_type, huis_image FROM huis WHERE huis_ID = ". $huisID);
	$row_huis  = mysqli_fetch_array($result_huis);

$totaal = $aantaldagen * $row_huis['huis_prijs'];
?>
		<section id="main">
			<div class="container">
				<div class="row">
					<div class="col-xs-offset-2 col-xs-8">
						<div class="row">
							<div class="col-xs-6">
								<div class="row">
									<div class="col-xs-6">
										<p>placeholder img</p>
										<ul class="typless">
											<li>Naam: <?php
											echo $klantVnaam . ' ' . $klantAnaam;
											?>
											</li>
											<li>Adres: <?php
											echo $klantAdres . ' ' . $klantPostcode;
											?>
											</li>
											<li>Plaats <?php
											echo $klantWoonplaats; 
											?>
											</li>
											<li>Tel:
											<?php echo $klantTel;
											?>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="row">
									<div class="col-xs-offset-8 col-xs-4">
										<ul class="typless bedrijfsinfo">
											<li>Hier</li>
											<li>Komen</li>
											<li>Gegevens</li>
											<li>Van</li>
											<li>Port</li>
											<li>Of</li>
											<li>Troy</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-offset-2 col-xs-10">
						<h1>Factuur</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-offset-2 col-xs-10">
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-xs-offset-2 col-xs-8 btb">
						<div class="row">
							<div class="col-xs-6">
								<div class="row">
									<div class="col-xs-6">
										Aantal nachten: <?php echo $aantaldagen;
										?>
									</div>
									<div class="col-xs-6">

										<?php echo 'HuisID:  ' . $huisID;
										?>
									</div>
								</div>
							</div>
							<div class="col-xs-6 text-right">
								<div class="row">
									<div class="col-xs-6">
										
										<?php echo 'Prijs per nacht: €' . $row_huis['huis_prijs']; ?>
									</div>
									<div class="col-xs-6 text-right">
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row mt-150">
					<div class="col-xs-offset-2 col-xs-8">
						<div class="row">
							<div class="col-xs-offset-8 col-xs-2">
								<p>Subtotaal: </p>
							</div>
							<div class="col-xs-2 text-right">
								<?php echo '€ ' . $totaal; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</section>
		<section id="footer">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-3 absolute">
						<p>Gemaakt door: Team First Class</p>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>
 