<?php $pageName = 'home'; ?>
<?php include ("header.php"); ?>
<body onload="javascript:init();">
<?php include("mapdata.php");
include("map.php");
?>

<!-- Custom CSS for index.php-->
<link rel="stylesheet" href="css/map.css">

<!-- D3.js for the timeline visual -->
<script src="http://d3js.org/d3.v3.min.js"></script>

<!-- Google Analytics code -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-39247935-4', 'auto');
  ga('send', 'pageview');

</script>

<div class="wrapper">
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12" id="map">
      <nav id="menu-ui" class="menu-ui">
        <a href="#" id="reset">Reset Map</a>
      </nav>
    </div>
  </div>


        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
          <button type="button" class="close slider">&times;</button>
          <h3><span class="back">&larr; </span><span id="name"></span></h3>
          <div class="row">
            <div class="col-md-12">
          <span class="img-slide"><span id="photo"></span></span>
        </div>
          <div class="desc col-md-12">
  		      <h4 class="desc-slide"><strong>Age at the time of incident:</strong> <span id="age"></span></h4>
            <h4 class="desc-slide"><strong>Gender:</strong> <span id="gender"></span></h4>
            <h4 class="desc-slide"><strong>Victim Killed?:</strong> <span id="status"></span></h4>
            <p class="desc-slide"><span id="vicDesc"></span></p>
		      </div>

        </nav>
        <!--<nav class="cbp-spmenu2 cbp-spmenu-vertical-right cbp-spmenu-right" id="cbp-spmenu-s2">
          <h3><button type="button" class="close slider" id="leftClose">&times;</button>&nbsp; Search <span class="back-right">&rarr; </span></h3>
          <h4 class="desc-slide">Search by Name</h4>
          <h4 class="desc-slide">Search by State</h4>
        <div class="form-group col-md-3 col-xs-12">
        <input id="search" class="search-ui" placeholder="Enter state code" />
      </div>
    </nav>-->

</div>
</div>
<br><br><br><br><br>

<?php include ("footer.php");
?>
