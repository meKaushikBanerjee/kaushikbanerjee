<?php 
include('includes/mainheader.php');
if(isset($_POST['create']))
{
  $id=$_POST['id'];
  $name=$_POST['name'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $avail=$_POST['avail'];
  $desig=$_POST['desig'];
  $details=$_POST['details'];
  $sql="INSERT into aboutme(id,name,email,mobile,availability,designation,details,resume) values(:id,:name,:email,:mobile,:avail,:desig,:details,:resume)";
  $query = $dbh->prepare($sql);  
  $query->bindParam(':id',$id,PDO::PARAM_STR);
  $query->bindParam(':name',$name,PDO::PARAM_STR);
  $query->bindParam(':email',$email,PDO::PARAM_STR);
  $query->bindParam(':mobile',$mobile,PDO::PARAM_STR);  
  $query->bindParam(':avail',$avail,PDO::PARAM_STR);
  $query->bindParam(':desig',$desig,PDO::PARAM_STR);
  $query->bindParam(':details',$details,PDO::PARAM_STR);
  $query->bindParam(':resume',$resume,PDO::PARAM_STR);
  if($query->execute())
  {
    $_SESSION['msg']="Records created Successfully!!";         
  }
  else
  {
    echo "<script>alert('Records could not be created');</script>";
  }
}
if(isset($_POST['update']))
{
  $id=$_POST['id'];
  $name=$_POST['name'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $avail=$_POST['avail'];
  $desig=$_POST['desig'];
  $details=$_POST['details'];
  $sql="UPDATE aboutme SET name=:name,email=:email,mobile=:mobile,availability=:avail,designation=:desig,details=:details,resume=:resume WHERE id=:id";
  $query = $dbh->prepare($sql);  
  $query->bindParam(':id',$id,PDO::PARAM_STR);
  $query->bindParam(':name',$name,PDO::PARAM_STR);
  $query->bindParam(':email',$email,PDO::PARAM_STR);
  $query->bindParam(':mobile',$mobile,PDO::PARAM_STR);  
  $query->bindParam(':avail',$avail,PDO::PARAM_STR);
  $query->bindParam(':desig',$desig,PDO::PARAM_STR);
  $query->bindParam(':details',$details,PDO::PARAM_STR);
  $query->bindParam(':resume',$resume,PDO::PARAM_STR);
  if($query->execute())
  {
    $_SESSION['msg']="Details Update Successfully!!";         
  }
  else
  {
    echo "<script>alert('Records could not be updated');</script>";
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

                      <form class="form-horizontal row-fluid" method="POST">
                        <div class="hr-dashed"></div>
                        <?php 
                          $id=$_SESSION['login'];
                          $sql="SELECT * from aboutme where id=:id";
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
                              <label class="col-sm-3 control-label">Name</label>
                              <div class="col-sm-8">
                                <input type="text" name="name" id="name" class="form-control" value="<?php if($results['name']){echo $results['name']; }?>" required>
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
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-3 control-label">Details</label>
                              <div class="col-sm-8">
                                <textarea name="details" id="details" class="widgEditor" cols="20" rows="10"><?php if($results['details']){echo $results['details']; }?></textarea>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-3 control-label">Upload Resume</label>
                              <div class="col-sm-8">
                                <input type="file" name="resume" id="resume" class="form-control">
                                </select>
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