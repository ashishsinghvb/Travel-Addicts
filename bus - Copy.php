<?php session_start();
if(!isset($_SESSION["username"]))
{
    	header("Location:blockedBooking.php");
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
	
		<title>Bus | Project Meteor</title>
    
    	<link href="css/main.css" rel="stylesheet">
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link href="css/bootstrap-select.css" rel="stylesheet">
		<link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400|Raleway:100,300,400,500|Roboto:100,400,500,700" rel="stylesheet">
    	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    	<script src="js/jquery-3.2.1.min.js"></script>
    	<script src="js/main.js"></script>
    	<script src="js/bootstrap.min.js"></script>
    	<script src="js/bootstrap-select.js"></script>
    	<script src="js/bootstrap-dropdown.js"></script>
    	<script src="js/jquery-2.1.1.min.js"></script>
    	<script src="js/moment-with-locales.js"></script>
    	<script src="js/bootstrap-datetimepicker.js"></script>
		<script type="text/javascript">
		
			$(function () {
				
                $('#datetimepicker4').datetimepicker({
					format: 'L',
		   			locale: 'en-gb'
				});
            });
		
		</script>
    	
	</head>
	
	<!-- HEAD TAG ENDS -->
	
	<!-- BODY TAG STARTS -->
	
	<body>
	
		<div class="container-fluid">
		
			<div class="bus col-sm-12">
			
			<!-- HEADER SECTION STARTS -->
				
				<div class="col-sm-12">
					
					<div class="header">
					
						<?php include("common/headerTransparentLoggedIn.php"); ?>
					
						<div class="col-sm-12">
						
						<div class="menu text-center">
							
							<ul>
								<a href="hotels.php"><li>Hotels</li></a>
								<a href="flights.php"><li>Flights</li></a>
								<a href="trains.php"><li>Trains</li></a>
								<li class="selected">Buses</li>
								<a href="cabs.php"><li>Cabs</li></a>
							</ul>
							
						</div>
						
					</div>
					
					</div> <!-- header -->
				
				</div> <!-- col-sm-12 -->
				
			<!-- HEADER SECTION ENDS -->
				
				
				
			<!-- TRAIN SEARCH SECTION STARTS -->
				
				<div class="col-sm-12">
					
					<div class="search">
   					
    					<div class="content">
    					
    					<form action="busSearch.php" method="POST">
    					
    						<div class="col-sm-6">			
   							<div class="form-group">
   								 <label for="originBus">Origin:<p> </p></label>
     
      								<select id= "originBus"  data-live-search="true" class="selectpicker form-control" data-size="5" title="Select Origin City" name="originCity" required>
       									<option value="Guwahati" data-tokens="GHY Guwahati">Guwahati</option>
        								<option value="Aizwal" data-tokens="AIZ Aizwal">Aizwal</option>
        								<option value="Imphal" data-tokens="IMP Imphal">Imphal</option>
        								<option value="Kohima" data-tokens="KOH Kohima">Kohima</option>
        								<option value="Shillong" data-tokens="SHL Shillong">Shillong</option>
        								<option value="Agartala" data-tokens="AGR Agartala">Agartala</option>
        								<option value="Itanagar" data-tokens="ITN Itanagar">Itanagar</option>
      								</select>
							</div>
            			</div>
            			
            				<div class="col-sm-6">			
   							<div class="form-group">
   								 <label for="destinationBus">Destination:<p> </p></label>
     
      								<select id= "destinationBus"  data-live-search="true" class="selectpicker form-control" data-size="5" title="Select Destination City" name="destinationCity" required>
       									<option value="Guwahati" data-tokens="GHY Guwahati">Guwahati</option>
        								<option value="Aizwal" data-tokens="AIZ Aizwal">Aizwal</option>
        								<option value="Imphal" data-tokens="IMP Imphal">Imphal</option>
        								<option value="Kohima" data-tokens="KOH Kohima">Kohima</option>
        								<option value="Shillong" data-tokens="SHL Shillong">Shillong</option>
        								<option value="Agartala" data-tokens="AGR Agartala">Agartala</option>
        								<option value="Itanagar" data-tokens="ITN Itanagar">Itanagar</option>
      								</select>
							</div>
            			</div>
            			
            				<div class="col-sm-6">
        						<div class="form-group">
     								<label for="datetime4">Select Date:<p> </p></label>
            						<div class="input-group date" id="datetimepicker4">
                						<input id="datetime4" type="text" class="inputDate form-control" placeholder="Select Date" name="dateBus" required/>
                						<span class="input-group-addon">
                   						<span class="fa fa-calendar"></span>
                						</span>
            						</div>
        						</div>
    						</div>
    						
							<div class="col-sm-6">
	
							<label for="passengers">No. of passengers:<p> </p></label>
    							<div class="form-group">
    								<select id= "adults" class="selectpicker form-control" data-size="5" title="Select no. of passengers" name="passengersBus" required>
  										<option value="1">1</option>
  										<option value="2">2</option>
  										<option value="3">3</option>
  										<option value="4">4</option>
  										<option value="5">5</option>
  										<option value="6">6</option>
									</select>
								</div>
							</div>
           				
            				<div class="col-sm-12 text-center">
            			
            					<input type="submit" class="button" name="searchBuses" value="Search Buses">
            				
            				</div>

            			</form>
            			
    					</div> <!-- content -->
    					
					</div> <!-- search -->
					
				</div>
			
			<!-- TRAIN SEARCH SECTION ENDS -->
				
			</div> <!-- trains -->	
			
			
			
			<!-- POPULAR BUS SECTION STARTS -->
			
				<!-- <div class="col-sm-12"> -->
					
					<div class="popularBus col-sm-12">
					
						<div class="heading">
						
								Popular Buses
						
						</div>
						
						<div class="bg">
						
							<!-- replace listItems below by PHP loops -->
						
							<div class="listItem">
													
								<!-- OPERATOR STARTS -->

								<div class="col-sm-4 text-center">
	
									<div class="headings">
		
										Operator
			
									</div>
		
									<div class="values origin">
		
										Agarwal Travels
			
									</div>
		
									<div class="originSubscript">
		
										A/C Volvo 2+2 Seater
			
									</div>
		
								</div>
	
								<!-- OPERATOR ENDS -->
	
	
								<!-- ORIGIN STARTS -->

								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Origin
			
									</div>
		
									<div class="values origin">
		
										New Delhi
			
									</div>
		
									<div class="originSubscript">
		
										Kashmiri Gate
			
									</div>
		
								</div>
	
									<!-- ORIGIN ENDS -->
	
	
									<!-- DESTINATION STARTS -->
	
								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Destination
			
									</div>
		
									<div class="values destination">
		
										Shimla
			
									</div>
		
									<div class="destinationSubscript">
		
										Tutikandi
			
									</div>
		
								</div>
	
									<!-- DESTINATION ENDS -->
	
	
									<!-- SEATS STARTS -->

								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Seats
			
									</div>
		
									<div class="values seats">
		
										28 seats
			
									</div>
		
									<div class="seatsSubscript">
		
										12 windows
			
									</div>
		
								</div>
	
									<!-- SEATS ENDS -->
	
	
									<!-- FARE STARTS -->
	
								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Fare
			
									</div>
		
									<div class="values fare">
		
										980
			
									</div>
		
									<div class="fareSubscript">
		
										incl. of GST
			
									</div>
		
								</div>
	
									<!-- FARE ENDS -->
									
							</div> <!-- listItem 1 -->
							
							<div class="listItem">
													
								<!-- OPERATOR STARTS -->

								<div class="col-sm-4 text-center">
	
									<div class="headings">
		
										Operator
			
									</div>
		
									<div class="values origin">
		
										VRL Travels
			
									</div>
		
									<div class="originSubscript">
		
										A/C Volvo 2+1 Seater/Sleeper
			
									</div>
		
								</div>
	
								<!-- OPERATOR ENDS -->
	
	
								<!-- ORIGIN STARTS -->

								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Origin
			
									</div>
		
									<div class="values origin">
		
										Mumbai
			
									</div>
		
									<div class="originSubscript">
		
										Borivali
			
									</div>
		
								</div>
	
									<!-- ORIGIN ENDS -->
	
	
									<!-- DESTINATION STARTS -->
	
								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Destination
			
									</div>
		
									<div class="values destination">
		
										Goa
			
									</div>
		
									<div class="destinationSubscript">
		
										Panjim
			
									</div>
		
								</div>
	
									<!-- DESTINATION ENDS -->
	
	
									<!-- SEATS STARTS -->

								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Seats
			
									</div>
		
									<div class="values seats">
		
										38 seats
			
									</div>
		
									<div class="seatsSubscript">
		
										26 windows
			
									</div>
		
								</div>
	
									<!-- SEATS ENDS -->
	
	
									<!-- FARE STARTS -->
	
								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Fare
			
									</div>
		
									<div class="values fare">
		
										1150
			
									</div>
		
									<div class="fareSubscript">
		
										incl. of GST
			
									</div>
		
								</div>
	
									<!-- FARE ENDS -->
									
							</div> <!-- listItem 2 -->
							
							<div class="listItem">
													
								<!-- OPERATOR STARTS -->

								<div class="col-sm-4 text-center">
	
									<div class="headings">
		
										Operator
			
									</div>
		
									<div class="values origin">
		
										Rajasthan State TC
			
									</div>
		
									<div class="originSubscript">
		
										A/C Volvo 2+2 Seater
			
									</div>
		
								</div>
	
								<!-- OPERATOR ENDS -->
	
	
								<!-- ORIGIN STARTS -->

								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Origin
			
									</div>
		
									<div class="values origin">
		
										Jaipur
			
									</div>
		
									<div class="originSubscript">
		
										Sindi Camp
			
									</div>
		
								</div>
	
									<!-- ORIGIN ENDS -->
	
	
									<!-- DESTINATION STARTS -->
	
								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Destination
			
									</div>
		
									<div class="values destination">
		
										New Delhi
			
									</div>
		
									<div class="destinationSubscript">
		
										Bikaner House
			
									</div>
		
								</div>
	
									<!-- DESTINATION ENDS -->
	
	
									<!-- SEATS STARTS -->

								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Seats
			
									</div>
		
									<div class="values seats">
		
										39 seats
			
									</div>
		
									<div class="seatsSubscript">
		
										19 windows
			
									</div>
		
								</div>
	
									<!-- SEATS ENDS -->
	
	
									<!-- FARE STARTS -->
	
								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Fare
			
									</div>
		
									<div class="values fare">
		
										860
			
									</div>
		
									<div class="fareSubscript">
		
										incl. of GST
			
									</div>
		
								</div>
	
									<!-- FARE ENDS -->
									
							</div> <!-- listItem 3 -->
							
						</div> <!-- bg -->
						
					</div> <!-- popularBus -->
					
				<!-- </div> -->
				
			<!-- POPULAR BUS SECTION ENDS -->
			
			
			
			<!-- FOOTER SECTION STARTS -->
					
				<div class="footer col-sm-12">
					
					<div class="col-sm-4">
						
						<div class="footerHeading">
							Contact Us
						</div>
							
						<div class="footerText">
							1, Imaginary Road <br> Unknown City- 000000
						</div>
				
						<div class="footerText">
							E-mail: user@site.domain
						</div>
						
					</div>
					
					<div class="col-sm-4">
					
						<div class="footerHeading">
							Made with
						</div>
						
						<div class="fa fa-heart"></div>
						
						<div class="footerHeading">
							in India
						</div>
						
						<div class="flagContainer text-center">
							<img src="images/flag.png">
						</div>
						
					</div>
					
					<div class="col-sm-4">
					
						<div class="footerHeading">
							Social Links
						</div>
						
						<div class="socialLinks">
						
							<div class="fb">
								facebook.com/xyz
							</div>
						
							<div class="gp">
								plus.google.com/xyz
							</div>
						
							<div class="tw">
								twitter.com/xyz
							</div>
						
							<div class="in">
								linkedin.com/xyz
							</div>
						
						</div> <!-- social links -->
						
					</div>
						
					<div class="col-sm-12">
					<div class="copyrightContainer">
						<div class="copyright">
						Copyright &copy; 2017 Joydeep Dev Nath.
						</div>
					</div>
					</div>
							
				</div> <!-- footer -->
				
			<!-- FOOTER SECTION ENDS -->
			
			
		
		</div> <!-- container-fluid -->
	
	</body>
	
	<!-- BODY TAG ENDS -->
	
</html>