<?php 

$error = ""; 

$successMessage = "";

if ($_POST) {

  if (!$_POST["email"]) {

    $error .= "An email address is required here. <br>";

  }

  if (!$_POST["subject"]) {

    $error .= "The subject is required here. <br>";

  }

  if (!$_POST["content"]) {

    $error .= "The content is required here. <br>";

  }

  if ($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
  
      $error .= $_POST["email"].'is invalid.<br>';

  } 

  if ($error != "") {  

            $error = '<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' . $error . '</div>';
          } 

  } else {

    $emailTo = "me@chanvn.com";

    $subject = $_POST['subject'];

    $content = $_POST['content'];

    $headers = "From: ".$_POST['email'];

    if (mail($emailTo, $subject, $content, $headers)) {

        $successMessage = '<div class="alert alert-success" role="alert"> Your message has been sent.Thank you! </div>';

    } else {

      $error = '<div class="alert alert-danger" role="alert"> Your message could not be sent. Please try again </div>';
    }

  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">

    <h1>Get in touch!</h1>
      
      <div id="error"> <? echo $error.$successMessage; ?> </div>

      <form method="post" >
        <div class="form-group" >
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" name= "email" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="subject">Subject</label>
          <input type="text" class="form-control" id="subject" name="subject" rows="3">
        </div>
        
        <div class="form-group">
          <label for="exampleTextarea">What would you like to ask us?</label>
          <textarea class="form-control" id="content" name="content" rows="3"></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>  

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $("form").submit(function(e) {
              
              var error = "";
              
              if ($("#email").val() == "") {
                  
                  error += "The email field is required.<br>"
                  
              }
              
              if ($("#subject").val() == "") {
                  
                  error += "The subject field is required.<br>"
                  
              }
              
              if ($("#content").val() == "") {
                  
                  error += "The content field is required.<br>"
                  
              }
              
              if (error != "") {
                  
                 $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');
                  
                  return false;
                  
              } else {
                  
                  return true;
                  
              }
      


    </script>
  </body>
</html>

