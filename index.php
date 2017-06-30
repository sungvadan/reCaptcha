<?php
  include('ReCaptcha.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php
      if(!empty($_POST)){
        $captcha = new ReCaptcha();
        $isValid = $captcha->isValid($_POST['g-recaptcha-response']);
        if(!$isValid){
        ?>
          <div class="alert alert-danger">
            Captcha non valide
          </div>

        <?php
        }
      }
      
    ?>
    <div class="col-xs-6">
      <form method="POST" id="demo-form">
       
        <div class="form-group">
            <label for="emailaddress">Email</label>
            <input type="text" name="email" id="emailaddress" class="form-control">
        </div>
         <button
          class="g-recaptcha"
          data-sitekey="6LeehCcUAAAAAIQNvf2g0NWIt1S9Ea2OyvA0JTk8"
          data-callback="onSubmit">
          Submit
        </button>
      </form>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      function onSubmit(token) {
         document.getElementById("demo-form").submit();
       }

    </script>
  </body>
</html>
