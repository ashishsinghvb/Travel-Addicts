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
	
		<title>Receipt</title>
    
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
		
			/*$getBookedSeatsOutboundSQL = "SELECT noOfBookings FROM `flights` WHERE flight_no='$flightNoOutbound'";
			$getBookedSeatsOutboundQuery = $conn->query($getBookedSeatsOutboundSQL);
			$bookedSeatsOutboundGet = $getBookedSeatsOutboundQuery ->fetch_array(MYSQLI_NUM);*/
		
		?>
		
		<div class="col-sm-12 generateReceipt">
		
			<div class="commonHeader">
				
				<div class="col-sm-1"></div>
				
				<div class="col-sm-7 text-left">
					
					<div class="headingOne">
						
						Rider Receipt
						
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
				
				<div class="col-sm-12"></div> <!-- empty class -->
			
				<div class="col-sm-1"></div>
				
				<div class="col-sm-10">
			
					<div class="subHeading">
						
						Booking Information:
						
					</div>
				
				</div>
							
				<div class="col-sm-12"></div> <!-- empty class -->
			
				<div class="col-sm-1"></div>
				
				<div class="col-sm-10 boxCenter"> <!-- outboundFlight Box -->
				
					<?php
					
						/*$type = $_SESSION["carTypeCabs"];
					
						$sql = "SELECT * FROM cabdrivers WHERE carType='$type'";
						$result = $conn->query($sql);
						$row = $result->fetch_assoc()*/
					
						$originCabs=$_SESSION["originCabs"];
						$destinationCabs=$_SESSION["destinationCabs"];
					
						$cabSQL = "SELECT * FROM `cabs` WHERE origin='$originCabs' AND destination='$destinationCabs'";
						$cabQuery = $conn->query($cabSQL);
						$rowCab = $cabQuery->fetch_assoc();
					
					
					?>
					
					<div class="col-sm-2 borderRight text-center">
					
						<div class="flightOperatorHeading">
						
							Origin
							
						</div>
						
						<div class="flightOperator">
						
							<?php echo $_SESSION["originCabs"]; ?>
							
						</div>
						
						<div class="flightNo">
						
							<?php echo $rowCab["originCode"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 borderRight text-center">
					
						<div class="flightOperatorHeading">
						
							Destination
							
						</div>
						
						<div class="flightOperator">
						
							<?php echo $_SESSION["destinationCabs"]; ?>
							
						</div>
						
						<div class="flightNo">
						
							<?php echo $rowCab["destinationCode"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 borderRight text-center">
					
						<div class="flightOperatorHeading">
						
							Pickup
							
						</div>
						
						<div class="flightOperator">
						
							<?php echo $_SESSION["dateCabs"]; ?>
							
						</div>
						
						<div class="flightNo">
						
							<?php echo $_SESSION["timeCabs"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<?php
					
						$carID=$_SESSION["carID"];
						$sql = "SELECT * FROM `cabdrivers` WHERE `carID`='$carID'";
						$result = $conn->query($sql);
						$row = $result->fetch_assoc();
					?>
					
					<div class="col-sm-2 borderRight text-center">
					
						<div class="flightOperatorHeading">
						
							Car
							
						</div>
						
						<div class="flightOperator">
						
							<?php echo $row["carModel"]; ?>
							
						</div>
						
						<div class="flightNo">
						
							<?php echo $row["carNo"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 borderRight text-center">
					
						<div class="departsHeading">
						
							Driver
							
						</div>
						
						<div class="departs">
						
							<?php echo $row["driverName"]; ?>
							
						</div>
						
						<div class="departsSubscript">
						
							<?php echo $row["driverPhone"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 text-center">
					
						<div class="arrivesHeading">
						
							Journey
							
						</div>
						
						<div class="arrives">
						
							<?php echo $rowCab["distance"]." km"; ?>
							
						</div>
						
						<div class="arrivesSubscript">
						
							<?php echo $rowCab["time"]." mins"; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
				</div> <!-- outboundFlight Box -->
			
				<div class="col-sm-12 spacer">a</div>
				
				<div class="col-sm-1"></div>
				
				<div class="col-sm-10">
			
					<div class="subHeading">
						
						Payment Information
						
					</div>
				
				</div>
							
				<div class="col-sm-12"></div> <!-- empty class -->
				
				<div class="col-sm-1"></div>
				
				<div class="col-sm-12"></div> <!-- empty class -->
				
				<div class="col-sm-1"></div>
			
					<div class="col-sm-10 boxCenter">
					
						<div class="columnHeaders">
							
							<div class="col-sm-3 borderBottom">
								
								<div class="serialNoHeader text-center">
									
									Distance charge
									
								</div>
								
							</div>
							
							<div class="col-sm-3 borderBottom">
								
								<div class="passengerNameHeader text-center">
									
									Time charge
									
								</div>
								
							</div>
							
							<div class="col-sm-3 borderBottom">
								
								<div class="passengerNameHeader text-center">
									
									Convenience charge
									
								</div>
								
							</div>
							
							<div class="col-sm-3 borderBottom">
								
								<div class="genderHeader text-center">
									
									Total fare
									
								</div>
								
							</div>
							
						</div> <!-- columnHeaders -->
						
						<div class="col-sm-3">
								
							<div class="serialNo text-center">
								
								<?php $carType = $_SESSION["carTypeCabs"]; ?>
								
								<?php if($carType=="Hatchback"): ?>
								
								<span class="rupee">₹</span><?php echo $rowCab["distance"]." x 5.5"." = ";?>
								<span class="rupee">₹</span><?php echo $distFare = $rowCab["distance"]*5.5; ?>
								
								<?php elseif($carType=="Sedan"): ?>
								
								<span class="rupee">₹</span><?php echo $rowCab["distance"]." x 8.75"." = ";?>
								<span class="rupee">₹</span><?php echo $distFare = $rowCab["distance"]*8.75; ?>
								
								<?php elseif($carType=="SUV"): ?>
								
								<span class="rupee">₹</span><?php echo $rowCab["distance"]." x 13.25"." = ";?>
								<span class="rupee">₹</span><?php echo $distFare = $rowCab["distance"]*13.25; ?>
								
								<?php endif; ?>
								
							</div>
								
						</div>
						
						<div class="col-sm-3">
								
							<div class="serialNo text-center">
								
								<?php if($carType=="Hatchback"): ?>
								
								<span class="rupee">₹</span><?php echo $rowCab["time"]." x 1.25"." = ";?>
								<span class="rupee">₹</span><?php echo $timeFare = $rowCab["time"]*1.25; ?>
								
								<?php elseif($carType=="Sedan"): ?>
								
								<span class="rupee">₹</span><?php echo $rowCab["time"]." x 2"." = ";?>
								<span class="rupee">₹</span><?php echo $timeFare = $rowCab["time"]*2; ?>
								
								<?php elseif($carType=="SUV"): ?>
								
								<span class="rupee">₹</span><?php echo $rowCab["time"]." x 3.75"." = ";?>
								<span class="rupee">₹</span><?php echo $timeFare = $rowCab["time"]*3.75; ?>
								
								<?php endif; ?>
								
							</div>
								
						</div>
						
						<div class="col-sm-3">
								
							<div class="serialNo text-center">
								
								<span class="rupee">₹</span>250
								
							</div>
								
						</div>
						
						<div class="col-sm-3">
								
							<div class="serialNo text-center">
								
								<span class="rupee">₹</span><?php echo $distFare+$timeFare+250 ?>
								
							</div>
								
						</div>	
						
					</div> <!-- boxCenter -->
				
				<div class="col-sm-1"></div>
			
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
						
						<span class="strong">1.</span> A printed copy of this receipt must be presented to the driver at the time of pickup.						
						
					</div>
					
					<div class="info">
						
						<span class="strong">2.</span> You are advised to carry a Government recognised photo identification (ID) during your journey. This can include: Driving License, Passport, PAN Card, Voter ID Card or any other ID issued by the Government of India.
						
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
	$dateFormatted = date("d-m-Y"); //formatting the date as DD-MM-YY
	//$hotelName = $row["hotelName"].', '.$row["locality"].', '.$row["city"];'
	$origin = $_SESSION["originCabs"];
	$destination = $_SESSION["destinationCabs"];
	$carID = $row["carID"];
	$bookingDataInsertSQL = "INSERT INTO `cabbookings`(username,date,cancelled,origin,destination,carID) VALUES('$user','$dateFormatted','no','$origin','$destination','$carID')";
	$bookingDataInsertQuery = $conn->query($bookingDataInsertSQL);
				
	$bookingIDSQL = "SELECT * FROM `cabbookings` ORDER BY `bookingID` DESC LIMIT 1";
	$bookingIDQuery = $conn->query($bookingIDSQL);
	$bookingIDGet = $bookingIDQuery ->fetch_array(MYSQLI_NUM);
	$latestBookingID = $bookingIDGet[0];
	$currentBookingID = $latestBookingID;
								
?>
		
<!-- saving the file as temp.html -->
<?php
file_put_contents('cabReceipts\cabReceipt'.$currentBookingID.'.html', ob_get_contents());
?>