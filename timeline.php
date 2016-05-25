<!-- D3.js for the timeline visual -->
<script src="http://d3js.org/d3.v3.min.js"></script>

    <div id="timeline">
  <script>
  //Create the SVG Viewport
  var width = 700;
  var height = 50;
   var svgContainer = d3.select("#timeline").append("svg")
     .attr("width", width)
     .attr("height", height)
	 .style("font-size","11px");

   //Create the Scale we will use for the Axis
    var axisScale = d3.scale.linear()
       .domain([ _options.markers[_options.minValue].feature.properties[_options.timeAttribute].substring(0,4), _options.markers[_options.maxValue].feature.properties[_options.timeAttribute].substring(0,4)])
       .range([0, width]);

   //Create the Axis
   var xAxis = d3.svg.axis()
       .orient("bottom") //Numbers appear below the line
       .ticks(10, "Y")
       .tickFormat(d3.format("Y"))
       .scale(axisScale)
       .outerTickSize(0)

   //Create an SVG group Element for the Axis elements and call the xAxis function
  svgContainer.append("g")
       .attr("class", "axis") //Assign "axis" class to "g" element
       .call(xAxis);
  </script>
</div>
