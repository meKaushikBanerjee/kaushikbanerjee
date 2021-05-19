<?php  
include("includes/main.php"); 
if(isset($_POST['register']))
{
  /*function random_strings($length_of_string) 
  { 
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz!@#$%^&*()_+/-';
    return substr(str_shuffle($str_result),0,$length_of_string);    
  }*/
  function random_id_strings($length_of_string)
  {
    $str_id = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    return substr(str_shuffle($str_id),0,$length_of_string);
  }
  /*$randno = random_strings(10);*/ 
  $randid = random_id_strings(6);
  /*$options = ['i' => $randno];*/

  $sql="SELECT * from admin";
  $query = $dbh->prepare($sql);
  $query->execute();
  $row=$query->rowCount();
  if($row>=0)
  {
    $row += 1;
    $id="ADM_".$row.$randid;
  }
  $name=strtoupper($_POST['name']);
  $mobile=strtoupper($_POST['mobile']);
  $email=$_POST['email'];
  $encpass=$_POST['password'];  
  /*$encpass = password_hash($encpass, PASSWORD_BCRYPT, $options);*/
  $sql="INSERT INTO admin(name,mobile,adminid,email,password) VALUES(:name,:mobile,:id,:email,:encpass)";
  $query = $dbh->prepare($sql);
  $query-> bindParam(':name', $name, PDO::PARAM_STR);
  $query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);    
  $query-> bindParam(':id', $id, PDO::PARAM_STR);
  $query->bindParam(':email',$email,PDO::PARAM_STR);    
  $query->bindParam(':encpass',$encpass,PDO::PARAM_STR);
  if($query->execute())
  {
    echo "<script>alert('Account created successfully!');</script>";
    echo '<script>window.location.replace("login.php")</script>';
  } 
  else
  {
    echo "<script>alert('Invalid Details');</script>";
  }
}
?>

<script type="text/javascript">
  function createCaptcha() {
    //clear the contents of captcha div first 
    document.getElementById('captcha').innerHTML = "";
    var charsArray="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    var lengthOtp = 6;
    var captcha = [];
    for (var i = 0; i < lengthOtp; i++) {
        //below code will not allow Repetition of Characters
        var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
        if (captcha.indexOf(charsArray[index]) == -1)
          captcha.push(charsArray[index]);
        else i--;
    }   
    document.getElementById("cap").value = captcha.join("");
  }

  function validation() {
    if(document.form1.chk.value=="") {
      document.getElementById("error").style.display="block";
      document.getElementById("error").innerHTML="Enter Captcha!";
      document.form1.chk.focus();
      return false;
    }
    else if(document.form1.ran.value!=document.form1.chk.value) {
      document.getElementById("error").style.display="block";
      document.getElementById("error").innerHTML="Captcha Not Matched!";
      document.form1.chk.focus();
      return false;
    }
    else if(document.form1.ran.value==document.form1.chk.value) {
      document.getElementById("error").style.display="none";
      return true;
    }
    return true;
  }

  function chkpswd() {
    if(document.form1.repassword.value!=document.form1.password.value) {
      document.getElementById("errorpassword").style.display="block";
      document.getElementById("errorpassword").innerHTML="Password not Matching!";
      document.form1.repassword.focus();
      return false;
    }
    else if(document.form1.repassword.value==document.form1.password.value) {
      document.getElementById("errorpassword").style.display="none";
      return true;
    }
    return true;
  }
</script>

<body onload="createCaptcha();">
  <h1 class="brand-admin-login">Job Portal</h1>
  <div class="container">
    <div class="text-center">
      <div class="card">
        <form class="form-signin" name="form1" action="" method="POST">
          <h1 class="h3 mb-3 font-weight-bold">Register Account</h1>

          <input type="text" name="name" id="inputname" class="form-control" placeholder="Full Name" onkeypress="return validname(event);" required>

          <input type="text" name="mobile" id="inputmobile" class="form-control" placeholder="Mobile Number" minlength="10" maxlength="10" onkeypress="return validmob(event);" required>

          <input type="email" name="email" id="inputemail" class="form-control" placeholder="Email address" required>

          <input type="password" name="password" id="inputpassword" class="form-control" placeholder="Password" required>

          <input type="password" name="repassword" id="inputrepassword" class="form-control" placeholder="Confirm Password Entered" required onchange="return chkpswd();">
          <span id="errorpassword" class="error-color"></span>

          <div id="captcha"></div>
          <input type="text" id="cap" name="ran" class="captcha-image form-control-captcha" readonly>
          <input type="button" class="reload-button" id="btnrefresh" value="Refresh" onclick="createCaptcha()"><br>
          <input type="text" placeholder="Enter Captcha" name="chk" id="cpatchaTextBox" class="form-control" required>  
          <span id="error" class="error-color"></span>

          <button class="btn btn-lg btn-primary btn-block" name="register" type="submit" onclick="return validation();">Register</button>
          <a href="login.php" class="btn btn-md btn-primary" style="letter-spacing: 2px;" class="register-link form-control">Click here to login</a>
          
          <p class="mt-5 mb-3 text-muted">&copy; 2021 by Kaushik Banerjee</p>
        </form>   
      </div>
    </div>
  </div>
</body>
</html>