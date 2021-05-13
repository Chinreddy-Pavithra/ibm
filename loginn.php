<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Philosopher&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="signstyle.css">
</head>
<body>
    <div class="header">
	   <h2>Log in</h2>
	</div>
<form method="post" action="loginn.php">
  <?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
	<div class="input-group">
	  <label>Customer Id:</label>
	  <input type="text" name="custid" title="Enter customer id" required>
	</div>
	<div class="input-group">
	  <label>Password:</label>
	  <input type="password" name="password" required>
	</div>
<div class="input-group">
	 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <button type="submit" name="login_user" id="log" class="btn">Login</button>
	 &emsp;&emsp;&emsp;&emsp; <button type="submit" name="createaccount" class="btn"><a href="index.php">Back</a></button>

	</div>
    <p>
	Don't have an account?&nbsp;&nbsp;&nbsp;&nbsp;<a href="signn.html">Sign Up</a>
	</p>
</form>
</body>
</html>

