<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" >
	<meta name="description" content="The 12 Tasks Challenge is a real life travel adventure game where travellers complete cultural, creative and adventurous tasks as they explore the world.">
	<meta name="keywords" content="travel, adventure, challenge, Thailand, competition, game, Bangkok, win, prize">
	<meta name="author" content="The Taskmasters">

	<title>The 12 Tasks Challenge - The Real Life Travel Adventure Game</title>

	<link href="favicon.ico" rel="icon" type="image/x-icon" />
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <script src="https://js.stripe.com/v2/"></script>
    <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script>
        Stripe.setPublishableKey('pk_test_97ZlNg7LtYk9ICp17I6hjlRI');   // Test key!
    </script>
    <script src="js/buycontrollerd.js"></script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56489723-1', 'auto');
  ga('send', 'pageview');

</script>
</head>


<body data-spy="scroll" data-target="#my-nav">
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54532174246df826" async="async"></script>


<!-- Navigation Bar -->
<div class="navbar navbar-fixed-top">
	<div class="container">

		<div class="navbar-header">
			<a class="navbar-brand" href="#"><img class="logo" src="assets/logo.png" alt="The 12 Tasks Challenge"></a>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<nav id="my-nav" class="navbar-collapse collapse" role="navigation">
			<ul class="nav navbar-nav">
				<li><a href="#welcome">Home</a></li>
				<li><a href="#about">About</a></li>
				<li><a href="#tasks">The Challenge</a></li>
				<li><a href="#thailand">Thailand</a></li>	
				<li><a href="#faqs">FAQs</a></li>
				
				<li><a href="#contact">Entry</a></li>
			</ul>
		</nav><!--/.navbar-collapse -->

	</div>
</div>
<!-- End of Navigation Bar -->


<!-- Welcome Section -->
<section id="welcome" class="parallax welcome-section photo-section dark-section light-content parallax">
	<div class="bg-overlay"></div>
	<div class="container">
		<div class="content-wrapper">
			<div class="welcome-content">
				<form id="buy-form" class="contact-form form-horizontal" action="javascript:" method="post">
								<div class="form-group col-xs-6">
									<label for="first-name">First Name</label>
						            <input class="form-control input-lg" id="first-name" spellcheck="false">
						        </div>
					            <div class="form-group col-xs-6">
						            <label for="last-name">Last Name</label>
						            <input class="form-control input-lg" id="last-name" spellcheck="false">
						        </div>
					            <div class="form-group col-xs-6">
						            <label for="email">Email</label>
						            <input class="form-control input-lg" id="email" spellcheck="false">
					            </div>
					            <div class="form-group col-xs-6">
						            <label for="phone">Phone</label>
						            <input class="form-control input-lg" id="phone" spellcheck="false">
					            </div>
					            <div class="form-group col-xs-6">
						            <label for="address1">Address 1</label>
						            <input class="form-control input-lg" id="address1" spellcheck="false">
					            </div>
					            <div class="form-group col-xs-6">
						            <label for="address2">Address 2</label>
						            <input class="form-control input-lg" id="address2" spellcheck="false">
					            </div>
					            <div class="form-group col-xs-6">
						            <label for="city">City</label>
						            <input class="form-control input-lg" id="city" spellcheck="false">
					            </div>
					            <div class="form-group col-xs-6">
						            <label for="postcode">Postcode</label>
						            <input class="form-control input-lg" id="postcode" spellcheck="false">
					            </div>
					            <div class="form-group col-xs-12">
						            <label for="Country">Country</label>
						            <input class="form-control input-lg" id="country" spellcheck="false">
					            </div>

					            <div class="form-group col-xs-6">
									<label for="card-number">Card Number</label>
						            <input class="form-control input-lg" id="card-number" autocomplete="off">
					            </div>
					            <div class="form-group col-xs-4">
						            <label for="expiration-month">Expiration Date</label><br />
						            <select id="expiration-month" class="input-lg">
						            <option value="1">Jan</option>
						            <option value="2">Feb</option>
						            <option value="3">Mar</option>
						            <option value="4">Apr</option>
						            <option value="5">May</option>
						            <option value="6">Jun</option>
						            <option value="7">Jul</option>
						            <option value="8">Aug</option>
						            <option value="9">Sep</option>
						            <option value="10">Oct</option>
						            <option value="11">Nov</option>
						            <option value="12">Dec</option>
						            </select>
						             
						            <select id="expiration-year" class="input-lg">
						                <?php 
						                    $yearRange = 20;
						                    $thisYear = date('Y');
						                    $startYear = ($thisYear + $yearRange);
						                 
						                    foreach (range($thisYear, $startYear) as $year) 
						                    {
						                        if ( $year == $thisYear) {
						                            print '<option value="'.$year.'" selected="selected">' . $year . '</option>';
						                        } else {
						                            print '<option value="'.$year.'">' . $year . '</option>';
						                        }
						                    }
						                ?>
						            </select>
					            </div>
					            <div class="form-group col-xs-2">
						            <label for="card-security-code">CVC</label>
						            <input class="form-control input-lg" id="card-security-code" autocomplete="off">
					            </div>
					            <div class="form-group col-xs-12">
					            	<button id="buy-submit-button" class="btn btn-outline-white btn-big" type="submit" value="Submit">Submit</button>
					            </div>
			        
								
							</form>
			</div>
		</div>
	</div>
