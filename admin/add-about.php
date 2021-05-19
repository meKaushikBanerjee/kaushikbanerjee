<?php 
include('includes/mainheader.php');
if(isset($_POST['create']))
{
  $id=$_POST['id'];
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $add=$_POST['add'];
  $nation=$_POST['nation'];
  $lang=$_POST['lang'];
  $dob=$_POST['dob'];
  $avail=$_POST['avail'];
  $desig=$_POST['desig'];
  $details=$_POST['details'];
  $file=$_FILES['resume']['name'];
  $size_file=$_FILES['resume']['size'];
  $file_ext=explode('.',$file);
  $fileext=$file_ext[1];
  $newfilename=$id.".".$fileext;
  $extensions= array("pdf","doc","docx");
      
  if(in_array($fileext,$extensions)==true)
    {
      if($size_file<=1048576)
      {
        $dir="uploads/resume/";
        if(!is_dir($dir))
        {
          mkdir("uploads/resume/");
        }
        $filepath="uploads/resume/".$newfilename;
        move_uploaded_file($_FILES["resume"]["tmp_name"],"uploads/resume/".$newfilename);
      $sql="INSERT into aboutme(id,firstname,lastname,email,mobile,address,dob,nationality,language,availability,designation,details,resume) values(:id,:fname,:lname,:email,:mobile,:add,:dob,:nation,:lang,:avail,:desig,:details,:filepath)";
      $query = $dbh->prepare($sql);  
      $query->bindParam(':id',$id,PDO::PARAM_STR);
      $query->bindParam(':fname',$fname,PDO::PARAM_STR);
      $query->bindParam(':lname',$lname,PDO::PARAM_STR);
      $query->bindParam(':email',$email,PDO::PARAM_STR);
      $query->bindParam(':mobile',$mobile,PDO::PARAM_STR); 
      $query->bindParam(':add',$add,PDO::PARAM_STR);
      $query->bindParam(':dob',$dob,PDO::PARAM_STR);
      $query->bindParam(':nation',$nation,PDO::PARAM_STR);
      $query->bindParam(':lang',$lang,PDO::PARAM_STR); 
      $query->bindParam(':avail',$avail,PDO::PARAM_STR);
      $query->bindParam(':desig',$desig,PDO::PARAM_STR);
      $query->bindParam(':details',$details,PDO::PARAM_STR);
      $query->bindParam(':filepath',$filepath,PDO::PARAM_STR);
      if($query->execute())
      {
        $_SESSION['msg']="Records created Successfully!!";         
      }
      else
      {
        echo "<script>alert('Records could not be created');</script>";
      }
    }
    else
    {
      echo '<script>alert("Please upload only files < or = 1mb");</script>';
    }
  }
  else
  {
    echo '<script>alert("Please upload only jpeg,jpg,png file formats");</script>';
  }
}
if(isset($_POST['update']))
{
  $id=$_POST['id'];
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $add=$_POST['add'];
  $nation=$_POST['nation'];
  $lang=$_POST['lang'];
  $dob=$_POST['dob'];
  $avail=$_POST['avail'];
  $desig=$_POST['desig'];
  $details=$_POST['details'];
  if(isset($_FILES['resume']['name']))
  {
    $file=$_FILES['resume']['name'];
    $size_file=$_FILES['resume']['size'];
    $file_ext=explode('.',$file);
    $fileext=$file_ext[1];
    $newfilename=$id.".".$fileext;
    $extensions= array("pdf");
        
    if(in_array($fileext,$extensions)==true)
    {
      if($size_file<=1048576)
      {
        $dir="uploads/resume/";
        if(!is_dir($dir))
        {
          mkdir("uploads/resume/");
        }
        $filepath="uploads/resume/".$newfilename;
        move_uploaded_file($_FILES["resume"]["tmp_name"],"uploads/resume/".$newfilename);
      }
      else
      {
        echo '<script>alert("Please upload only files < or = 1mb");</script>';
      }
    }
    else
    {
      echo '<script>alert("Please upload only jpeg,jpg,png file formats");</script>';
    }
  }
  $sql="UPDATE aboutme SET email=:email,mobile=:mobile,address=:add,availability=:avail,designation=:desig,nationality=:nation,language=:lang,details=:details,resume=:filepath WHERE adminid=:id";
  $query = $dbh->prepare($sql);   
  $query->bindParam(':id',$id,PDO::PARAM_STR); 
  $query->bindParam(':email',$email,PDO::PARAM_STR);
  $query->bindParam(':mobile',$mobile,PDO::PARAM_STR); 
  $query->bindParam(':add',$add,PDO::PARAM_STR);
  $query->bindParam(':nation',$nation,PDO::PARAM_STR);
  $query->bindParam(':lang',$lang,PDO::PARAM_STR);   
  $query->bindParam(':avail',$avail,PDO::PARAM_STR);
  $query->bindParam(':desig',$desig,PDO::PARAM_STR);
  $query->bindParam(':details',$details,PDO::PARAM_STR);
  $query->bindParam(':filepath',$filepath,PDO::PARAM_STR);
  if($query->execute())
  {
    $_SESSION['msg']="Details Update Successfully!!";
  }
  else
  {
    $_SESSION['msg']="Records could not be created!!";
  }
}
?>

<body>

