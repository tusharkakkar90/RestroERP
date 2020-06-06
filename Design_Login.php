 <link rel="stylesheet" type="text/css" href="css/Login.css">
 <div class="container">
   <form method="post">
    <div class="container">
      <div class="imgcontainer">
        <img src="img/login.jpeg" alt="Avatar" class="avatar">
      </div>
  </div>

    <div class="container">
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
      <?php if($passsword_incorrect==1){ ?>
      <label>Incorrect Username and Password</label>
      <?php }else {} ?>
      <button type="submit" name="Login">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

  </form> 
</div>