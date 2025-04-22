<?php session_start();
if(!isset($_SESSION["username"]))
{
    	header("Location:blocked.php");
   		$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
}
?>

<!-- dumping the current page to buffer -->
<?php
ob_start();
?>

<!DOCTYPE html>

<html lang="en">
	
	<!-- HEAD TAG STARTS -->

	<head>
	
  		<meta charset="UTF-8">
  		<meta name="author" content="Joydeep Dev Nath">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="shortcut icon" href="images/favicon.ico">
	
		<title>E-Ticket</title>
    
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
		
		<div class="spacer">a</div>
		
		<?php 
		
		date_default_timezone_set("Asia/Kolkata");
		$date=date('l jS \of F Y \a\t h:i:s A');
		
		$datePass=$_POST["dateHidden"];
		
		$totalPassengers=$_POST["totalPassengersHidden"];
		$busID=$_POST["busIDHidden"];
	
		for($i=1; $i<=$totalPassengers; $i++) {
			$name[$i]=$_POST["nameHidden$i"];
			$gender[$i]=$_POST["genderHidden$i"];
		}
		
		$mode=$_POST["modeHidden"];
		$fare=$_POST["fareHidden"];
		$origin=$_POST["originHidden"];
		$destination=$_POST["destinationHidden"];
		$depart=$_POST["departHidden"];
		$return=$_POST["returnHidden"];
	
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

			if($mode=="bus"){
				
				$getBookedSeatsOutboundSQL = "SELECT noOfBookings FROM `bus` WHERE busID='$busID'";
				$getBookedSeatsOutboundQuery = $conn->query($getBookedSeatsOutboundSQL);
				$bookedSeatsOutboundGet = $getBookedSeatsOutboundQuery ->fetch_array(MYSQLI_NUM);
			
				$bookedSeatsOutbound = $bookedSeatsOutboundGet[0];
				$newBookedSeats = $bookedSeatsOutbound+$totalPassengers;
				
				//updating the no. of bookings
				$outboundBookingUpdateSQL = "UPDATE `bus` SET noOfBookings='$newBookedSeats' WHERE busID='$busID'";
				$outboundBookingUpdateQuery = $conn->query($outboundBookingUpdateSQL);
				
				$getSeatsAvailableOutboundSQL = "SELECT seatsAvailable FROM `bus` WHERE busID='$busID'";
				$getSeatsAvailableOutboundQuery = $conn->query($getSeatsAvailableOutboundSQL);
				$SeatsAvailableOutboundGet = $getSeatsAvailableOutboundQuery ->fetch_array(MYSQLI_NUM);
			
				$seatsAvailableOutbound = $SeatsAvailableOutboundGet[0];
				$newseatsAvailable = $seatsAvailableOutbound-$totalPassengers;
				
				//updating the no. of seats available
				$outboundSeatUpdateSQL = "UPDATE `bus` SET seatsAvailable='$newseatsAvailable' WHERE busID='$busID'";
				$outboundSeatUpdateQuery = $conn->query($outboundSeatUpdateSQL);
	
			}
		
			//add other modes here
		
		?>
		
		<div class="col-sm-12 generateTicket">
		
			<div class="commonHeader">
				
				<div class="col-sm-1"></div>
				
				<div class="col-sm-7 text-left">
					
					<div class="headingOne">
						
						E-Ticket
						
					</div>
					
					<div class="dateTime">
						
						<span class="generated">Generated: </span><?php echo $date; ?>
						
					</div>
					
				</div>
				
				<div class="col-sm-3 text-right">
					
					<a href="./"><img src="images/logo.png" alt="Project Meteor Logo" /></a>
					
				</div>
				
				<div class="col-sm-1"></div>
				
				<div class="col-sm-12"></div>
				
				<div class="col-sm-1"></div>
				<div class="col-sm-10 bar"></div>
				<div class="col-sm-1"></div>
					
			</div> <!-- contains the header and logo -->
			
			<!-- changing contents of the page based on mode -->
				
				<div class="col-sm-12"></div> <!-- empty class -->
			
				<div class="col-sm-1"></div>
				
				<div class="col-sm-10">
			
					<div class="subHeading">
						
						Bus Details
						
					</div>
				
				</div>
							
				<div class="col-sm-12"></div> <!-- empty class -->
			
				<div class="col-sm-1"></div>
				
				<div class="col-sm-10 boxCenter"> <!-- outboundFlight Box -->
				
					<?php
				
					$outboundFlightSQL = "SELECT * FROM `bus` WHERE busID='$busID'";
					$outboundFlightQuery = $conn->query($outboundFlightSQL);
					$row = $outboundFlightQuery->fetch_assoc();
					
					?>
				
					<div class="col-sm-4 borderRight text-center">
					
						<div class="flightOperatorHeading">
						
							Operator
							
						</div>
						
						<div class="flightOperator">
						
							<?php echo $row["operator"]; ?>
							
						</div>
						
						<div class="flightNo">
						
							<?php echo $row["type"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 borderRight text-center">
					
						<div class="originHeading">
						
							Origin
							
						</div>
						
						<div class="origin">
						
							<?php echo $origin; ?>
							
						</div>
						
						<div class="originSubscript">
						
							<?php echo $row["originArea"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 borderRight text-center">
					
						<div class="destinationHeading">
						
							Destination
							
						</div>
						
						<div class="origin">
						
							<?php echo $destination; ?>
							
						</div>
						
						<div class="destinationSubscript">
						
							<?php echo $row["destinationArea"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 borderRight text-center">
					
						<div class="departsHeading">
						
							Departure
							
						</div>
						
						<div class="departs">
						
							<?php echo $datePass; ?>
							
						</div>
						
						<div class="departsSubscript">
						
							<?php echo $row["departure"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 text-center">
					
						<div class="arrivesHeading">
						
							Arrival
							
						</div>
						
						<div class="arrives">
						
							<?php echo $datePass; ?>
							
						</div>
						
						<div class="arrivesSubscript">
						
							<?php echo $row["arrival"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
				</div> <!-- outboundFlight Box -->
			
				<div class="col-sm-12 spacer">a</div>
				
				<div class="col-sm-1"></div>
				
				<div class="col-sm-10">
			
					<div class="subHeading">
						
						Passenger Details
						
					</div>
				
				</div>
							
				<div class="col-sm-12"></div> <!-- empty class -->
				
				<div class="col-sm-1"></div>
				
				<div class="col-sm-12"></div> <!-- empty class -->
				
				<div class="col-sm-1"></div>
			
					<div class="col-sm-10 boxCenter">
					
						<div class="columnHeaders">
							
							<div class="col-sm-2 borderBottom">
								
								<div class="serialNoHeader text-center">
									
									Sl. No.
									
								</div>
								
							</div>
							
							<div class="col-sm-7 borderBottom">
								
								<div class="passengerNameHeader text-center">
									
									Name of the passenger
									
								</div>
								
							</div>
							
							<div class="col-sm-3 borderBottom">
								
								<div class="genderHeader text-center">
									
									Gender
									
								</div>
								
							</div>
							
						</div> <!-- columnHeaders -->
						
						<?php for($i=1; $i<=$totalPassengers; $i++) {?>
						
						<div class="col-sm-2">
								
								<div class="serialNo text-center">
									
									<?php echo $i; ?>
									
								</div>
								
							</div>
							
							<div class="col-sm-7">
								
								<div class="passengerName text-center">
									
									<?php echo $name[$i]; ?>
									
								</div>
								
							</div>
							
							<div class="col-sm-3">
								
								<div class="gender text-center">
									
									<?php echo $gender[$i]; ?>
									
								</div>
								
							</div>
							
							<?php } ?>		
						
					</div> <!-- boxCenter -->
			
			<div class="importantInfo">
			
				<div class="col-sm-12"></div> <!-- empty class -->
				
				<div class="col-sm-12 spacer">a</div>
				<div class="col-sm-12 spacer">a</div>
				
				<div class="col-sm-1"></div>
				
					<div class="col-sm-10">
				
						<div class="subHeading">
							
							Important Information
							
						</div>
					
					</div>
						
				<div class="col-sm-1"></div>
					
				<div class="col-sm-12"></div>
						
				<div class="col-sm-1"></div>
				<div class="col-sm-10 bar"></div>
				<div class="col-sm-1"></div>
				
				<div class="col-sm-12"></div>
				
				<div class="col-sm-1"></div>
				
				<div class="col-sm-10">
					
					<div class="info">
						
						<span class="strong">1.</span> A printed copy of this E-ticket must be presented at the time of check-in.						
						
					</div>
					
					<div class="info">
						
						<span class="strong">2.</span> Check-in starts 2 hours before scheduled departure and closes 45 minutes prior to the departure time. We recommend you report at the check-in counter at least 2 hours prior to the departure time.
						
					</div>
					
					<div class="info">
						
						<span class="strong">3.</span> It is mandatory to carry Government recognised photo identification (ID) along with your E-Ticket. This can include: Driving License, Passport, PAN Card, Voter ID Card or any other ID issued by the Government of India. For infant passengers, it is mandatory to carry the Date of Birth certificate.
						
					</div>
					
				</div>
				
				<div class="col-sm-1"></div>
							
				<div class="col-sm-12 spacer">a</div>
								
				<div class="col-sm-12"></div> <!-- empty class -->
				
			</div> <!-- importantInfo -->
			
			
			
		</div> <!-- generateTicket -->
				
		<div class="spacer">a</div>
					
	</body>
	
	<!-- BODY TAG ENDS -->
	
</html>

<!-- after user login system is built push the username usign the curent session to the database -->
<?php

	$user = $_SESSION["username"];
	$dateFormatted=date("d-m-Y"); //formatting the date as DD-MM-YY
	$bookingDataInsertSQL = "INSERT INTO `busbookings`(username,date,cancelled,origin,destination,passengers) VALUES('$user','$dateFormatted','no','$origin','$destination','$totalPassengers')";
	$bookingDataInsertQuery = $conn->query($bookingDataInsertSQL);
				
	$bookingIDSQL = "SELECT * FROM `busbookings` ORDER BY `bookingID` DESC LIMIT 1";
	$bookingIDQuery = $conn->query($bookingIDSQL);
	$bookingIDGet = $bookingIDQuery ->fetch_array(MYSQLI_NUM);
	$latestBookingID = $bookingIDGet[0];
	$currentBookingID = $latestBookingID;

?>
		
<!-- saving the file as temp.html -->
<?php
file_put_contents('tickets\busTicket'.$currentBookingID.'.html', ob_get_contents());
?>