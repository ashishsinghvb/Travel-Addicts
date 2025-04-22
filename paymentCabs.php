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
	
		<title>Payment</title>
    
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
			$fare=$_POST["fareHidden"];
		
			// add conditions for buses, trains, cabs here
		
		?>
		
		<div class="spacer">a</div>
		
		<div class="col-sm-12 paymentWrapper">
			
			<div class="headingOne">
				
				Payment
				
			</div>
			
			<div class="totalAmount">
				
				Amount to be paid: <span class="sansSerif">₹</span> <?php echo $fare; ?>
				
			</div>
			
			<!--<div class="col-sm-3"></div>-->
				
				
			<div class="col-sm-3"></div>
			
			<div class="col-sm-6">
				
				<div class="boxCenter">
				
				<div class="col-sm-12 tag">
					
					Card Number:
					
				</div>
				
				<div class="col-sm-12">
					
					<input type="text" class="input" name="cardNumber" placeholder="Enter the card number" />
					
				</div>
				
				<div class="col-sm-12 tag">
					
					Name on Card:
					
				</div>
				
				<div class="col-sm-12">
					
					<input type="text" class="input" name="nameOnCard" placeholder="Enter the name of the card holder" />
					
				</div>
				
				<div class="col-sm-6 tag">
					
					CVV:
					
				</div>
				
				<div class="col-sm-6 tag">
					
					Expiry:
					
				</div>
				
				<div class="col-sm-6">
					
					<input type="password" class="inputSmall" name="cvv" placeholder="CVV" />
					
				</div>
				
				<div class="col-sm-6">
					
					<input type="text" class="inputSmall" name="expiry" placeholder="MM/YY" />
					
				</div>
				
				<!-- cabs -->
				
				<?php if($mode=="cabs"): ?>
				
				<form action="searchCabs.php" method="POST">
				
					<div class="col-sm-12 bookingButton text-center">
						<input type="submit" class="paymentButton" value="Pay Now">
					</div>
					
					<input type="hidden" name="fareHidden" value="<?php echo $fare; ?>">
					
					<?php
					
						$_SESSION["cabsFare"]=$fare;
					
					?>
					
				</form>
				
				<?php endif; ?>
				
				
				</div>
				
			</div>
			
			<div class="col-sm-3"></div>
			
		</div> <!-- paymentWrapper -->
	
	<div class="spacerLarge">.</div> <!-- just a dummy class for creating some space -->
			
		<?php include("common/footer.php"); ?>
				
	</body>
	
	<!-- BODY TAG ENDS -->
	
</html>