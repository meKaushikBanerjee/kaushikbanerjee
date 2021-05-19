<?php  
include("includes/main.php"); 
if(isset($_POST['login']))
{
    $uname=strtoupper(($_POST['username']));
    $password=$_POST['password']; 
    $sql ="SELECT adminid,password FROM admin WHERE email=:uname and password=:password";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':uname', $uname, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetch();
    if($query->rowCount() > 0)
    {
      /*$validPassword = password_verify($password, $results['password']);
      if($validPassword)
      {*/
        $_SESSION['login']=$results['adminid'];
        $_SESSION['alogin']=$_POST['username'];
        $_SESSION['alogged'] = time();
        echo "<script>alert('Successfully logged in');</script>";
        echo '<script>window.location.replace("account.php")</script>';
      /*}
      else
      {
        echo "<script>alert('Wrong Password! Kindly check the password');</script>";
      }*/
    } 
    else
    {
        echo "<script>alert('Please enter correct email or password!');</script>";
    }
}
?>

<body>
  <h1 class="brand-admin-login">Portfolio</h1>
  <div class="container">
    <div class="text-center">
        <div class="card">
          <form class="form-signin" name="form1" action="" method="POST">
              <h1 class="h3 mb-3 font-weight-bold">Admin</h1>

              <input type="text" name="username" id="inputusername" class="form-control" placeholder="Registered Email Id" required>

              <input type="password" name="password" id="inputpassword" class="form-control" placeholder="Password" required>

              <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me" required> Remember me
                </label>
              </div>

              <button class="btn btn-lg btn-primary btn-block" name="login" type="submit" onclick="return validation();">Login</button>

              <a href="register.php" class="btn btn-md btn-primary">Click here to register</a>

              <p class="mt-5 mb-3 text-muted">&copy; 2021 by Kaushik Banerjee</p>
          </form>   
        </div>
    </div>
  </div>
</body>
</html>
