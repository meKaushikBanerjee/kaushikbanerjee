<?php 
include('includes/mainheader.php'); 
if(isset($_SESSION['alogin'],$_SESSION['alogged']) && (time() - $_SESSION['alogged'] > 5*60))
{
  session_unset(); // unset $_SESSION variable for the run-time
  session_destroy(); // destroy session data in storage
  echo '<script>alert("You have been idle for 5 minutes");</script>';
  echo '<script>window.location.replace("logout.php");</script>';
}
else
{
  $_SESSION['alogged'] = time();
}

if(isset($_POST['update']))
{
  $jid=$_POST['jid'];
  $jtitle=strtoupper($_POST['jtitle']);
  $jtype=strtoupper($_POST['jtype']);
  $jcountry=strtoupper($_POST['jcountry']);
  $jstate=strtoupper($_POST['jstate']);
  $jrole=$_POST['jrole'];  
  $jqualify=$_POST['jqualify'];

  $sql="UPDATE createjob set jobtitle=:jtitle,jobtype=:jtype,jobcountry=:jcountry,jobstate=:jstate,jobrole=:jrole,jobqualification=:jqualify where jobid=:jid";
  $query = $dbh->prepare($sql);
  $query->bindParam(':jid',$jid,PDO::PARAM_STR);
  $query->bindParam(':jtitle',$jtitle,PDO::PARAM_STR);
  $query->bindParam(':jtype',$jtype,PDO::PARAM_STR);
  $query->bindParam(':jcountry',$jcountry,PDO::PARAM_STR);  
  $query->bindParam(':jstate',$jstate,PDO::PARAM_STR);
  $query->bindParam(':jrole',$jrole,PDO::PARAM_STR);
  $query->bindParam(':jqualify',$jqualify,PDO::PARAM_STR);
  if($query->execute())
  {
    $_SESSION['msg']="Job Post Updated Successfully!!";         
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

<?php 
    include('includes/sidebar.php');
?>
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">          
            <h2 class="page-title">Update Job Post</h2>
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-primary">
                  <div class="panel-heading">Update Job Post</div>
                    <div class="panel-body">
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

                      <form method="post" class="form-horizontal">

                        <div class="hr-dashed"></div>
                        <?php 
                          $id=$_GET['id'];
                          $sql="SELECT * from createjob where jobid=:id";
                          $query = $dbh->prepare($sql);
                          $query->bindParam(':id',$id,PDO::PARAM_STR);
                          $query->execute();
                          $results=$query->fetchAll(PDO::FETCH_OBJ);
                          if($query->rowCount() > 0)
                          {
                            foreach($results as $result)
                            {
                        ?>
                              <div class="form-group">
                                <label class="col-sm-3  control-label">Job Title</label>
                                <div class="col-sm-8">
                                  <input type="text" name="jid" class="form-control" value="<?php echo $result->jobid; ?>" readonly>
                                  </select>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="col-sm-3  control-label">Job Title</label>
                                <div class="col-sm-8">
                                  <input type="text" name="jtitle" id="jtitle" class="form-control" value="<?php echo $result->jobtitle; ?>" required>
                                  </select>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="col-sm-3  control-label">Job Type</label>
                                <div class="col-sm-8">
                                  <input type="text" name="jtype" value="<?php echo $result->jobtype; ?>" class="form-control" required>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="col-sm-3  control-label">Job Country</label>
                                <div class="col-sm-8">
                                  <input type="text" name="jcountry" value="<?php echo $result->jobcountry; ?>" class="form-control" required>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="col-sm-3  control-label">Job State</label>
                                <div class="col-sm-8">
                                  <input type="text" name="jstate" value="<?php echo $result->jobstate; ?>" class="form-control" required>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="col-sm-3  control-label">Job Role</label>
                                <div class="col-sm-8">
                                  <textarea name="jrole" class="widgEditor"  class="form-control" cols="20" rows="10" required><?php echo $result->jobrole; ?></textarea>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="col-sm-3  control-label">Job Qualification</label>
                                <div class="col-sm-8">
                                  <textarea name="jqualify" class="form-control widgEditor" cols="20" rows="10" required><?php echo $result->jobqualification; ?></textarea>
                                </div>
                              </div>

                              <div class="col-sm-8 col-sm-offset-5">
                                <input class="btn btn-primary" type="submit" name="update" value="Update Job Post">
                              </div>
                        <?php
                            }
                          }
                        ?>
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