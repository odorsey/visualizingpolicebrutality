<?php
include("header.php");
?> 

<!-- Google analytics code -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-39247935-4', 'auto');
  ga('send', 'pageview');

</script>

<?php
		if (isset($_POST["submit"])) {
			$name = strip_tags(htmlentities($_POST['name']));
			$email = strip_tags(htmlentities($_POST['email']));
			$message = strip_tags(htmlentities($_POST['message']));
			$from = 'Visualizing Police Brutality Contact Form'; 
			$to = 'oddorsey@gmail.com'; 
			$subject = strip_tags(htmlentities($_POST['subject']));
			 
			$body = "From: $name\n E-Mail: $email\n $message";
			
			// Check if name has been entered
				if (!$_POST['name']) {
					$errName = 'Please enter your first and last name';
				}
				
				// Check if email has been entered and is valid
				if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
					$errEmail = 'Please enter a valid email address';
				}
				
				//Check if message has been entered
				if (!$_POST['message']) {
					$errMessage = 'Please enter a message';
				}
				
				//Check if message has been entered
				if (!$_POST['subject']) {
					$errSubject = 'Please enter a subject for this message';
				}
			   
			   if (!$errName && !$errEmail && !$errMessage && !$errSubject) {
					if (mail ($to, $subject, $body, $from)) {
						$result='<div class="alert alert-success col-md-6">Your email has been sent. Thanks! I will respond as soon as I can.</div>';
					} else {
						$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again.</div>';
					}
				}
		}
?>
			<div class="container">
				<div class="row">
					<h3>Contact me</h3>
					<p>Want to help work on Visualizing Police Brutality? Request an edit to the site's information? Or just want to tell me what you think? Feel free to contact me below. However, you may also want to check out the <a href="questions.php">Frequently Asked Questions</a> page to see if your question has already been answered.</p>
					<form class="form-horizontal" role="form" method="post" action="contact.php">
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label">Name</label>
							<div class="col-sm-10 col-md-5">
								<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
								<?php echo "<p class='text-danger'>$errName</p>";?>
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10 col-md-5">
								<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
								<?php echo "<p class='text-danger'>$errEmail</p>";?>
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-sm-2 control-label">Subject</label>
							<div class="col-sm-10 col-md-5">
							<input type="text" class="form-control" id="subject" name="subject" placeholder="Message Subject" value="<?php echo htmlspecialchars($_POST['subject']); ?>">
								<?php echo "<p class='text-danger'>$errSubject</p>";?>
							</div>
						</div>
							
						<div class="form-group">
							<label for="message" class="col-sm-2 control-label">Message</label>
							<div class="col-sm-10 col-md-5">
								<textarea class="form-control" rows="6" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
								<?php echo "<p class='text-danger'>$errMessage</p>";?>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-2">
								<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-2">
								<?php echo $result; ?>	
							</div>
						</div>
					</form> 
				</div>
			</div>
<?php
include("footer.php");
?>