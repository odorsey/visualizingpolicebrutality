<?php $pageName = "reactions"; ?>
<?php
include("header.php");
include("connection.php");
require_once('twitter-api-php-master/TwitterAPIExchange.php');
?>

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
	  <h1>Immediate Reactions</h1>
	  <p>Social media, and Twitter in particular, have given insight into police brutality incidents and how witnesses react to these events.</p>
	  
	  <h2>The Shooting of Michael Brown: August 9, 2014</h2>
	  <p>Michael Brown, a 17 year old teenager, was shot and killed by Ferguson police officer, Darren Wilson, in Ferguson, Missouri. What exactly happened between the two individuals on that day is still fuzzy, but those who were in Ferguson had a lot to say on social media about the incident. In fact, their tweets helped get the attention of many people inside and outside of the United States. This use of Twitter galvanized individuals and organized groups who were concerned about polcie brutality.</p>
	  <div class="tweets-container">
	  <?php 
	  $settings = array(
		'oauth_access_token' => "1852776768-Zx3os4Nzchy21oKDiklPeyPT345OErMJOQq6hFT",
		'oauth_access_token_secret' => "DZCkLuqYoWfu3YMyzKCemLFlPjHc7IIQ2CBJbAEReAACL",
		'consumer_key' => "3vXwPzD023BOOID7QbGwSUOcs",
		'consumer_secret' => "fzLrHlAs4H1bdpO9iBGyIAXM9kvCmdHsI3TJBfXvY1kkhzOC2D"
		);
		
		//Requesting Tweets... and go!
		//Start of the first tweet //
		$url = 'https://api.twitter.com/1.1/statuses/show.json';
		$getfield = 'id=498194051980460032';
		$requestMethod = 'GET';

		$twitter = new TwitterAPIExchange($settings);
		$response = $twitter->setGetfield($getfield)
		->buildOauth($url, $requestMethod)
		->performRequest();
		
		$array_response = json_decode($response, true);
		//print_r($array_response);
		
		echo "<ul class='twitterList'>";
		$tweet = $array_response['text'];
		$user = $array_response['user']['name'];
		$screenName = $array_response['user']['screen_name'];
		$profile_image = $array_response['user']['profile_image_url'];
		$dateTime = $array_response['created_at'];
		
		echo "<li class='col-md-3 tweets'>";
			echo "<img src=\"".$profile_image."\" width=\"50px\" height=\"50px\" />";
			echo " <span class='user'><strong>$user</strong><br>";
			echo "<a href=\"http://twitter.com/$screenName\">@$screenName</a></span><br>";
			echo " <span class='tweet'>$tweet</span><br>";
			echo " $dateTime";
		
		//Start of the second tweet //
		$url = 'https://api.twitter.com/1.1/statuses/show.json';
		$getfield = 'id=498229501911121920';
		$requestMethod = 'GET';

		$twitter = new TwitterAPIExchange($settings);
		$response = $twitter->setGetfield($getfield)
		->buildOauth($url, $requestMethod)
		->performRequest();
		
		$array_response = json_decode($response, true);
		//print_r($array_response);
		
		$tweet = $array_response['text'];
		$user = $array_response['user']['name'];
		$screenName = $array_response['user']['screen_name'];
		$profile_image = $array_response['user']['profile_image_url'];
		$dateTime = $array_response['created_at'];
		
		echo "<li class='col-md-3 tweets'>";
			echo "<img src=\"".$profile_image."\" width=\"50px\" height=\"50px\" />";
			echo " <span class='user'><strong>$user</strong><br>";
			echo "<a href=\"http://twitter.com/$screenName\">@$screenName</a></span><br>";
			echo " <span class='tweet'>$tweet</span><br>";
			echo " $dateTime";
		
		// Start of the third tweet //
		$url = 'https://api.twitter.com/1.1/statuses/show.json';
		$getfield = 'id=498234677656711168';
		$requestMethod = 'GET';

		$twitter = new TwitterAPIExchange($settings);
		$response = $twitter->setGetfield($getfield)
		->buildOauth($url, $requestMethod)
		->performRequest();
		
		$array_response = json_decode($response, true);

		$tweet = $array_response['text'];
		$user = $array_response['user']['name'];
		$screenName = $array_response['user']['screen_name'];
		$profile_image = $array_response['user']['profile_image_url'];
		$dateTime = $array_response['created_at'];
		
		echo "<li class='col-md-3 tweets short'>";
			echo "<img src=\"".$profile_image."\" width=\"50px\" height=\"50px\" />";
			echo " <span class='user'><strong>$user</strong><br>";
			echo "<a href=\"http://twitter.com/$screenName\">@$screenName</a></span><br>";
			echo " <span class='tweet'>$tweet</span><br>";
			echo " $dateTime";
			echo "</li>";
		
		// Start of the fourth tweet //
		$url = 'https://api.twitter.com/1.1/statuses/show.json';
		$getfield = 'id=498240716766994432';
		$requestMethod = 'GET';

		$twitter = new TwitterAPIExchange($settings);
		$response = $twitter->setGetfield($getfield)
		->buildOauth($url, $requestMethod)
		->performRequest();
		
		$array_response = json_decode($response, true);

		$tweet = $array_response['text'];
		$user = $array_response['user']['name'];
		$screenName = $array_response['user']['screen_name'];
		$profile_image = $array_response['user']['profile_image_url'];
		$dateTime = $array_response['created_at'];
		
		echo "<li class='col-md-3 tweets'>";
			echo "<img src=\"".$profile_image."\" width=\"50px\" height=\"50px\" />";
			echo " <span class='user'><strong>$user</strong><br>";
			echo "<a href=\"http://twitter.com/$screenName\">@$screenName</a></span><br>";
			echo " <span class='tweet'>$tweet</span><br>";
			echo " $dateTime";
			echo "</li>";	
			
		// Start of the fifth tweet //
		$url = 'https://api.twitter.com/1.1/statuses/show.json';
		$getfield = 'id=498250997761052672';
		$requestMethod = 'GET';

		$twitter = new TwitterAPIExchange($settings);
		$response = $twitter->setGetfield($getfield)
		->buildOauth($url, $requestMethod)
		->performRequest();
		
		$array_response = json_decode($response, true);

		$tweet = $array_response['text'];
		$user = $array_response['user']['name'];
		$screenName = $array_response['user']['screen_name'];
		$profile_image = $array_response['user']['profile_image_url'];
		$dateTime = $array_response['created_at'];
		
		echo "<li class='col-md-3 tweets'>";
			echo "<img src=\"".$profile_image."\" width=\"50px\" height=\"50px\" />";
			echo " <span class='user'><strong>$user</strong><br>";
			echo "<a href=\"http://twitter.com/$screenName\">@$screenName</a></span><br>";
			echo " <span class='tweet'>$tweet</span><br>";
			echo " $dateTime";
			echo "</li>";	
		
		// Start of the sixth tweet //
		$url = 'https://api.twitter.com/1.1/statuses/show.json';
		$getfield = 'id=498257384863571968';
		$requestMethod = 'GET';

		$twitter = new TwitterAPIExchange($settings);
		$response = $twitter->setGetfield($getfield)
		->buildOauth($url, $requestMethod)
		->performRequest();
		
		$array_response = json_decode($response, true);

		$tweet = $array_response['text'];
		$user = $array_response['user']['name'];
		$screenName = $array_response['user']['screen_name'];
		$profile_image = $array_response['user']['profile_image_url'];
		$dateTime = $array_response['created_at'];
		
		echo "<li class='col-md-3 tweets'>";
			echo "<img src=\"".$profile_image."\" width=\"50px\" height=\"50px\" />";
			echo " <span class='user'><strong>$user</strong><br>";
			echo "<a href=\"http://twitter.com/$screenName\">@$screenName</a></span><br>";
			echo " <span class='tweet'>$tweet</span><br>";
			echo " $dateTime";
			echo "</li>";	
		echo "</ul>";
		?>
		</div>
		</div>
		</div>
		
		<div class="row">
		<div class="col-md-12">
		<p>See more tweets from that day <a href="https://twitter.com/search?q=police%20AND%20ferguson%20since%3A2014-08-09%20until%3A2014-08-10&src=typd" target="_blank">here</a>.</p>
		
		
		<?php
		/*foreach($array_response as $s) {
			$tweet = $s['text'];
			$user = $s['user']['name']; 
			$screenName= $s['user']['screen_name'];
			$profile_image = $s['user']['profile_image_url'];
			$dateTime = $s['created_at'];
			
			echo "<li class='col-md-3 tweets'>";
			echo "<img src=\"".$profile_image."\" width=\"50px\" height=\"50px\" />";
			echo " <span class='user'><strong>$user</strong><br>";
			echo "<a href=\"http://twitter.com/$screenName\">@$screenName</a></span><br>";
			echo " <span class='tweet'>$tweet</span><br>";
			echo " $dateTime";
			echo "</li>";
		}	*/
		
		echo "</ul>";
		
	  ?>
	<h2>The Shooting of Miriam Carey: October 3, 2013</h2>
	  <p>Miriam Carey, a 34 year old woman, was involved in an incident at the United States capitol. She drove from Stamford Connecticut to Washington, D.C. and ended up driving through a White House barrier and leading police officers and Secret Service officers on a chase. The chase ended in multiple shots being fired at her car and Miriam dying at the scene.</p>
	  
	  <?php
	  //Requesting Tweets... and go!
		//Start of the first tweet //
		$url = 'https://api.twitter.com/1.1/statuses/show.json';
		$getfield = 'id=385916805816287232';
		$requestMethod = 'GET';

		$twitter = new TwitterAPIExchange($settings);
		$response = $twitter->setGetfield($getfield)
		->buildOauth($url, $requestMethod)
		->performRequest();
		
		$array_response = json_decode($response, true);
		//print_r($array_response);
		
		echo "<ul class='twitterList'>";
		$tweet = $array_response['text'];
		$user = $array_response['user']['name'];
		$screenName = $array_response['user']['screen_name'];
		$profile_image = $array_response['user']['profile_image_url'];
		$dateTime = $array_response['created_at'];
		
		echo "<li class='col-md-3 tweets'>";
			echo "<img src=\"".$profile_image."\" width=\"50px\" height=\"50px\" />";
			echo " <span class='user'><strong>$user</strong><br>";
			echo "<a href=\"http://twitter.com/$screenName\">@$screenName</a></span><br>";
			echo " <span class='tweet'>$tweet</span><br>";
			echo " $dateTime";
			
		// Start of the second tweet //
		$url = 'https://api.twitter.com/1.1/statuses/show.json';
		$getfield = 'id=385875621634916352';
		$requestMethod = 'GET';

		$twitter = new TwitterAPIExchange($settings);
		$response = $twitter->setGetfield($getfield)
		->buildOauth($url, $requestMethod)
		->performRequest();
		
		$array_response = json_decode($response, true);

		$tweet = $array_response['text'];
		$user = $array_response['user']['name'];
		$screenName = $array_response['user']['screen_name'];
		$profile_image = $array_response['user']['profile_image_url'];
		$dateTime = $array_response['created_at'];
		
		echo "<li class='col-md-3 tweets'>";
			echo "<img src=\"".$profile_image."\" width=\"50px\" height=\"50px\" />";
			echo " <span class='user'><strong>$user</strong><br>";
			echo "<a href=\"http://twitter.com/$screenName\">@$screenName</a></span><br>";
			echo " <span class='tweet'>$tweet</span><br>";
			echo " $dateTime";
			echo "</li>";	
			
		// Start of the third tweet //
		$url = 'https://api.twitter.com/1.1/statuses/show.json';
		$getfield = 'id=385873426323632128';
		$requestMethod = 'GET';

		$twitter = new TwitterAPIExchange($settings);
		$response = $twitter->setGetfield($getfield)
		->buildOauth($url, $requestMethod)
		->performRequest();
		
		$array_response = json_decode($response, true);

		$tweet = $array_response['text'];
		$user = $array_response['user']['name'];
		$screenName = $array_response['user']['screen_name'];
		$profile_image = $array_response['user']['profile_image_url'];
		$dateTime = $array_response['created_at'];
		
		echo "<li class='col-md-3 tweets'>";
			echo "<img src=\"".$profile_image."\" width=\"50px\" height=\"50px\" />";
			echo " <span class='user'><strong>$user</strong><br>";
			echo "<a href=\"http://twitter.com/$screenName\">@$screenName</a></span><br>";
			echo " <span class='tweet'>$tweet</span><br>";
			echo " $dateTime";
			echo "</li>";
			echo "</ul>";
		?>
            </div>
      </div>
      <div class="row">
		<div class="col-md-12">
        <p>See more tweets from that day <a href="https://twitter.com/search?q=woman%20near%3A%22District%20of%20Columbia%2C%20USA%22%20within%3A15mi%20since%3A2013-10-03%20until%3A2013-10-04&src=typd" target="_blank">here</a>.</p>
    <br><br><br><br><br><br>
	</div>
	</div>
  </div>
</body>

<?php include ("footer.php"); ?>
	