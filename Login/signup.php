<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
      <div class="container">
      <div class="form-container">

          <h2>Create an Account</h2>
          <p>Join our photography community</p>
          <form id="signupForm" action="signup-check.php" method="post" >
          <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

           <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="name" 
                      placeholder="Full Name"
                      value="<?php echo $_GET['name']; ?>"><br><br>
          <?php }else{ ?>
               <input type="text" 
                      name="name" 
                      id="signupName"
                      placeholder="Name" required><br><br>

          <?php }?>

           <?php if (isset($_GET['uname'])) { ?>
               <input type="email" 
                      name="email" 
                      placeholder="Email"
                      id="signupEmail"
                      value="<?php echo $_GET['uname']; ?>"><br><br>
          <?php }else{ ?>
               <input type="email" 
                      name="email" 
                      placeholder="Email" required><br><br>
          <?php }?>

          <input type="password" 
                 name="password" 
                 id="signupPassword"
                 placeholder="Password" required><br><br>

            <button type="submit">Sign Up</button>
          </form>
          <p class="toggle-text">
            Already have an account? <a href="index.php" id="showLogin">Login</a>
          </p> 
          <br>
          <br>

    <a href="../Game/Game.html" id="game-button">Enjoy the Game</a>

      </div>
      </div>
</body>
</html>
      

          
    
     