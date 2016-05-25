<?php $pageName = "aftermath"; ?>
<?php
include("header.php");
include("connection.php");
?>
<script src="http://d3js.org/d3.v3.min.js"></script>
<script src="http://labratrevenge.com/d3-tip/javascripts/d3.tip.v0.6.3.js"></script>
<link rel="stylesheet" href="css/graphs.css">

<!-- Google Analytics code -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-39247935-4', 'auto');
  ga('send', 'pageview');

</script>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Aftermath</h1>
          <p>It is <strong>rare</strong> for police officers to be charged for the murder of a Black suspect.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6" id="donut2">
        <script>
          var width = 960,
          height = 375,
          radius = Math.min(width, height) / 2;
          var legendRectSize = 18;
          var legendSpacing = 4;

          var color = d3.scale.ordinal()
          .range(["#98abc5", "#8a89a6", "#7b6888", "#6b486b", "#a05d56", "#d0743c", "#E1E1E1"]);

          var arc = d3.svg.arc()
          .outerRadius(radius * 0.9)
          .innerRadius(radius * 0.3);

          var pie = d3.layout.pie()
          .sort(null)
          .value(function(d) { return d.totalNumber; });

          var svg = d3.select("#donut2").append("svg")
          .attr("width", width)
          .attr("height", height)
          .append("g")
          .attr("transform", "translate(" + width / 5 + "," + height / 2 + ")");

          d3.json("graphdata5.php", function(error, data) {
          data.forEach(function(d) {
          d.totalNumber = +d.totalNumber;
          });

          var tip = d3.tip()
            .attr('class', 'd3-tip')
            .offset([55, 0])
            .html(function(d) {
              return d.data.totalNumber + "<br>";
            })

          svg.call(tip);

          var donut2 = svg.selectAll(".arc")
            .data(pie(data))
          .enter().append("g")
            .attr("class", "arc")
            .on("mouseover", tip.show)
            .on("mouseout", tip.hide);

          donut2.append("path")
            .attr("d", arc)
            .style("fill", function(d) { return color(d.data.result); });

          /*donut2.append("text")
            .attr("transform", function(d) { return "translate(" + arc.centroid(d) + ")"; })
            .attr("dy", ".25em")
            .style("text-anchor", "middle")
            .text(function(d) { return d.data.result; });*/

            /*Legend building starts here*/
             var legend = svg.selectAll('.legend')
              .data(color.domain())
              .enter()
              .append('g')
              .attr('class', 'legend')
              .attr('transform', function(d, i) {
                var height = legendRectSize + legendSpacing;
                var offset =  height * color.domain().length / 2;
                var horz = 11 * legendRectSize;
                var vert = i * height - offset;
                return 'translate(' + horz + ',' + vert + ')';
              });

            legend.append('rect')
              .attr('width', legendRectSize)
              .attr('height', legendRectSize)
              .style('fill', color)
              .style('stroke', color);

            legend.append('text')
              .attr('x', legendRectSize + legendSpacing)
              .attr('y', legendRectSize - legendSpacing)
              .text(function(d) { return d; });
            });
        </script>
      </div>
      <div class="col-md-6">
        <p>In most police brutality cases in which a Black suspect has been assaulted or killed, the police officer involved usually pleads  self-defense and is either not charged or is acquitted in court.</p>

<p>This prevents victims' families from getting the closure they need and lets the cycle of brutality continue.</p>

<blockquote>What happened to me should not happen to any human being, to my children, or to anyone else's children. <footer>Abner Louima</footer></blockquote>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h3>Items mistaken for weapons</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 col-xs-4">
        <img src="images/wallet.jpg" class="img-responsive" />
      </div>
      <div class="col-md-4 col-xs-4">
        <img src="images/phone.jpg" class="img-responsive" />
      </div>
      <div class="col-md-4 col-xs-4">
        <img src="images/hand.jpg" class="img-responsive" />
      </div>
  </div>
      <br>
<div class="row">
  <div class="col-md-12">
    <p>Sometimes items such as cellphones and wallets are mistaken to be guns and it is only after the incident has happened that everyone realizes that this was the case. In other incidents, some officers claim that they feared for their life because a suspect made a motion towards their pants.</p>
	<h3>Media Perceptions</h3>
    <p>Often, victims are criminalized in such a way that their portrayal suggests that it was okay for them to be killed. This inevitably leads to a "justified killing" of the victim, regardless of whether or not the victim was actually guilty of the proposed crime. This idea of criminalization by the media was explored with the use of the hashtag, <strong>#IfTheyGunnedMeDown</strong>, which began trending shortly after the death of Michael Brown.</p>
      <br><br><br><br>
  </div>
</div>
</div>

</body>
<?php
include("footer.php");
?>
