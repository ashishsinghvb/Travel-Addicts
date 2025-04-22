<!-- include session code here -->

<!DOCTYPE html>

<html lang="en">
	
	<!-- HEAD TAG STARTS -->

	<head>
	
  		<meta charset="UTF-8">
  		<meta name="author" content="Joydeep Dev Nath">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="shortcut icon" href="images/favicon.ico">
	
		<title>Booking </title>
    
    	<link href="css/main.css" rel="stylesheet">
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400|Raleway:100,300,400,500|Roboto:100,400,500,700" rel="stylesheet">
    	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    	<script src="js/jquery-3.2.1.min.js"></script>
    	<script src="js/main.js"></script>
    	<script src="js/bootstrap.min.js"></script>
    	
	</head>
	
	<!-- HEAD TAG ENDS -->
	
	<!-- BODY TAG STARTS -->
	
	<body>
		
		<?php include("common/header.php"); ?>
		
		
		<?php
		
			$mode=$_POST["modeHidden"];
			$type=$_POST["typeHidden"];
			$class=$_POST["classHidden"];
			$origin=$_POST["originHidden"];
			$destination=$_POST["destinationHidden"];
			$depart=$_POST["departHidden"];
			$return=$_POST["returnHidden"];
			$adults=$_POST["adultsHidden"];
			$children=$_POST["childrenHidden"];
			$noOfPassengers=(int)$adults+(int)$children;
		
			if($type=="Return Trip") {
				$flightNoOutbound=$_POST["flightNoOutboundHidden"];
				$flightNoInbound=$_POST["flightNoInboundHidden"];
			}
			elseif($type=="One Way") {
				$flightNoOutbound=$_POST["flightNoOutboundHidden"];
			}
		
			if($class=="Economy Class")
				$className="Economy";
			else
				$className="Business";
		
		?>
		
		<?php
		
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "projectmeteor";
			
			// Creating a connection to projectmeteor MySQL database
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			// Checking if we've successfully connected to the database
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
		
		?>
		
		<div class="spacer">a</div>
		
		<div class="bookingWrapper">
			
			<div class="headingOne">
				
				Please review and confirm your booking
				
			</div>
			
			<!-- changing contents of the page based on mode -->
			
			<?php if($mode=="OneWayFlight"): ?>
			
			<div class=bookingOneWayFlight>
			
			<?php
				
				$outboundFlightSQL = "SELECT * FROM `flights` WHERE flight_no='$flightNoOutbound'";
				$outboundFlightQuery = $conn->query($outboundFlightSQL);
				//$outboundFlightFare = $outboundFlightQuery->fetch_array(MYSQLI_NUM);
				
			?>
				
				
				<div class="col-sm-7">
				
					<div class="boxLeftOneWayFlight">
					
						<div class="col-sm-12 mode">Departure</div>
						
						<div class="col-sm-4">
						
						<div class="origin">Guwahati</div>
						<div class="departs">Departs at: <?php echo $outboundFlightQuery["departs"]; ?></div>
						
						</div>
						
						<div class="col-sm-4">
							
							<div class="arrow"></div>
							
						</div>
						
						<div class="col-sm-4">
						
						<div class="destination">Kolkata</div>
						<div class="arrives">Arrives at: 12:00</div>
						
						</div>
						
						<div class="col-sm-3 borderRight">
							<div class="adults"><?php echo $adults; ?></div>
							<div class="adultsSubscript">No. of adults</div>
						</div>
						
						<div class="col-sm-3 borderRight">
							<div class="adults"><?php echo $children; ?></div>
							<div class="adultsSubscript">No. of children</div>
						</div>
						
						<div class="col-sm-3 borderRight">
							<div class="adults"><?php echo $class; ?></div>
							<div class="adultsSubscript">Class</div>
						</div>
						
						<div class="col-sm-3">
							<div class="adults">Refundable</div>
							<div class="adultsSubscript">Ticket Type</div>
						</div>
						
					
					</div> <!-- boxLeft -->
				
				</div>
				
				<div class="col-sm-5">
				
					<div class="boxRightOneWayFlight">
					
					<div class="col-sm-12 pricing">Pricing</div>
						
					<div class=""
						
						
					</div>	
					
				</div>
				
			</div> <!-- bookingOneWayFlight -->
			
			<?php elseif($mode=="ReturnTripFlight"): ?>
			
			<div class="headingOne">
			
			<?php
				
				$outboundFlightSQL = "SELECT fare FROM `flights` WHERE flight_no='$flightNoOutbound'";
				$outboundFlightQuery = $conn->query($outboundFlightSQL);
				$outboundFlightFare = $outboundFlightQuery->fetch_array(MYSQLI_NUM);
				
				$inboundFlightSQL = "SELECT fare FROM `flights` WHERE flight_no='$flightNoInbound'";
				$inboundFlightQuery = $conn->query($inboundFlightSQL);
				$inboundFlightFare = $inboundFlightQuery->fetch_array(MYSQLI_NUM);
				
			?>
				
				Return Adults: <?php echo $adults; ?> Children: <?php echo $children; ?> Outbound Flight: <?php echo $flightNoOutbound; ?> Inbound Flight: <?php echo $flightNoInbound; ?> Outbound Fare: <?php echo $outboundFlightFare[0]; ?> Inbound Fare: <?php echo $inboundFlightFare[0]; ?>
				
			</div>
			
			<?php else: ?> <!-- add buses, cabs, trains here -->
			
			<div class="headingOne">
				
				None
				
			</div>
			
			<?php endif; ?>
			
		</div> <!--bookingWrapper -->
		
	<div class="spacerLarge">.</div> <!-- just a dummy class for creating some space -->
			
		<?php include("common/footer.php"); ?>
				
	</body>
	
	<!-- BODY TAG ENDS -->
	
</html>