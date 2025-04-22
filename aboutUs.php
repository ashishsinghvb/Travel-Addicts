<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en">
	
	<!-- HEAD TAG STARTS -->

	<head>
	
  		<meta charset="UTF-8">
  		<meta name="author" content="Joydeep Dev Nath">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="shortcut icon" href="images/favicon.ico">
	
		<title>About Us | Travel Addicts</title>
    
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
		
		<?php 
		
			if(!isset($_SESSION["username"])) {
				include("common/headerLoggedOut.php");
			}
			else {
				include("common/headerLoggedIn.php");
			}
		
		?>
		
		<div class="spacer">a</div>
		
		<div class="col-sm-12 aboutUsWrapper">
			
			<div class="headingOne">
				
				About Us
				
			</div>
			
			<div class="para">
				
			We Are A Leading Online Travel Company In India Providing A 'Best In Class' Customer Experience With The Goal To Be 'India's Travel Planner'. Through Our Website, Www.Traveladdicts.Com, Our Mobile Applications And Our Other Associated Platforms, Leisure And Business Travelers Can Explore, Research, Compare Prices And Book A Wide Range Of Services Catering To Their Travel Needs.
		Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit architecto quas repellat optio ipsum, harum possimus. Officiis aut unde itaque! Hic, eum optio quia cupiditate omnis alias nobis obcaecati perferendis.	
		</div>
			
		</div> <!-- paymentWrapper -->
	
	<div class="spacerLarge">.</div> <!-- just a dummy class for creating some space -->
			
		<?php include("common/footer.php"); ?>
				
	</body>
	
	<!-- BODY TAG ENDS -->
	
</html>