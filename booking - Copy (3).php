<?php session_start();
if(!isset($_SESSION["username"]))
{
    	header("Location:blocked.php");
   		$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
}
?>

<!DOCTYPE html>

<html lang="en">
	
	<!-- HEAD TAG STARTS -->

	<head>
	
  		<meta charset="UTF-8">
  		<meta name="author" content="Joydeep Dev Nath">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="shortcut icon" href="images/favicon.ico">
	
		<title>Booking</title>
    
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
		
		<?php include("common/headerLoggedIn.php"); ?>
		
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
			
			<div class="col-sm-12 bookingOneWayFlight">
			
			<?php
				
				$outboundFlightSQL = "SELECT * FROM `flights` WHERE flight_no='$flightNoOutbound'";
				$outboundFlightQuery = $conn->query($outboundFlightSQL);
				$row = $outboundFlightQuery->fetch_assoc();
				//$outboundFlightFare = $outboundFlightQuery->fetch_array(MYSQLI_NUM);
				
			?>
				
				<div class="col-sm-7"> <!-- departure container -->
				
				<div class="col-sm-12">
				
					<div class="boxLeftOneWayFlight">
					
						<div class="col-sm-12 mode">Departure</div>
						
						<div class="col-sm-4">
						
						<div class="origin">Guwahati</div>
						<div class="departs">Departs <?php echo $depart; ?> at: <?php echo $row["departs"]; ?></div>
						
						</div>
						
						<div class="col-sm-4">
							
							<div class="arrow"></div>
							
						</div>
						
						<div class="col-sm-4">
						
						<div class="destination">Kolkata</div>
						<div class="arrives">Arrives <?php echo $depart; ?> at: <?php echo $row["arrives"]; ?></div>
						
						</div>
						
						<div class="col-sm-3 borderRight">
							<div class="operator"><?php echo $row["operator"]; ?></div>
							<div class="operatorSubscript">Operator</div>
						</div>
						
						<div class="col-sm-3 borderRight">
							<div class="class"><?php echo $className; ?></div>
							<div class="classSubscript">Class</div>
						</div>
						
						
						<div class="col-sm-3 borderRight">
							<div class="adults"><?php echo $adults; ?></div>
							<div class="adultsSubscript">Adults</div>
						</div>
						
						<div class="col-sm-3">
							<div class="children"><?php echo $children; ?></div>
							<div class="childrenSubscript">Children</div>
						</div>
					
					</div> <!-- boxLeft -->
				
				</div> <!-- col-sm-7 Departure -->
				
				</div>
				
				<div class="col-sm-5"> <!-- fare container -->
				
				<div class="col-sm-12">
				
					<div class="boxRightOneWayFlight">
					
					<div class="col-sm-12 fareSummary">Fare Summary</div>
						
					<div class="col-sm-8">
						<div class="heading"><?php echo $adults; ?> Adults</div>
						<div class="heading"><?php echo $children; ?> Children</div>
						<div class="heading">Convenience Fee</div>	
					</div>
					
					<div class="col-sm-4">
						<div class="price"><span class="sansSerif">₹ </span><?php echo $adults*$row["fare"]; ?></div>
						<div class="price"><span class="sansSerif">₹ </span><?php echo $children*$row["fare"]; ?></div>
						<div class="price"><span class="sansSerif">₹ </span>250</div>
					</div>	
					
					<div class="col-sm-12">
							
							<div class="calcBar"></div>
							
					</div>
					
					<div class="col-sm-8">
						<div class="headingTotal">Total Fare</div>
					</div>
					
					<div class="col-sm-4">
						<div class="priceTotal"><span class="sansSerif">₹ </span><?php echo ($adults*$row["fare"])+($children*$row["fare"])+250; ?></div>
					</div>
					
					<form action="passengers.php" method="POST">
					
						<div class="bookingButton text-center">
							<input type="submit" class="confirmButton" value="Confirm Booking">
						</div>
						
						<?php $totalFare = ($adults*$row["fare"])+($children*$row["fare"])+250 ?>
						
						<input type="hidden" name="fareHidden" value="<?php echo $totalFare; ?>">
						<input type="hidden" name="typeHidden" value="<?php echo $type; ?>">
						<input type="hidden" name="classHidden" value="<?php echo $class; ?>">
						<input type="hidden" name="originHidden" value="<?php echo $origin; ?>">
						<input type="hidden" name="destinationHidden" value="<?php echo $destination; ?>">
						<input type="hidden" name="departHidden" value="<?php echo $depart; ?>">
						<input type="hidden" name="returnHidden" value="<?php echo $return; ?>">
						<input type="hidden" name="adultsHidden" value="<?php echo $adults; ?>">
						<input type="hidden" name="childrenHidden" value="<?php echo $children; ?>">
						<input type="hidden" name="flightNoOutboundHidden" value="<?php echo $row["flight_no"]; ?>">
						<input type="hidden" name="modeHidden" value="<?php echo "OneWayFlight" ?>">
					
					</form>
					
				</div>
				
			</div> <!-- col-sm-5 Fare -->
			
				</div> <!-- fare container -->
				
			</div> <!-- bookingOneWayFlight -->
			
			<?php elseif($mode=="ReturnTripFlight"): ?>
			
			<div class="col-sm-12 bookingReturnTripFlight">
			
			<?php
				
				$outboundFlightSQL = "SELECT * FROM `flights` WHERE flight_no='$flightNoOutbound'";
				$outboundFlightQuery = $conn->query($outboundFlightSQL);
				$rowOutbound = $outboundFlightQuery->fetch_assoc();
				
				$inboundFlightSQL = "SELECT * FROM `flights` WHERE flight_no='$flightNoInbound'";
				$inboundFlightQuery = $conn->query($inboundFlightSQL);
				$rowInbound = $inboundFlightQuery->fetch_assoc();
				
			?>
			
				<div class="col-sm-7"> <!-- departure return container -->
			
				<div class="col-sm-12">
				
					<div class="boxLeftOneWayFlight">
					
						<div class="col-sm-12 mode">Departure</div>
						
						<div class="col-sm-4">
						
						<div class="origin"><?php echo $rowOutbound["origin"]; ?></div>
						<div class="departs">Departs <?php echo $depart; ?> at: <?php echo $rowOutbound["departs"]; ?></div>
						
						</div>
						
						<div class="col-sm-4">
							
							<div class="arrow"></div>
							
						</div>
						
						<div class="col-sm-4">
						
						<div class="destination"><?php echo $rowOutbound["destination"]; ?></div>
						<div class="arrives">Arrives <?php echo $depart; ?> at: <?php echo $rowOutbound["arrives"]; ?></div>
						
						</div>
						
						<div class="col-sm-3 borderRight">
							<div class="operator"><?php echo $rowOutbound["operator"]; ?></div>
							<div class="operatorSubscript">Operator</div>
						</div>
						
						<div class="col-sm-3 borderRight">
							<div class="class"><?php echo $className; ?></div>
							<div class="classSubscript">Class</div>
						</div>
						
						
						<div class="col-sm-3 borderRight">
							<div class="adults"><?php echo $adults; ?></div>
							<div class="adultsSubscript">Adults</div>
						</div>
						
						<div class="col-sm-3">
							<div class="children"><?php echo $children; ?></div>
							<div class="childrenSubscript">Children</div>
						</div>
					
					</div> <!-- boxLeft -->
				
				</div> <!-- col-sm-7 Departure -->
					
				<div class="col-sm-12">
					
						<div class="boxLeftOneWayFlight">
						
							<div class="col-sm-12 mode">Return</div>
							
							<div class="col-sm-4">
							
							<div class="origin"><?php echo $rowInbound["origin"]; ?></div>
							<div class="departs">Departs <?php echo $return; ?> at: <?php echo $rowInbound["departs"]; ?></div>
							
							</div>
							
							<div class="col-sm-4">
								
								<div class="arrow"></div>
								
							</div>
							
							<div class="col-sm-4">
							
							<div class="destination"><?php echo $rowInbound["destination"]; ?></div>
							<div class="arrives">Arrives <?php echo $return; ?> at: <?php echo $rowInbound["arrives"]; ?></div>
							
							</div>
							
							<div class="col-sm-3 borderRight">
								<div class="operator"><?php echo $rowInbound["operator"]; ?></div>
								<div class="operatorSubscript">Operator</div>
							</div>
							
							<div class="col-sm-3 borderRight">
								<div class="class"><?php echo $className; ?></div>
								<div class="classSubscript">Class</div>
							</div>
							
							
							<div class="col-sm-3 borderRight">
								<div class="adults"><?php echo $adults; ?></div>
								<div class="adultsSubscript">Adults</div>
							</div>
							
							<div class="col-sm-3">
								<div class="children"><?php echo $children; ?></div>
								<div class="childrenSubscript">Children</div>
							</div>
						
						</div> <!-- boxLeft -->
					
					</div> <!-- col-sm-7 Return -->
					
				</div> <!-- departure return container -->
					
				<div class="col-sm-5"> <!-- fare container -->
				
				<div class="col-sm-12">
				
					<div class="boxRightOneWayFlight">
					
					<div class="col-sm-12 fareSummary">Fare Summary</div>
						
					<div class="col-sm-8">
						<div class="heading"><?php echo $adults; ?> Adults</div>
						<div class="heading"><?php echo $children; ?> Children</div>
						<div class="heading">Convenience Fee</div>	
					</div>
					
					<div class="col-sm-4">
						<div class="price"><span class="sansSerif">₹ </span><?php echo $adults*($rowOutbound["fare"]+$rowInbound["fare"]); ?></div>
						<div class="price"><span class="sansSerif">₹ </span><?php echo $children*($rowOutbound["fare"]+$rowInbound["fare"]); ?></div>
						<div class="price"><span class="sansSerif">₹ </span>250</div>
					</div>	
					
					<div class="col-sm-12">
							
							<div class="calcBar"></div>
							
					</div>
					
					<div class="col-sm-8">
						<div class="headingTotal">Total Fare</div>
					</div>
					
					<div class="col-sm-4">
						<div class="priceTotal"><span class="sansSerif">₹ </span><?php echo ($adults*($rowOutbound["fare"]+$rowInbound["fare"]))+($children*($rowOutbound["fare"]+$rowInbound["fare"]))+250; ?></div> <!-- CHANGE -->
					</div>
					
					<form action="passengers.php" method="POST">
					
						<div class="bookingButton text-center">
							<input type="submit" class="confirmButton" value="Confirm Booking">
						</div>
						
						<?php $totalFare = ($adults*($rowOutbound["fare"]+$rowInbound["fare"]))+($children*($rowOutbound["fare"]+$rowInbound["fare"]))+250 ?>
						<!-- CHANGE -->
						
						<input type="hidden" name="fareHidden" value="<?php echo $totalFare; ?>">
						<input type="hidden" name="typeHidden" value="<?php echo $type; ?>">
						<input type="hidden" name="classHidden" value="<?php echo $class; ?>">
						<input type="hidden" name="originHidden" value="<?php echo $origin; ?>">
						<input type="hidden" name="destinationHidden" value="<?php echo $destination; ?>">
						<input type="hidden" name="departHidden" value="<?php echo $depart; ?>">
						<input type="hidden" name="returnHidden" value="<?php echo $return; ?>">
						<input type="hidden" name="adultsHidden" value="<?php echo $adults; ?>">
						<input type="hidden" name="childrenHidden" value="<?php echo $children; ?>">
						<input type="hidden" name="flightNoOutboundHidden" value="<?php echo $rowOutbound["flight_no"]; ?>">
						<input type="hidden" name="flightNoInboundHidden" value="<?php echo $rowInbound["flight_no"]; ?>">
						<input type="hidden" name="modeHidden" value="<?php echo "ReturnTripFlight" ?>">
					
					</form>
					
				</div>
				
			</div> <!-- col-sm-5 Fare -->
			
				</div> <!-- fare return container -->
				
			</div> <!-- bookingReturnTripFlight -->
			
			<?php else: ?> <!-- change to elseif and add other modes -->
			
			<div class="headingOne">
				
				None
				
				<!--------------------------------------------------------------------------------------------
				
				
				
												ADD BUSES, CABS, TRAINS HERE
												
								
								
				--------------------------------------------------------------------------------------------->
				
			</div>
			
			<?php endif; ?>
			
		</div> <!--bookingWrapper -->
		
	<div class="spacerLarge">.</div> <!-- just a dummy class for creating some space -->
			
		<?php include("common/footer.php"); ?>
				
	</body>
	
	<!-- BODY TAG ENDS -->
	
</html>