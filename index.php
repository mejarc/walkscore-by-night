<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"> 
		<title>
			Walk Score...By Night 
		</title>
		<link href="./assets/css/bootstrap.min.css" rel="stylesheet"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
      #map_canvas { 
      height: 300px;
      width: 300px;
      }
      
    </style> <link href="./assets/css/bootstrap-responsive.css" rel="stylesheet"> <link href="./assets/css/binkster.css" rel="stylesheet"> 
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	</head>
	<body>
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar">
					</span>
				<span class="icon-bar">
				</span>
			<span class="icon-bar">
			</span>
		</a>
		<a class="brand" href="#">
			Walk Score...By Night 
		</a>
		<div class="nav-collapse">
			<ul class="nav">
			</ul>
		</div>
<!--/.nav-collapse -->
	</div>
</div>
</div>
<div class="container">
	<form action="ajax.php" method="post">
		<fieldset>
			<legend>
				Start here 
			</legend>
<!-- geolocation. Symbol, language file -->
			<ol class="unstyled">
				<li>
					<label>
						Fetch Walk Score for this location 
					</label>
<!-- autocomplete. Refactor with Twitter Typeahead, http://stackoverflow.com/questions/9232748/twitter-bootstrap-typeahead-ajax-example -->
					<input type="text" id="address" name="address" required placeholder="Street address, city, or ZIP code" /> 
				</li>
				<li>
					<label>
						latitude: 
					</label>
					<input id="latitude" type="text" /> 
				</li>
				<li>
					<label>
						longitude: 
					</label>
					<input id="longitude" type="text" /> 
				</li>
				<li>
					<input type="submit" value="Go" /> 
				</li>
			</ol>
	</form>
	<div id="map_canvas">
	</div>
	</fieldset>
	</form>
</div>
<!-- /container -->
<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false"></script><script src="//code.jquery.com/jquery.min.js"></script><script src="./assets/js/jquery-ui/js/jquery-ui-1.8.22.custom.min.js">

</script><script src="./assets/js/application.js"></script><!-- <script src="./assets/js/bootstrap-transition.js"></script> <script src="./assets/js/bootstrap-alert.js"></script> <script src="./assets/js/bootstrap-modal.js"></script> -->
<!-- <script type="text/javascript"> 
    
	//Make an ajax call to a php page on your domain that will fetch json data from the Walk Score API
	//here we use the JQuery library for our Ajax call, but you can use whatever system you like
	function injectWalkScore(address,lat,lon){
		address = encodeURIComponent(address);
		var url="ajax.php?address=" + address + "&lat=" + lat + "&lon=" + lon;
		$.ajax( {
			url: url,
			type:'GET',
			success: function(data) { displayWalkScores(data); },
			error: function(){ displayWalkScores(""); }
			}
		);
	}	
	//to demonstrate all of our formatting options, we'll pass the json on to a series of display functions.  
	//in practice, you'll only need one of these, and the ajax call could call it directly as its onSuccess callback
	function displayWalkScores(jsonStr) {
		displayWalkScore(jsonStr);
	}
		
	//show the walk score -- inserts walkscore html into the page.  Also needs CSS from top of file
	function displayWalkScore(jsonStr) {
		var json=(jsonStr) ? eval('(' + jsonStr + ')') : ""; //if no response, bypass the eval

		//if we got a score
		if (json && json.status == 1) {
			var htmlStr = '<a target="_blank" href="' + json.ws_link + '">
<img src="' + json.logo_url + '" />
<span class="walkscore-scoretext">
	' + json.walkscore + '
</span>
</a>
'; } //if no score was available else if (json && json.status == 2) { var htmlStr = '
<a target="_blank" href="' + json.ws_link + '">
	<img src="' + json.logo_url + '" /> 
<span class="walkscore-noscoretext">
	Get Score
</span>
</a>
'; } //if didn't even get a json response else { var htmlStr = '
<a target="_blank" href="http://www.walkscore.com">
	<img src="http://www2.walkscore.com/images/api-logo.gif" /> 
<span class="walkscore-noscoretext">
	Get Score
</span>
</a>
'; } var infoIconHtml = '
<span id="ws_info">
<a href="http://www.walkscore.com/how-it-works.shtml" target="_blank">
	<img src="http://cdn.walk.sc/images/api-more-info.gif" width="13" height="13" " />
</a>
</span>
'; //if you want to wrap extra tags around the html, can do that here before inserting into page element htmlStr = '
<p>
	' + htmlStr + infoIconHtml + '
</p>
'; //insert our new content into the container div: $("#walkscore-div").html(htmlStr); } 
</script>
--> 
<!-- using these???
    <script src="./assets/js/bootstrap-dropdown.js"></script>
    <script src="./assets/js/bootstrap-scrollspy.js"></script>
    <script src="./assets/js/bootstrap-tab.js"></script>
    <script src="./assets/js/bootstrap-tooltip.js"></script>
    <script src="./assets/js/bootstrap-popover.js"></script>
    <script src="./assets/js/bootstrap-button.js"></script>
    <script src="./assets/js/bootstrap-collapse.js"></script>
    <script src="./assets/js/bootstrap-carousel.js"></script>
    <script src="./assets/js/bootstrap-typeahead.js"></script> -->
</body>
</html>