<?php include("includes/header.php");?>
  
  <div class="ts-main-content">

  <style type="text/css" media="all">
    @import "css/info.css";
    @import "css/main.css";
    @import "css/widgEditor.css";
  </style>

  <script type="text/javascript" src="scripts/widgEditor.js"></script>
  
<?php include('includes/sidebar.php'); ?>

    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">          
            <h2 class="page-title">About Me</h2>
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-primary">
                  <div class="panel-heading">About Me</div>
                    <div class="panel-body">
                      <?php 
                        if(isset($_POST['create']))
                        { 
                      ?>
                        <div class="alert alert-error" style="color: green;">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                            <?php echo htmlentities($_SESSION['msg']); ?>
                            <?php echo htmlentities($_SESSION['msg']=""); ?>
                        </div>
                      <?php 
                        }
                      ?>
                      <?php 
                        if(isset($_POST['update']))
                        { 
                      ?>
                        <div class="alert alert-error" style="color: green;">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                            <?php echo htmlentities($_SESSION['msg']); ?>
                            <?php echo htmlentities($_SESSION['msg']=""); ?>
                        </div>
                      <?php 
                        }
                      ?>

                      <form class="form-horizontal row-fluid" method="POST" enctype="multipart/form-data">
                        <div class="hr-dashed"></div>
                        <?php 
                          $id=$_SESSION['login'];
                          $sql="SELECT * from aboutme where adminid=:id";
                          $query = $dbh->prepare($sql);
                          $query->bindParam(':id',$id,PDO::PARAM_STR);
                          $query->execute();
                          $results=$query->fetch();
                        ?>
                            <div class="form-group">
                              <label class="col-sm-3 control-label">Id</label>
                              <div class="col-sm-8">                            
                                <input type="text" name="id" value="<?php echo $id; ?>" class="form-control" readonly>                
                                </select>
                              </div>
                            </div>
                                              
                            <div class="form-group">
                              <label class="col-sm-3 control-label">First Name</label>
                              <div class="col-sm-8">
                                <input type="text" name="fname" id="fname" class="form-control" value="<?php if($results['firstname']){echo $results['firstname']; }?>" readonly>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-3 control-label">Last Name</label>
                              <div class="col-sm-8">
                                <input type="text" name="lname" id="lname" class="form-control" value="<?php if($results['lastname']){echo $results['lastname']; }?>" readonly>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-3 control-label">Email</label>
                              <div class="col-sm-8">
                                <input type="text" name="email" class="form-control" value="<?php if($results['email']){echo $results['email']; }?>" required>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-3 control-label">Mobile</label>
                              <div class="col-sm-8">
                                <input type="text" name="mobile" class="form-control" value="<?php if($results['mobile']){echo $results['mobile']; }?>" required>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-3 control-label">Address</label>
                              <div class="col-sm-8">
                                <input type="text" name="add" id="add" class="form-control" value="<?php if($results['address']){echo $results['address']; }?>" required>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-3 control-label">Date of Birth</label>
                              <div class="col-sm-8">
                                <input type="text" name="dob" id="dob" class="form-control" value="<?php if($results['dob']){echo $results['dob']; }?>" readonly>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-3 control-label">Nationality</label>
                              <div class="col-sm-8">
                                <input type="text" name="nation" class="form-control" value="<?php if($results['nationality']){echo $results['nationality']; }?>" required>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-3 control-label">Languages</label>
                              <div class="col-sm-8">
                                <input type="text" name="lang" class="form-control" value="<?php if($results['language']){echo $results['language']; }?>" required>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-3 control-label">Availability</label>
                              <div class="col-sm-8">
                                <select name="avail" class="form-control">
                                  <?php if($results['availability']){echo '<option value="'.$results['availability'].'">'.$results['availability'].'</option>'; }?> 
                                  <option>Select</option>
                                  <option value="Freelancer">Freelancer</option>
                                  <option value="Full-time Employee">Full-time Employee</option>
                                  <option value="Part-time Employee">Part-time Employee</option>
                                  <option value="Remote Employee">Remote Employee</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-3 control-label">Designation</label>
                              <div class="col-sm-8">
                                <input type="text" name="desig" id="desig" class="form-control" value="<?php if($results['designation']){echo $results['designation']; }?>" required>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-3 control-label">Details</label>
                              <div class="col-sm-8">
                                <textarea name="details" id="details" class="widgEditor" cols="20" rows="10"><?php if($results['details']){echo $results['details']; }?></textarea>
                              </div>
                            </div>

                            <?php
                              if($results['resume']!="")
                              {
                            ?>
                            <div class="form-group">
                              <label class="col-sm-3 control-label">My Resume</label>
                              <div class="col-sm-8">
                                <a href="<?php echo $results['resume']; ?>"><i class="fa fa-download" style="margin-top: 15px;"></i> Download resume</a>
                              </div>
                            </div>
                            <?php
                              }
                            ?>

                            <div class="form-group">
                              <label class="col-sm-3 control-label">Upload Resume</label>
                              <div class="col-sm-8">
                                <input type="file" name="resume" id="resume" class="form-control">
                              </div>
                            </div>

                            <div class="col-sm-4 col-sm-offset-3">
                              <input class="btn btn-primary" type="submit" name="create" value="Create">
                            </div>
                            <div class="col-sm-3">
                              <input class="btn btn-primary" type="submit" name="update" value="Update">
                            </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  
      </div>
    </div>
  </div>

<?php include('includes/footer.php'); ?>