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
	
		<title>Driver Details</title>
    
    	<link href="css/main.css" rel="stylesheet">
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400|Raleway:100,300,400,500|Roboto:100,400,500,700" rel="stylesheet">
    	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    	<script src="js/jquery-3.2.1.min.js"></script>
    	<script src="js/hotelDetails.js"></script>
    	<script src="js/bootstrap.min.js"></script>
    	
	</head>
	
	<!-- HEAD TAG ENDS -->
	
	<!-- BODY TAG STARTS -->
	
	<body>
		
		<?php include("common/headerLoggedIn.php"); ?>
		
		<div class="spacer">a</div>
		<div class="spacer">a</div>
		
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
		
			$type = $_SESSION["carTypeCabs"];
		
			$sql = "SELECT * FROM `cabdrivers` WHERE `carType`='$type' ORDER BY RAND() LIMIT 1";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			
			$_SESSION["carID"]=$row["carID"];
			
		?>
		
		<div class="col-sm-2"></div> <!-- empty div -->
		
		<div class="col-sm-8 showDriverDetails">
		
			<div class="col-sm-12 listItem">
			
				<div class="col-sm-4 leftBox">
				
					<div class="col-sm-12 imageContainer">
						
						<img src="images/cabs/drivers/driverPlaceholder.jpg" alt="Image not found" />
						
					</div>
				
				</div>
				
				<div class="col-sm-8 rightBox borderLeft">
				
					<div class="hotelName col-sm-12 text-center noMargin">
						
						<?php echo $row["driverName"]; ?>
						
					</div>
					
					<div class="location col-sm-12 text-center">
						
						<?php echo $row["carModel"]; ?>
						
					</div>
				
					<div class="col-sm-2 text-center">
					
						<div class="col-sm-12 rating noMargin">
							
							<?php echo $row["driverRating"]; ?>
							
						</div>
						
						<div class="col-sm-12 ratingText noMargin">
							
							Rating
								
						</div>
					
					</div>
					
					<div class="col-sm-5 text-center">
					
						<div class="col-sm-12 car noMargin">
							
							<?php echo $row["carNo"]; ?>
							
						</div>
						
						<div class="col-sm-12 carText noMargin">
							
							Car No.
								
						</div>
					
					</div>
					
					<div class="col-sm-5 text-center">
					
						<div class="col-sm-12 contact noMargin">
							
							<?php echo $row["driverPhone"]; ?>
							
						</div>
						
						<div class="col-sm-12 contactText noMargin">
							
							Contact No.
								
						</div>
					
					</div>
					
					<!-- creating a form -->
					
					<form action="payment.php" method="POST">
					
						<div class="col-sm-12 text-center">
							
							<input type="submit" class="genReceipt" value="Proceed to Payment" /> 
				
						</div>
						
						<input type="hidden" name="modeHidden" value="cabs" />
					
					</form>
				
				</div> <!-- right box -->
		
			</div>
			
		</div>
		
		<div class="col-sm-1"></div> <!-- empty div -->
		
		<div class="col-sm-12 spacer">.</div> <!-- just a dummy class for creating some space -->
		<div class="col-sm-12 spacer">.</div> <!-- just a dummy class for creating some space -->
		<div class="col-sm-12 spacer">.</div> <!-- just a dummy class for creating some space -->
				
		<?php include("common/footer.php"); ?>
				
	</body>
	
	<!-- BODY TAG ENDS -->
	
</html>