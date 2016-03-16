<html>
<head>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="./js/survey.js"></script>
<script>var total={{length}}; </script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<title>Survey!</title>
<body>
  <div class="container">
    <h1>This is the Survey</h1>
    <p id="errors" class="alert-danger"></p>    
    <form action="submit.php" method="post">
        <button id="next" type="submit">Start!</button>
    </form>
  </div>
</body>
</html>
