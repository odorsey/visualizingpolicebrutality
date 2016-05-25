<?php $pageName = "buildup"; ?>
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
  <!-- Modal -->
  <div class="modal fade bs-example-modal-lg" id="states" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Test</h3>
        </div>
        <div class="modal-body">
          <p>Testing</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
        </div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-12" id="chart">
      <h1>The Initial Build-up</h1>
      <p class="content">Violent interactions between African Americans and members of law enforcement have occurred for many decades. However, it has only been recently that more people have begun to again discuss the topic of police brutality as it relates to African Americans.</p>
      <script>
      var margin = {top: 10, right: 20, bottom: 75, left: 40},
          width = 1060 - margin.left - margin.right,
          height = 300 - margin.top - margin.bottom;

      var x = d3.scale.ordinal()
          .rangeRoundBands([0, width], .1);

      var y = d3.scale.linear()
          .range([height, 0]);

      var xAxis = d3.svg.axis()
          .scale(x)
          .orient("bottom");

      var yAxis = d3.svg.axis()
          .scale(y)
          .orient("left");

      var tip = d3.tip()
        .attr('class', 'd3-tip')
        .offset([-10, 0])
        .html(function(d) {
          return d.amount;
        })

      var svg = d3.select("#chart").append("svg")
          .attr("width", width + margin.left + margin.right)
          .attr("height", height + margin.top + margin.bottom)
        .append("g")
          .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

      svg.call(tip);

      d3.json("graphdata3.php", function(error, data) {
        data.forEach(function(d) {
          d.state = d.state;
          d.amount = +d.amount;
        });

        x.domain(data.map(function(d) { return d.state; }));
        y.domain([0, d3.max(data, function(d) { return d.amount; })]);

        svg.append("g")
            .attr("class", "x axis")
            .attr("transform", "translate(0," + height + ")")
            .call(xAxis)
            .selectAll("text")
              .style("text-anchor", "end")
              .attr("dx", "-.8em")
              .attr("dy", ".15em")
              .attr("transform", "rotate(-55)" );

        svg.append("g")
            .attr("class", "y axis")
            .call(yAxis)
          .append("text")
            .attr("transform", "rotate(-90)")
            .attr("y", 6)
            .attr("dy", ".71em")
            .style("text-anchor", "end")
            .text("Number of Total Incidents");

        svg.selectAll(".bar")
            .data(data)
          .enter().append("rect")
            .attr("class", "bar")
            .attr("x", function(d) { return x(d.state); })
            .attr("width", x.rangeBand())
            .attr("y", function(d) { return y(d.amount); })
            .attr("height", function(d) { return height - y(d.amount); })
            .on('mouseover', tip.show)
            .on('mouseout', tip.hide)
            .on("click", function () {
              d3.select(".selected").classed("selected", false);
              d3.select(this).classed("selected", true);
        });
      });

      svg.on("click", function() {
        $('#states').modal('show');
        d3.event.stopPropagation();
      });
      function type(d) {
        d.amount = +d.amount;
        return d;
      }
      </script>
    </div>
    <div class="col-md-12"><figcaption><p>The chart above illustrates a sample of how many incidents of police brutality have occurred within the United States per state between 1979 and 2014.</p></figcaption>
    </div>
    <div class="col-md-6">
      <h2>Community-Police Relations</h2>
      <p>The attitudes of many African Americans towards police are that of distrust. This is due to the consistent trend of hostility between African Americans and members of law enforcement. But where did this hostility stem from?</p>
      <p>The negative role of the police officer has its roots in <a href="https://en.wikipedia.org/wiki/Slave_patrol" target="_blank">slave patrols</a>. These were formalized groups of white men who monitored, captured, and disciplined runaway slaves as well as defiant slaves in the years before the Civil War.  After the empanciption of slaves in 1865, this group evolved to become enforcers of the <a href="https://en.wikipedia.org/wiki/Jim_Crow_laws" target="_blank">Jim Crow laws</a>, which segregated and restricted African Americans from engaging in liberties that were available to White Americans. </p>
      <p>While the Jim Crow laws ended in 1965, this relationship between the oppressor and the oppressed has endured and gives insight as to why African Americans have their misgivings of law enforcement. Whether they have been victims of or witnesses to police brutality, they have passed down these stories for generations, prompting an endless cycle of fear and even hatred for those in uniform.</p>
      <blockquote><p>"It's been happening to us for years. It's just we didn't have a camcorder every time it happened."<footer>Ice Cube on Rodney King beating (MTV News interview, May 3, 1992)<br>(<a href="#3">Kelley</a>, page. 47)</footer><br></p></blockquote>
	  
      <p>The 2015 video below expresses how several African American men, ages 5-50 feel about the police. While their views vary, some of them still express a fear for police officers.</p>
      <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/11xXJnLFojM"></iframe>
      </div>
      <figcaption><p>Video provided by <a href="#2">Cut</a>.</p></figcaption>
    </div>
    <div class="col-md-6">
      <blockquote><p>"<em>Whenever</em> a police officer commits a brutal, justified act against a citizen, there is a very deep feeling of betrayal&#8212; betrayal by one who is supposed to be on your side, working to protect you from the anarchy of the criminal world."<footer>Anonymous African American woman (<a href="#1">Crouch</a>, page. 163)</footer></p></blockquote>
      <p>Not only do Blacks seem to fear police officers, but White police officers seem to fear Black suspects. Research from the fields of psychology, sociology, critical race theory, and others suggest that the "prototypical criminal" is the Black male. Since African American males are frequently portrayed in various media forms as "aggressive and criminal," it is no surprise that police will impression these same characteristics on Black people in real-life encounters.</p>
      <p>Due to both of these groups being afraid of each other, a positive outcome during an interaction with each other may not be likely. During such an encounter, a Black individual may be more likely to run away or act rashly even when he or she has done nothing to make them guilty. On the other hand, White police officers may overreact by mistaking objects such as cellphones or wallets for guns or knives.</p>
      <h2>Racial Profiling</h2>
      <p>Studies on police brutality claim that a small number of white police officers have claimed that Blacks are typically treated harsher than other suspects (Weisburd, 2000).</p>
      <!--<h2>Expressing Police Brutality</h2>
      <p>Vutanajesha stahindiyoga pahambakisufi tweta Gwa Ogea Arulio yeye. Genyavuliangezeko Umanya Viwete yeyuki aliliza njo fyonga bembegu. Yeye epukiatungili Ridhibu arulio hapungazimu gizi baburi gugua ridhibu. Piga achwa Hofu viyo gwa juzitovu. Yeyuki Nchajimbeo watope ndu didimbarika swiliza elfu. Hofu wivi pakua tumwaruliwa nne kwekwecheua lea. Juzitovu apa ovu swiliza ibuyu pengendamurungombongelevu mzishwa. Tweta fyonga bomarulia Sogeleka rapu ndu apa wekengazi bembegu. Sini pahambakisufi gwa pya sogeleka.</p>
      <blockquote><p>Ya hotshot, want to get props and be a savior<br>
        First show a little respect, change your behavior<br>
        Change your attitude, change your plan<br>
        There could never really be justice on stolen land<footer>KRS-One, Sound of Da Police (1993)</blockquote>-->
    </div>
    <div class="col-md-12">
    <h3>Resources:</h3>
    <p><span id="1">Crouch, S. (2000). What’s New? The Truth, As Usual. <a href="http://www.amazon.com/Police-Brutality-Anthology-Jill-Nelson/dp/0393321630/ref=sr_1_1?ie=UTF8&qid=1440790460&sr=8-1&keywords=police+brutality+anthology&pebp=1440790465627&perid=0MCVRFXFQAWXVVDR1YNF" target="_blank">Police Brutality: An Anthology</a> (p. 163). New York: W.W. Norton & Company, Inc.</span></p>
      <p><span id="2">Cut LLC. (2015). Cut. Retrieved from <a href="http://www.cut.com/">http://www.cut.com/</a></span></p>
      <p><span id="3">Kelley, R. (2000). Slangin’ Rocks... Palestinian Style. <a href="http://www.amazon.com/Police-Brutality-Anthology-Jill-Nelson/dp/0393321630/ref=sr_1_1?ie=UTF8&qid=1440790460&sr=8-1&keywords=police+brutality+anthology&pebp=1440790465627&perid=0MCVRFXFQAWXVVDR1YNF" target="_blank">Police Brutality: An Anthology</a> (p. 47). New York: W.W. Norton & Company, Inc.</span></p>
		<br><br><br><br>
    </div>
  </div>
</div>
</body>
<?php
include("footer.php");
?>
