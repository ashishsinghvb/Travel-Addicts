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
	
		<title>Dashboard</title>
    
    	<link href="css/main.css" rel="stylesheet">
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link href="css/bootstrap-select.css" rel="stylesheet">
		<link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400|Raleway:100,300,400,500|Roboto:100,400,500,700" rel="stylesheet">
    	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    	<script src="js/jquery-3.2.1.min.js"></script>
    	<script src="js/userDashboard.js"></script>
    	<script src="js/bootstrap.min.js"></script>
    	<script src="js/bootstrap-select.js"></script>
    	<script src="js/bootstrap-dropdown.js"></script>
    	<script src="js/jquery-2.1.1.min.js"></script>
    	<script src="js/moment-with-locales.js"></script>
    	<script src="js/bootstrap-datetimepicker.js"></script>
    		
	</head>
	
	<!-- HEAD TAG ENDS -->
	
	<!-- BODY TAG STARTS -->
	
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
	
	<body>
	
		<div class="container-fluid">
		
			<div class="col-sm-12 userDashboard text-center">
			
			<?php include("common/headerDashboardTransparentLoggedIn.php"); ?>
			
			<div class="col-sm-12">
					
				<div class="heading text-center">
					My Dashboard
				</div>
						
			</div>
			
			<div class="col-sm-1"></div>
			
			<div class="col-sm-3 containerBoxLeft">
				
				<a href="userDashboardProfile.php">
				<div class="col-sm-12 menuContainer bottomBorder">
					<span class="fa fa-user-o"></span> My Profile
				</div>
				</a>
				
				<a href="userDashboardBookings.php">
				<div class="col-sm-12 menuContainer bottomBorder">
					<span class="fa fa-copy"></span> My Bookings
				</div>
				</a>
				
				<a href="userDashboardETickets.php">
				<div class="col-sm-12 menuContainer bottomBorder">
					<span class="fa fa-clone"></span> My E-Tickets
				</div>
				</a>
				
				<div class="col-sm-12 menuContainer bottomBorder active">
					<span class="fa fa-close"></span> Cancel Ticket
				</div>
				
				<a href="userDashboardAccountSettings.php">
				<div class="col-sm-12 menuContainer noBottomBorder">
					<span class="fa fa-bar-chart"></span> Account Stats
				</div>
				</a>
				
			</div>
			
			<div class="col-sm-7 containerBoxRight">
				
				<?php 
				
					$user = $_SESSION["username"];
					
					$flightBookingsSQL = "SELECT COUNT(*) FROM `flightbookings` WHERE Username='$user' AND cancelled='no'";
					$flightBookingsQuery = $conn->query($flightBookingsSQL);
					$noOfFlightBookings = $flightBookingsQuery->fetch_array(MYSQLI_NUM);
				
					$cabBookingsSQL = "SELECT COUNT(*) FROM `cabbookings` WHERE Username='$user' AND cancelled='no'";
					$cabBookingsQuery = $conn->query($cabBookingsSQL);
					$noOfCabBookings = $cabBookingsQuery->fetch_array(MYSQLI_NUM);
				
					$busBookingsSQL = "SELECT COUNT(*) FROM `busbookings` WHERE Username='$user' AND cancelled='no'";
					$busBookingsQuery = $conn->query($busBookingsSQL);
					$noOfBusBookings = $busBookingsQuery->fetch_array(MYSQLI_NUM);
				
					$trainBookingsSQL = "SELECT COUNT(*) FROM `trainbookings` WHERE Username='$user' AND cancelled='no'";
					$trainBookingsQuery = $conn->query($trainBookingsSQL);
					$noOfTrainBookings = $trainBookingsQuery->fetch_array(MYSQLI_NUM);
				
				?>
				
				<div class="col-sm-12 tickets">
				
					<div class="col-sm-6 ticketsWrapper topMargin">
						
						<div class="tagLeft">Select the type of ticket: </div>
						
					</div>
					
					<div class="col-sm-6 topMargin pullLeft">
					
					<select class="input" name="ticketTypeSelector" id="ticketTypeSelector"/>
						
						<option value="flightTickets">Flight Tickets</option>
						<option value="trainTickets">Train Tickets</option> <!-- change echo -->
						<option value="busTickets">Bus Tickets</option> <!-- change echo -->
						<option value="cabTickets">Cab Tickets</option> <!-- change echo -->
						
					</select>
					
					</div>
					
					<?php if($noOfFlightBookings[0]>0): ?>
					
					
					<!-------------------------------------------------------------------------------------------------
					
					
													FLIGHT TICKETS SECTION STARTS
													
													
					--------------------------------------------------------------------------------------------------->
				
				<div class="col-sm-12 ticketTableContainer pullABitLeft" id="flightTicketsWrapper">
					
						<table class="table table-responsive">
							<thead>
								<tr>
									<th class="tableHeaderTags text-center" style="vertical-align: middle;">Id</th>
									<th class="tableHeaderTags text-center" style="vertical-align: middle;">Origin</th>
									<th class="tableHeaderTags text-center" style="vertical-align: middle;">Destination</th>
									<th class="tableHeaderTags text-center" style="vertical-align: middle;">Date</th>
									<th class="tableHeaderTags text-center" style="vertical-align: middle;">Type</th>
									<th class="tableHeaderTags text-center" style="vertical-align: middle;">Ticket</th>
								</tr>
							</thead>
							
							<?php
	
								$flightTicketsSQL = "SELECT * FROM `flightbookings` WHERE username='$user' AND cancelled='no'";
								$flightTicketsQuery = $conn->query($flightTicketsSQL);
				
								while($flightTicketsRow = $flightTicketsQuery->fetch_assoc()) { 
									
									$modeDB=$flightTicketsRow["type"];
									
									if($modeDB=="OneWayFlight") {
										$modePrint="One Way";
									}
									else if($modeDB=="ReturnTripFlight") {
										$modePrint="Return Trip";
									}
									
								?>
								
								<tr>
									<td class="tableElementTagsNoHover text-center"><?php echo $flightTicketsRow["bookingID"]; ?></td>
									<td class="tableElementTagsNoHover text-center"><?php echo $flightTicketsRow["origin"]; ?></td>
									<td class="tableElementTagsNoHover text-center"><?php echo $flightTicketsRow["destination"]; ?></td>
									<td class="tableElementTagsNoHover text-center"><?php echo $flightTicketsRow["date"]; ?></td>
									<td class="tableElementTagsNoHover text-center"><?php echo $modePrint; ?></td>
									<td class="text-center"><span class="fa fa-remove tableElementTags pullSpan cancelTicket"></span></td>
								</tr>
								
							<?php } ?>
					
						</table>
						
				</div>
				
				<?php else: ?>
				
				<div class="col-sm-12 ticketTableContainer" id="flightTicketsWrapper">
				
					<div class="noBooking">
					
						Looks like you haven't booked any flight with us yet. This area will list all your flight bookings once you start booking flights.
					
					</div>
				
				</div>
				
				<?php endif; ?>
				
				
				
				<!-------------------------------------------------------------------------------------------------
					
					
													FLIGHT TICKETS SECTION ENDS
													
													
				--------------------------------------------------------------------------------------------------->
				
				
				<?php if($noOfTrainBookings[0]>0): ?>
					
					
					<!-------------------------------------------------------------------------------------------------
					
					
													TRAIN TICKETS SECTION STARTS
													
													
					--------------------------------------------------------------------------------------------------->
				
				<div class="col-sm-12 ticketTableContainer pullABitLeft" id="trainTicketsWrapper">
					
						<table class="table table-responsive">
							<thead>
								<tr>
									<th class="tableHeaderTags text-center" style="vertical-align: middle;">Id</th>
									<th class="tableHeaderTags text-center" style="vertical-align: middle;">Origin</th>
									<th class="tableHeaderTags text-center" style="vertical-align: middle;">Destination</th>
									<th class="tableHeaderTags text-center" style="vertical-align: middle;">Date</th>
									<th class="tableHeaderTags text-center" style="vertical-align: middle;">Ticket</th>
								</tr>
							</thead>
							
							<?php
	
								$trainTicketsSQL = "SELECT * FROM `trainbookings` WHERE username='$user' AND cancelled='no'";
								$trainTicketsQuery = $conn->query($trainTicketsSQL);
				
								while($trainTicketsRow = $trainTicketsQuery->fetch_assoc()) { 
									
								?>
								
								<tr>
									<td class="tableElementTagsNoHover text-center"><?php echo $trainTicketsRow["bookingID"]; ?></td>
									<td class="tableElementTagsNoHover text-center"><?php echo $trainTicketsRow["origin"]; ?></td>
									<td class="tableElementTagsNoHover text-center"><?php echo $trainTicketsRow["destination"]; ?></td>
									<td class="tableElementTagsNoHover text-center"><?php echo $trainTicketsRow["date"]; ?></td>
									<td class="text-center"><span class="fa fa-remove tableElementTags pullSpan cancelTrainTicket"></span></td>
								</tr>
								
							<?php } ?>
					
						</table>
						
				</div>
				
				<?php else: ?>
				
				<div class="col-sm-12 ticketTableContainer" id="trainTicketsWrapper">
				
					<div class="noBooking">
					
						Looks like you haven't booked any train with us yet. This area will list all your train bookings once you start booking trains.
					
					</div>
				
				</div>
				
				<?php endif; ?>
				
				
				
				<!-------------------------------------------------------------------------------------------------
					
					
													TRAIN TICKETS SECTION ENDS
													
													
				--------------------------------------------------------------------------------------------------->
				
				
				<?php if($noOfBusBookings[0]>0): ?>
					
					
					<!-------------------------------------------------------------------------------------------------
					
					
													BUS TICKETS SECTION STARTS
													
													
					--------------------------------------------------------------------------------------------------->
				
				<div class="col-sm-12 ticketTableContainer pullABitLeft" id="busTicketsWrapper">
					
						<table class="table table-responsive">
							<thead>
								<tr>
									<th class="tableHeaderTags text-center" style="vertical-align: middle;">Id</th>
									<th class="tableHeaderTags text-center" style="vertical-align: middle;">Origin</th>
									<th class="tableHeaderTags text-center" style="vertical-align: middle;">Destination</th>
									<th class="tableHeaderTags text-center" style="vertical-align: middle;">Date</th>
									<th class="tableHeaderTags text-center" style="vertical-align: middle;">Ticket</th>
								</tr>
							</thead>
							
							<?php
	
								$busTicketsSQL = "SELECT * FROM `busbookings` WHERE username='$user' AND cancelled='no'";
								$busTicketsQuery = $conn->query($busTicketsSQL);
				
								while($busTicketsRow = $busTicketsQuery->fetch_assoc()) { 
									
								?>
								
								<tr>
									<td class="tableElementTagsNoHover text-center"><?php echo $busTicketsRow["bookingID"]; ?></td>
									<td class="tableElementTagsNoHover text-center"><?php echo $busTicketsRow["origin"]; ?></td>
									<td class="tableElementTagsNoHover text-center"><?php echo $busTicketsRow["destination"]; ?></td>
									<td class="tableElementTagsNoHover text-center"><?php echo $busTicketsRow["date"]; ?></td>
									<td class="text-center"><span class="fa fa-remove tableElementTags pullSpan cancelBusTicket"></span></td>
								</tr>
								
							<?php } ?>
					
						</table>
						
				</div>
				
				<?php else: ?>
				
				<div class="col-sm-12 ticketTableContainer" id="busTicketsWrapper">
				
					<div class="noBooking">
					
						Looks like you haven't booked any bus with us yet. This area will list all your bus bookings once you start booking buses.
					
					</div>
				
				</div>
				
				<?php endif; ?>
				
				
				
				<!-------------------------------------------------------------------------------------------------
					
					
													BUS TICKETS SECTION ENDS
													
													
				--------------------------------------------------------------------------------------------------->
				
				
				<!-------------------------------------------------------------------------------------------------
				
				
												CAB TICKETS SECTION STARTS
												
												
				--------------------------------------------------------------------------------------------------->
				
				<?php if($noOfCabBookings[0]>0): ?>
				
				<div class="col-sm-12 ticketTableContainer pullABitLeft" id="cabTicketsWrapper">
					
						<table class="table table-responsive">
							<thead>
								<tr>
									<th class="tableHeaderTags text-center" style="vertical-align: middle;">Id</th>
									<th class="tableHeaderTags text-center" style="vertical-align: middle;">Origin</th>
									<th class="tableHeaderTags text-center" style="vertical-align: middle;">Destination</th>
									<th class="tableHeaderTags text-center" style="vertical-align: middle;">Date</th>
									<th class="tableHeaderTags text-center" style="vertical-align: middle;">Receipt</th>
								</tr>
							</thead>
							
							<?php
	
								$cabTicketsSQL = "SELECT * FROM `cabbookings` WHERE username='$user' AND cancelled='no'";
								$cabTicketsQuery = $conn->query($cabTicketsSQL);
				
								while($cabTicketsRow = $cabTicketsQuery->fetch_assoc()) { 
									
								?>
								
								<tr>
									<td class="tableElementTagsNoHover text-center"><?php echo $cabTicketsRow["bookingID"]; ?></td>
									<td class="tableElementTagsNoHover text-center"><?php echo $cabTicketsRow["origin"]; ?></td>
									<td class="tableElementTagsNoHover text-center"><?php echo $cabTicketsRow["destination"]; ?></td>
									<td class="tableElementTagsNoHover text-center"><?php echo $cabTicketsRow["date"]; ?></td>
									<td class="text-center"><span class="fa fa-remove tableElementTags pullSpan cancelCabTicket"></span></td>
								</tr>
								
							<?php } ?>
					
						</table>
						
				</div>
				
				<?php else: ?>
				
				<div class="col-sm-12 ticketTableContainer" id="cabTicketsWrapper">
				
					<div class="noBooking">
					
						Looks like you haven't booked any cab with us yet. This area will list all your cab bookings once you start booking cabs.
					
					</div>
				
				</div>
				
				<?php endif; ?>
				
				<!-------------------------------------------------------------------------------------------------
				
				
												CAB TICKETS SECTION ENDS
												
												
				--------------------------------------------------------------------------------------------------->
			
				</div>
				
			</div>
			
			<div class="col-sm-1"></div>
			
			<div class="col-sm-12 spacer">a</div>
			<div class="col-sm-12 spacer">a</div>
			
			</div>
		
		</div> <!-- container-fluid -->
		
		<?php include("common/footer.php"); ?>
		
	</body>
	

	<!-- BODY TAG ENDS -->
	
</html>
	