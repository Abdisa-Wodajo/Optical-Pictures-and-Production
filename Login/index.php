<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
   <div class="container">
      <div class="form-container">
  <div class="form login-form">
          <h2>Welcome Back!</h2>
          <p>Login to access your account</p>
          <form id="loginForm" action="login.php" method="post">
            <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
            <input type="email" id="loginEmail" name="email" placeholder="Email" required />
            <br />
            <br />
            <input
              type="password"
              id="loginPassword"
              name="password"
              placeholder="Password"
              required
            />
            <br />
            <br />
            <button type="submit">Login</button>
          </form>
          <p class="toggle-text">
            Don't have an account? <a href="signup.php" id="showSignup">Sign Up</a>
          </p>
          <br>
          <br>

          <a href="../Game/Game.html" id="game-button">Enjoy the Game</a>
        </div> 
      </div>
   </div>
   

     
</body>
</html>