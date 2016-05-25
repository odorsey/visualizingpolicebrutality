<?php
$pageName = "act";
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

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h1>The Act of Brutality</h1>
      <blockquote>Police brutality is defined as "the use of excessive physical force or verbal assault and psychological intimidation." <footer><a href="#1">April Walker</a>, 2011</footer></blockquote>
      <p>African Americans have frequently accused police officers of racial profiling and of assaulting innocent African American suspects for <u><strong>decades</strong></u>. These interactions have always been tense and hostile, due to the history that these two groups share.</p>
      <p>From the brutal assaults of <a href="https://en.wikipedia.org/wiki/Abner_Louima" target="_blank">Abner Louima</a> to the <a href="https://en.wikipedia.org/wiki/Rodney_King" target="_blank">Rodney King</a>, victims have been beaten, tasered, shot, and choked solely on the basis of their presumed guilt. This violence causes not only physical damage, but also psychological damage. This conquering of the African American body is an assertion of dominance, meant to ensure that he stays in his place. Such assertions of dominance in the law enforcement community are well known against dangerous suspects, but are also known to occur when encountering African American suspects, regardless of the danger they may or may not actually pose.</p>
      <p>Police officers largely determine which areas in their precincts are dangerous and some argue that this is based on the individuals found in these community areas.</p>
    </div>
    <div class="col-md-6">
      <h3>Age as a Factor</h3>
      <p>The age of the victims of these incidents is important to understanding police brutality. Often, African American males who are between the ages of 16-24 and 25-33 are involved in such incidents. African American females who are between the ages of 16-24 are also often involved in these incidents.</p>
      <p class="dataText"><em>Click on a button below to filter the data based on the gender of the victims.</em></p>
      <div id="donut1">
      <form>
        <label><input type="radio" name="dataset" value="females" checked> Females </label>
        <label><input type="radio" name="dataset" value="males"> Males </label>
        <label><input type="radio" name="dataset" value="totalNumber"> Both </label>
      </form>

      <script>
      var width = 760, height = 300, radius = Math.min(width, height) / 2;
      var legendRectSize = 18;
      var legendSpacing = 4;

      var color = d3.scale.ordinal()
          .domain(["7-15", "16-24", "25-33", "34-42", "43-51", "52-60", "61-70"])
          .range(["#ff8b3d", "#d65050", "#ab0e4d", "#6f0049", "#4a004b", "#d0743c", "#BE2625"]);

      var arc = d3.svg.arc()
          .outerRadius(radius * 0.9)
          .innerRadius(radius * 0.3);

      var outerArc = d3.svg.arc()
          .innerRadius(radius * 0.9)
          .outerRadius(radius * 0.9);

      var pie = d3.layout.pie()
          .sort(null)
          .value(function(d) { return d.females; });

      var svg = d3.select("#donut1").append("svg")
          .attr("width", width)
          .attr("height", height)
        .append("g")
          .attr("transform", "translate(" + width / 4 + "," + height / 2 + ")")

      d3.json("graphdata.php", function(error, data) {

        data.forEach(function(d) {
          var path = svg.datum(data).selectAll("path")
          .data(pie)
			d.females = +d.females;
			d.males = +d.males;
			d.totalNumber = +d.totalNumber;
        });
		
		var tip = d3.tip()
          .attr('class', 'd3-tip')
          .offset([55, 0])
		  svg.call(tip);

        var donut1 = svg.selectAll(".arc")
            .data(pie(data))
          .enter().append("g")
            .attr("class", "arc")
            .on("mouseover", tip.show)
            .on("mouseout", tip.hide);

        donut1.append("path")
            .style("fill", function(d) { return color(d.data.age); })
            .attr("d", arc)
            .each(function(d) {this._current = d; }); //stores the initial angles


      /*Control for changing the radio buttons & filtering the data*/
      d3.selectAll("input")
        .on("change", change);

        var timeout = setTimeout(function() {
          d3.select("input[value=\"females\"]").property("checked", true).each(change);}, 2000);

        function change() {
          var path = svg.datum(data).selectAll("path")
          var value = this.value;
          clearTimeout(timeout);
		  
          pie.value(function(d) { return d[value]; }); //change value function
		  
		  tip.html(function(d) {
			//check and see what the value is for each radio button that is checked. For example, if "males" is the value, then set its data to a variable. 
			if($( "input:checked" ).val() == "males") {
				hoverValue = d.data.males;
			}
			if($( "input:checked" ).val() == "females") {
				hoverValue = d.data.females;
			}
			if($( "input:checked" ).val() == "totalNumber") {
				hoverValue = d.data.totalNumber;
			}
			return "Victims:" + " " +hoverValue;
		  }); //change the tooltip
          path = path.data(pie); //compute new angles
          path.transition().duration(1800).attrTween("d", arcTween); //redraw the arcs, please!
        }

        /*Legend building starts here*/
         var legend = svg.selectAll('.legend')
          .data(color.domain())
          .enter()
          .append('g')
          .attr('class', 'legend')
          .attr('transform', function(d, i) {
            var height = legendRectSize + legendSpacing;
            var offset =  height * color.domain().length / 2;
            var horz = 10 * legendRectSize;
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

        function type(d) {
          d.females = +d.females;
          d.males = +d.males;
          d.totalNumber = +d.totalNumber;
          return d;
        }

        //Store displayed angles in _current
        //Interpolate them from _current to new angles
        //_current is updated in-place by d3.interpolate during transition
        function arcTween(a) {
          var i = d3.interpolate(this._current, a);
          this._current = i(0);
          return function(t) {
            return arc(i(t));
          };
        }
    </script>
    </div>
  </div>
  </div>
  <!--<div class="row">
    <div class="col-md-6">
      <h3>How it happens</h3>
    </div>
  </div>-->
  <div class="row">
    <div class="col-md-12">
    <h3>Deaths Between 1979 and 2014</h3>
    <p>The line graph below illustrates the number of deaths recorded in this dataset between 1979 and 2014. Despite various peaks that occur in the graph, it doesn't necessarily mean that these incidents are currently more and more every day. While the graph shows that there were no African Americans who died as a result of a police brutality incident between 1982 and 1993, this is not necessarily the case. What is important to think about is: <strong><u>why might these cases be harder to find?</u></strong> How often were these incidents documented in the past? How does this compare to how these incidents are documented now?</p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 col-xs-12" id="line1">
      <script>
      var margin = {top: 20, right: 20, bottom: 30, left: 50},
      width = 760 - margin.left - margin.right,
      height = 300 - margin.top - margin.bottom;

      // Parse the date from the json data so D3 can read it
      var parseDate = d3.time.format("%Y-%m-%d").parse;
      var bisectDate = d3.bisector(function(d) { return d.date; }).left;

      var x = d3.time.scale()
          .range([0, width]);

      var y = d3.scale.linear()
          .range([height, 0]);

      // Setting up the X axis
      var xAxis = d3.svg.axis()
          .scale(x)
          .orient("bottom").ticks(20);

      // Setting up the Y axis
      var yAxis = d3.svg.axis()
          .scale(y)
          .orient("left");

      // The line in the line graph
      var line = d3.svg.line()
          .x(function(d) { return x(d.date); })
          .y(function(d) { return y(d.amount); });

      // Adding the svg canvas to #line1
      var line1 = d3.select("#line1").append("svg")
          .attr("width", width + margin.left + margin.right)
          .attr("height", height + margin.top + margin.bottom)
        .append("g")
          .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

          var lineSvg = line1.append("g");

          var focus = line1.append("g")
            .style("display", "none");

      // Add the data
      d3.json("graphdata2.php", function(error, data) {
        if (error) throw error;

        data.forEach(function(d) {
          d.date = parseDate(d.dateyear);
          d.amount = +d.amount;
        });

        // Scale for the range of the data
        x.domain(d3.extent(data, function(d) { return d.date; }));
        y.domain(d3.extent(data, function(d) { return d.amount; }));

        // Add valueline path
        lineSvg.append("path")
            .attr("class", "line")
            .attr("d", line(data));

        // Add the X axis
        line1.append("g")
            .attr("class", "x axis")
            .attr("transform", "translate(0," + height + ")")
            .call(xAxis);

        // Add the Y axis
        line1.append("g")
              .attr("class", "y axis")
              .call(yAxis)
            .append("text")
              .attr("transform", "rotate(-90)")
              .attr("y", 6)
              .attr("dy", ".71em")
              .style("text-anchor", "end")
              .text("Number of victims killed");

        // Add the circle
        focus.append("circle")
          .attr("class", "y")
          .style("fill", "none")
          .style("stroke", "#FA1D2F")
          .attr("r", 4);

        // Add area for the circle's text
        focus.append("text")
          .attr("class", "y1")
          .style("stroke", "white")
          .style("stroke-width", "3.5px")
          .style("opacity", 0.8)
          .attr("dx", 8)
          .attr("dy", "-.3em");

        focus.append("text")
          .attr("class", "y2")
          .attr("dx", 8)
          .attr("dy", "-.3em");

        // Add area to capture the mouse movement
        line1.append("rect")
          .attr("width", width)
          .attr("height", height)
          .style("fill", "none")
          .style("pointer-events", "all")
          .on("mouseover", function() { focus.style("display", null); })
          .on("mouseout", function() { focus.style("display", "none"); })
          .on("mousemove", mousemove);

          function mousemove() {
            var x0 = x.invert(d3.mouse(this)[0]),
                i = bisectDate(data, x0, 1),
                d0 = data[i - 1],
                d1 = data[i],
                d = x0 - d0.date > d1.date - x0 ? d1 : d0;

            focus.select("circle.y")
                .attr("transform", "translate(" + x(d.date) + "," + y(d.amount) + ")");

            focus.select("text.y1")
                .attr("transform", "translate(" + x(d.date) + "," + y(d.amount) + ")")
                .text(d.amount);

            focus.select("text.y2")
                .attr("transform", "translate(" + x(d.date) + "," + y(d.amount) + ")")
                .text(d.amount);
          } //end of function mousemove

        line1.append("path")
            .datum(data)
            .attr("class", "line")
            .attr("d", line);
      });
    </script>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h3>Resources</h3>
      <p><span id="1">Walker, A. (2011). Racial profiling separate and unequal keeping the minorities in the
line-the role of law enforcement in America. St. Thomas Law Review, 23, 576-619.</span></p>

    </div>
  </div>
</div>

<?php
include("footer.php");
?>
