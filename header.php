<?php include ("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

  <title>Visualizing Police Brutality</title>
  <!-- jQuery -->
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

  <!-- jQuery UI -->
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" type="text/css">
  <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

  <!-- Mapbox/Leaflet -->
  <script type='text/javascript' src='http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.js?2'></script>
  <script src='https://api.tiles.mapbox.com/mapbox.js/v2.1.4/mapbox.js'></script>
  <link href='https://api.tiles.mapbox.com/mapbox.js/v2.1.4/mapbox.css' rel='stylesheet' />

  <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <!-- end Bootstrap -->

  <!-- Custom CSS -->
  <link rel="stylesheet" href="custom.css">

  <!-- Google Fonts -->
  <!--<link href='http://fonts.googleapis.com/css?family=Catamaran:300,700,400' rel='stylesheet' type='text/css'>-->
</head>

<body>
    <nav class="navbar navbar-inverse nopadding">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Visualizing Police Brutality</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li <?php if ($pageName == 'home') {echo 'class="active"';} ?>><a href="index.php">Home</a></li>
            <li <?php if ($pageName == 'buildup') {echo 'class="active"';} ?>><a href="initialbuildup.php">The Initial Build-Up</a></li>
            <li <?php if ($pageName == 'act') {echo 'class="active"';} ?>><a href="theactofbrutality.php">The Act of Brutality</a></li>
            <li <?php if ($pageName == 'reactions') {echo 'class="active"';} ?>><a href="reactions.php">Immediate Reactions</a></li>
            <li <?php if ($pageName == 'aftermath') {echo 'class="active"';} ?>><a href="aftermath.php">The Aftermath</a></li>
			<li><p class="navbar-btn"><a href="#" class="btn btn-danger" data-toggle="modal" data-target="#contributeModal">Contribute!</a></p></li>
			<!--<li><p class="navbar-btn"><a href="#" class="btn btn-primary">Kickstarter</a></p></li>-->
          </ul>
        </div>

        <!-- About Modal -->
        <div class="modal fade" id="aboutModal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Visualizing Police Brutality</h3>
              </div>
              <div class="modal-body">
                <p><strong>Visualizing Police Brutality</strong> is an effort to create a complied resource that visualizes data relating to brutality incidents against unarmed African Americans. In particular, this data focuses on the period of time between 1979 and 2015.</p>
                <p>To get started, feel free to explore the map on the home page. Navigating to additional pages will lead you through what I have identified as the four phases of police brutality: <a href="initialbuildup.php">The Initial Build-up</a>, <a href="theactofbrutality.php">The Act of Brutality</a>, <a href="reactions.php">Immediate Reactions</a>, and <a href="aftermath.php">The Subsequent Aftermath</a>.</p>
                <p>Data for this project comes from a variety of sources including <a href="http://regressing.deadspin.com/deadspin-police-shooting-database-update-were-still-go-1627414202" target="_blank">the Deadspin U.S. Police Shootings Data set</a>, the <a href="http://www.fatalencounters.org/" target="_blank">Fatal Encounters Database</a>, and local and national news websites. While this project is far from comprehensive, with continued progress, I hope that it eventually become a reliable resource that many can benefit from as we try to understand the context surrounding these incidents and how we can prevent them from occurring.</p>

				<p>If you have a question about this project, check out the <a href="questions.php">Frequently Asked Questions</a> page or contact me <a href="contact.php">here</a>.</p>
                <img src="images/signature.png" />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>


		<!-- Modal -->
        <div class="modal fade" id="contributeModal" role="dialog">
			  <div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">Contribute!</h3>
				  </div>
				  <div class="modal-body">
				<h4>If you would like to contribute to <strong>Visualizing Police Brutality</strong> or have suggestions, please contact me <a href="http://visualizingpolicebrutality.org/site/contact.php" >here</a>. <!--or consider making a donation <a href="https://www.paypal.me/OliviaD">here</a> so I can keep working on this project!--></h4>
				  </div>

				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				   </div>
				</div>
			  </div>
        </div>
     </div>
    </nav>