</section>
<!-- End of Welcome Section -->



<!-- Contact Section -->
<section id="contact" class="contact-section dark-section light-content">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h1 class="special-heading light-special">Entry</h1>
				<p class="section-description">Entry to The Thailand Challenge is limited to 12 teams of two.
					<br/><br/>You can reserve your place now with a 10% deposit - that's £120 per team member. The remainder of your entry fees are due by the 1st August 2015.
					<br/><br/>If you need to cancel for any reason before the 1st August then we will return your deposit and other payments in full.</p>
				
			</div>
		</div>

		
    <div id="entry-form" class="modal fade light-section dark-content" tabindex="-1" role="dialog" aria-labelledby="buy-form" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        	<div class="modal-content">
        		<div class="modal-header">
            		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            		<h2 class="modal-title">The 12 Tasks Challenge Entry Form</h2>
        		</div>

        		<div class="modal-body">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">

							<div id="result"></div>

							
						</div>
						</div><!-- End of Modal body -->
        </div><!-- End of Modal content -->
        </div><!-- End of Modal dialog -->
		</div></div>
	</div>
</section>
<!-- End of Contact Section -->



<!-- Footer -->
<footer class="footer photo-section dark-section light-content">
	<div class="bg-overlay"></div>
	<div class="container">
		
	</div>
	<div class="row contact-informations">
					<div class="col-sm-4">
						<div class="contact-info clearfix">
							<i class="fa fa-envelope"></i>
							<span>info@the12tasks.com</span>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="social-icons light-icons">
			<a href="#"><i class="fa fa-facebook"></i></a>
			<a href="#"><i class="fa fa-twitter"></i></a>
		</div>
		<p>© 2014 Get Muddy Ltd</p>
					</div>
					<div class="col-sm-4">
						<div class="contact-info clearfix">
							<i class="fa fa-phone"></i>
							<span></span>
						</div>
					</div>
				</div>
</footer>

<div class="scrolltotop">
	<i class="fa fa-chevron-up"></i>
</div>
<!-- End of Footer -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->


<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.custom.47152.js"></script>
<script src="js/modernizr-ie.js"></script>
<script src="js/jquery.easing.1.3.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/jquery.textrotator.min.js"></script>
<script src="js/jquery.simple-text-rotator.min.js"></script>
<script src="js/grid.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/scripts.js"></script>

</body>
</html>