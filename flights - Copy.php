<!DOCTYPE html>

<html lang="en">
	
	<!-- HEAD TAG STARTS -->

	<head>
	
  		<meta charset="UTF-8">
  		<meta name="author" content="Joydeep Dev Nath">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="shortcut icon" href="images/favicon.ico">
	
		<title>Flights</title>
    
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
       				$('#datetimepicker1').datetimepicker({
		   			format: 'L',
		   			locale: 'en-gb'
	   				});
				
        			$('#datetimepicker2').datetimepicker({
            		useCurrent: false,
					format: 'L',
					locale: 'en-gb'
					});
				
					$("#datetimepicker1").on("dp.change", function (e) {
            		$('#datetimepicker2').data("DateTimePicker").minDate(e.date);
        			});
				
        			$("#datetimepicker2").on("dp.change", function (e) {
            		$('#datetimepicker1').data("DateTimePicker").maxDate(e.date);
        			});
    		});
			
		</script>
    	
	</head>
	
	<!-- HEAD TAG ENDS -->
	
	<!-- BODY TAG STARTS -->
	
	<body>
	
		<div class="container-fluid">
		
			<div class="flights col-sm-12">
			
			<!-- HEADER SECTION STARTS -->
				
				<div class="col-sm-12">
					
					<div class="header">
					
						<div class="col-sm-4">
					
						<div class="logo"></div>
						
					</div>
					
						<div class="col-sm-8">
					
						<div class="headerMenu">
							
							<ul>
								<li>Home</li>
								<li>About Us</li>
								<a href="login.php"><li>Login</li></a>
								<li>Contact Us</li>
							</ul>
							
						</div>
					</div>
					
						<div class="col-sm-12">
						
						<div class="menu text-center">
							
							<ul>
								<a href="hotels.php"><li>Hotels</li></a>
								<li class="selected">Flights</li>
								<a href="trains.php"><li>Trains</li></a>
								<a href="bus.php"><li>Buses</li></a>
								<a href="cabs.php"><li>Cabs</li></a>
							</ul>
							
						</div>
						
					</div>
					
					</div> <!-- header -->
				
				</div> <!-- col-sm-12 -->
				
			<!-- HEADER SECTION ENDS -->
				
				
				
			<!-- FLIGHT SEARCH SECTION STARTS -->
				
				<div class="col-sm-12">
					
					<div class="search">
   					
    					<div class="content">
    					
    					<form name="flightSearch" action="returnTripOutboundFlightSearch.php" method="POST">
    					
    						<div class="radioContainer">
    					
    							<div class="col-sm-6 text-left">
    							
    								<input type="radio" name="flightType" value="One Way" id="oneWay">
    								<label for="oneWay"><span class="radioLeft">One Way</span></label>
 						
  									<input type="radio" name="flightType" value="Return Trip" id="returnTrip" checked>
    								<label for="returnTrip"><span class="radioLeft">Return Trip</span></label>
    							
    							</div>
    						
    							<div class="col-sm-6 text-right">
    							
    								<input type="radio" name="flightClass" value="Business Class" id="businessClass">
    								<label for="businessClass"><span class="radioRight">Business Class</span></label>
 									
  									<input type="radio" name="flightClass" value="Economy Class" id="economyClass" checked>
    								<label for="economyClass"><span class="radioRight">Economy Class</span></label>
    							
    							</div>
    						
							</div> <!-- radioContainer -->
    					
    						<div class="col-sm-6">			
   							<div class="form-group">
   								 <label for="origin">Origin:<p> </p></label>
     
      								<select id= "origin"  data-live-search="true" class="selectpicker form-control" data-size="5" title="Select Origin" name="origin">
       									<option value="New Delhi" data-subtext="DEL" data-tokens="DEL New Delhi">New Delhi</option>
        								<option value="Mumbai" data-subtext="BOM" data-tokens="BOM Mumbai">Mumbai</option>
        								<option value="Kolkata" data-subtext="CCU" data-tokens="CCU Kolkata">Kolkata</option>
        								<option value="Bangalore" data-subtext="BLR" data-tokens="BLR Bangalore">Bangalore</option>
        								<option value="Chennai" data-subtext="MAA" data-tokens="MAA Chennai">Chennai</option>
        								<option value="Pune" data-subtext="PNQ" data-tokens="PNQ Pune">Pune</option>
        								<option value="Goa" data-subtext="GOI" data-tokens="GOI Goa">Goa</option>
        								<option value="Guwahati" data-subtext="GAU" data-tokens="GAU Guwahati">Guwahati</option>
        								<option value="Gandhinagar" data-subtext="ISK" data-tokens="ISK Gandhinagar">Gandhinagar</option>
        								<option value="Jammu" data-subtext="IXJ" data-tokens="IXJ Jammu">Jammu</option>
        								<option value="Bhopal" data-subtext="BHO" data-tokens="BHI Bhopal">Bhopal</option>
        								<option value="Agartala" data-subtext="IXA" data-tokens="IXA Agartala">Agartala</option>
      								</select>
							</div>
            			</div>
            			
            				<div class="col-sm-6">			
   							<div class="form-group">
   								 <label for="destination">Destination:<p> </p></label>
     
      								<select id= "destination"  data-live-search="true" class="selectpicker form-control" data-size="5" title="Select Destination" name="destination">
       									<option value="New Delhi" data-subtext="DEL" data-tokens="DEL New Delhi">New Delhi</option>
        								<option value="Mumbai" data-subtext="BOM" data-tokens="BOM Mumbai">Mumbai</option>
        								<option value="Kolkata" data-subtext="CCU" data-tokens="CCU Kolkata">Kolkata</option>
        								<option value="Bangalore" data-subtext="BLR" data-tokens="BLR Bangalore">Bangalore</option>
        								<option value="Chennai" data-subtext="MAA" data-tokens="MAA Chennai">Chennai</option>
        								<option value="Pune" data-subtext="PNQ" data-tokens="PNQ Pune">Pune</option>
        								<option value="Goa" data-subtext="GOI" data-tokens="GOI Goa">Goa</option>
        								<option value="Guwahati" data-subtext="GAU" data-tokens="GAU Guwahati">Guwahati</option>
        								<option value="Gandhinagar" data-subtext="ISK" data-tokens="ISK Gandhinagar">Gandhinagar</option>
        								<option value="Jammu" data-subtext="IXJ" data-tokens="IXJ Jammu">Jammu</option>
        								<option value="Bhopal" data-subtext="BHO" data-tokens="BHI Bhopal">Bhopal</option>
        								<option value="Agartala" data-subtext="IXA" data-tokens="IXA Agartala">Agartala</option>
      								</select>
							</div>
            			</div>
            			
            				<div class="col-sm-3">
        						<div class="form-group">
     								<label for="datetime1">Select Departure Date:<p> </p></label>
            						<div class="input-group date" id="datetimepicker1">
                						<input id="datetime1" type="text" class="inputDate form-control" placeholder="Select Departure Date" name="depart"/>
                						<span class="input-group-addon">
                   						<span class="fa fa-calendar"></span>
                						</span>
            						</div>
        						</div>
    						</div>
    						
    						<div class="col-sm-3">
       							<div class="form-group">
           							<label for="datetime2">Select Return Date:<p> </p></label>
            						<div class="input-group date" id="datetimepicker2">
                							<input  id="datetime2" type="text" class="inputDate form-control" placeholder="Select Return Date" name="return"/>
                							<span class="input-group-addon">
                    						<span class="fa fa-calendar"></span>
                					</span>
            				</div>
        </div>
    </div>
            			
							<div class="col-sm-3">
	
							<label for="adults">No. of adults:<p> </p></label>
    							<div class="form-group">
    								<select id= "adults" class="selectpicker form-control" data-size="5" title="Aged 18 and above" name="adults">
  										<option value="1">1</option>
  										<option value="2">2</option>
  										<option value="3">3</option>
  										<option value="4">4</option>
  										<option value="5">5</option>
  										<option value="6">6</option>
									</select>
								</div>
							</div>
							
							<div class="col-sm-3">
							
							<label for="children">No. of children:<p> </p></label>
								<div class="form-group">
   									<select id= "children" class="selectpicker form-control" data-size="5" title="Aged upto 17" name="children">
  										<option value="0">0</option>
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
            			
            					<input type="submit" class="button" name="searchFlights" value="Search Flights">
            				
            				</div>
            				
            			</form>
            			
    					</div> <!-- content -->
    					
					</div> <!-- search -->
					
				</div>
			
			<!-- FLIGHT SEARCH SECTION ENDS -->
				
			</div> <!-- flights -->	
			
			
			
			<!-- POPULAR FLIGHTS SECTION STARTS -->
			
				<!-- <div class="col-sm-12"> -->
					
					<div class="popularFlights col-sm-12">
					
						<div class="heading">
						
								Popular Flights
						
						</div>
						
						<div class="bg">
						
							<!-- replace listItems below by PHP loops -->
						
							<div class="listItem">
													
								<!-- OPERATOR STARTS -->

								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Operator
			
									</div>
		
									<div class="operatorLogo text-center">
			
										<img src="images/flights/operatorLogos/indigo.jpg">
			
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
		
										BOM
			
									</div>
		
								</div>
	
									<!-- ORIGIN ENDS -->
	
	
									<!-- DESTINATION STARTS -->
	
								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Destination
			
									</div>
		
									<div class="values destination">
		
										Kolkata
			
									</div>
		
									<div class="destinationSubscript">
		
										CCU
			
									</div>
		
								</div>
	
									<!-- DESTINATION ENDS -->
	
	
									<!-- TIME STARTS -->

								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Time
			
									</div>
		
									<div class="values time">
		
										<div class="departure">
											
											19:40
											
										</div>
										
										<div class="arrival">
											
											22:25
											
										</div>
		
									</div>
		
								</div>
	
									<!-- TIME ENDS -->
	
	
									<!-- FARE STARTS -->
	
								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Fare
			
									</div>
		
									<div class="values fare">
		
										4,013
			
									</div>
		
									<div class="fareSubscript">
		
										incl. of GST
			
									</div>
		
								</div>
	
									<!-- FARE ENDS -->
	
	
									<!-- AVAILABILITY STARTS -->
	
								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Availability
			
									</div>
		
									<div class="values availabilityGreen">
		
										Available
			
									</div>
		
									<div class="availabilitySubscript">
		
										<input type="submit" class="availabilityBookingButton" value="Book Now">
			
									</div>
		
								</div>
	
									<!-- AVAILABILITY ENDS -->
				
							</div> <!-- listItem 1 -->
							
							<div class="listItem">
													
								<!-- OPERATOR STARTS -->

								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Operator
			
									</div>
		
									<div class="operatorLogo text-center">
			
										<img src="images/flights/operatorLogos/vistara.jpg">
			
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
		
										DEL
			
									</div>
		
								</div>
	
									<!-- ORIGIN ENDS -->
	
	
									<!-- DESTINATION STARTS -->
	
								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Destination
			
									</div>
		
									<div class="values destination">
		
										Chennai
			
									</div>
		
									<div class="destinationSubscript">
		
										MAA
			
									</div>
		
								</div>
	
									<!-- DESTINATION ENDS -->
	
	
									<!-- TIME STARTS -->

								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Time
			
									</div>
		
									<div class="values time">
		
										<div class="departure">
											
											06:05
											
										</div>
										
										<div class="arrival">
											
											08:45
											
										</div>
		
									</div>
		
								</div>
	
									<!-- TIME ENDS -->
	
	
									<!-- FARE STARTS -->
	
								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Fare
			
									</div>
		
									<div class="values fare">
		
										3,596
			
									</div>
		
									<div class="fareSubscript">
		
										incl. of GST
			
									</div>
		
								</div>
	
									<!-- FARE ENDS -->
	
	
									<!-- AVAILABILITY STARTS -->
	
								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Availability
			
									</div>
		
									<div class="values availabilityGreen">
		
										Available
			
									</div>
		
									<div class="availabilitySubscript">
		
										<input type="submit" class="availabilityBookingButton" value="Book Now">
			
									</div>
		
								</div>
	
									<!-- AVAILABILITY ENDS -->
				
							</div> <!-- listItem 2 -->
							
							<div class="listItem">
													
								<!-- OPERATOR STARTS -->

								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Operator
			
									</div>
		
									<div class="operatorLogo text-center">
			
										<img src="images/flights/operatorLogos/airindia.jpg">
			
									</div>
		
								</div>
	
								<!-- OPERATOR ENDS -->
	
	
								<!-- ORIGIN STARTS -->

								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Origin
			
									</div>
		
									<div class="values origin">
		
										Bengaluru
			
									</div>
		
									<div class="originSubscript">
		
										BLR
			
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
		
										DEL
			
									</div>
		
								</div>
	
									<!-- DESTINATION ENDS -->
	
	
									<!-- TIME STARTS -->

								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Time
			
									</div>
		
									<div class="values time">
		
										<div class="departure">
											
											09:55
											
										</div>
										
										<div class="arrival">
											
											12:35
											
										</div>
		
									</div>
		
								</div>
	
									<!-- TIME ENDS -->
	
	
									<!-- FARE STARTS -->
	
								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Fare
			
									</div>
		
									<div class="values fare">
		
										3,198
			
									</div>
		
									<div class="fareSubscript">
		
										incl. of GST
			
									</div>
		
								</div>
	
									<!-- FARE ENDS -->
	
	
									<!-- AVAILABILITY STARTS -->
	
								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Availability
			
									</div>
		
									<div class="values availabilityRed">
		
										Unavailable
			
									</div>
		
									<div class="unavailabilitySubscript">
		
										Sold Out
			
									</div>
		
								</div>
	
									<!-- AVAILABILITY ENDS -->
				
							</div> <!-- listItem 3 -->
							
						</div> <!-- bg -->
						
					</div> <!-- popularFlights -->
					
				<!-- </div> -->
				
			<!-- POPULAR FLIGHTS SECTION ENDS -->
			
			
			
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