<?php
	$error = ""; 
	$successMsg = "";
	if ($_POST) {
		

		if(!$_POST["email"]){
			$error .= "<p class='alert alert-danger'>The email field is required</p>";
		}
		if(!$_POST["content"]){
			$error .= "<p class='alert alert-danger'>The content field is required</p>";
		}
		if(!$_POST["subject"]){
			$error .= "<p class='alert alert-danger'>The subject field is required</p>";
		}

		if ($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
  			$error .= "<p class='alert alert-danger'>The email address is invalid.</p>";
		}

		if($error != ""){
			$error = $error;
		}else{
			$emailTo = "darshitvagadiya@yahoo.com";

			$subject = $_POST['subject'];

			$content = $_POST['content'];

			$headers = "From: ".$_POST['email'];

			if(mail($emailTo, $subject, $content, $headers)){
				$successMsg = "<p class='alert alert-success'>Your message was sent we will get back to you ASAP!</p>";
			}else{
				$error .= "<p class='alert alert-danger'>Your mail could not be sent. Please try again later.</p>";
			}
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>
  <body>

  	<div class="container">
  		<h1>Get in touch</h1>
  		<div id="error"><? echo $error.$successMsg; ?></div>
  		<form method="post"> 
		  <div class="form-group">
		    <label for="email">Email address</label>
		    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email">
		    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		  </div>
		  <div class="form-group">
		    <label for="subject">Subject</label>
		    <input type="text" class="form-control" name="subject" id="subject">
		  </div>
		  <div class="form-group">
		    <label for="content">What would you like to ask us?</label>
		    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
		  </div>
		  <button type="submit" id="submit" class="btn btn-primary">Submit</button>
		</form>
  	</div>
    
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <script type="text/javascript">
    	$("form").submit(function(e){
    		

    		var error = "";

    		if($('#email').val() == ""){
    			error += "<p class='alert alert-danger'>The email field is required</p>";
    		}

    		if($('#subject').val() == ""){
    			error += "<p class='alert alert-danger'>The subject field is required</p>";
    		}

    		if($('#content').val() == ""){
    			error += "<p class='alert alert-danger'>The content field is required</p>";
    		}

    		if(error != ""){
    			$('#error').html(error);
    			return false;
    		}else{
    			return true;
    		}
    	});
    </script>
  </body>
</html>