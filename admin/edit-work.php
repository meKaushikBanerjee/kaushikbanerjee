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

if(isset($_POST['create']))
{
  $jid=strtoupper($_POST['jid']);
  $jtitle=strtoupper($_POST['jtitle']);
  $jtype=strtoupper($_POST['jtype']);
  $jcountry=strtoupper($_POST['jcountry']);
  $jstate=strtoupper($_POST['jstate']);
  $jrole=$_POST['jrole'];  
  $jqualify=$_POST['jqualify'];

  $sql="INSERT into createjob(jobid,jobtitle,jobtype,jobcountry,jobstate,jobrole,jobqualification) values('$jid','$jtitle','$jtype','$jcountry','$jstate','$jrole','$jqualify')";
  $query = $dbh->prepare($sql);              
  if($query->execute())
  {
    $_SESSION['msg']="Job Posted Successfully!!";         
  }
  else
  {
    echo "<script>alert('Records could not be updated');</script>";
  }
}
?>

<body>
  <script>
    function getjobstatus(val,jid) 
    {
      var request = new XMLHttpRequest();
      request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200){
          location.reload();
          event.preventDefault(); 
        }
        if(this.readyState === 4 && this.status === 204){
          alert("Status could not be changed!");
          location.reload(); 
          event.preventDefault();
        }
      };
      request.open("GET", "get_job_status.php?st="+val+'&job_id='+jid , true);
      request.send();
    }
  </script>

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
            <h2 class="page-title">Create Job Post</h2>
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-primary">
                  <div class="panel-heading">Create Job Post</div>
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
                        <div class="form-group">
                          <label class="col-sm-3  control-label">Job Id</label>
                          <div class="col-sm-8">
                            <?php
                              function random_id_strings($length_of_string)
                              {
                                $str_id = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                return substr(str_shuffle($str_id),0,$length_of_string);
                              }
                              $randid = random_id_strings(6);
                              $sql="SELECT * from createjob";
                              $query = $dbh->prepare($sql);
                              $query->execute();
                              $row=$query->rowCount();
                              if($row>=0)
                              {
                                $row += 1;
                                $id="JBP_".$row.$randid;
                              }
                            ?>
                            <input type="text" name="jid" value="<?php echo $id; ?>" class="form-control" readonly>                
                            </select>
                          </div>
                        </div>
                                          
                        <div class="form-group">
                          <label class="col-sm-3  control-label">Job Title</label>
                          <div class="col-sm-8">
                            <input type="text" name="jtitle" id="jtitle" class="form-control" placeholder="Enter Job Title" required>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3  control-label">Job Type</label>
                          <div class="col-sm-8">
                            <input type="text" name="jtype" placeholder="Enter Job type" class="form-control" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3  control-label">Job Country</label>
                          <div class="col-sm-8">
                            <input type="text" name="jcountry" placeholder="Enter Product Job Country" class="form-control" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3  control-label">Job State</label>
                          <div class="col-sm-8">
                            <input type="text" name="jstate" placeholder="Enter Job State" class="form-control" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3  control-label">Job Role</label>
                          <div class="col-sm-8">
                            <textarea name="jrole" class="widgEditor" placeholder="Enter Job Role" class="form-control" cols="20" rows="10" required></textarea>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3  control-label">Job Qualification</label>
                          <div class="col-sm-8">
                            <textarea name="jqualify" placeholder="Enter Job Qualification" class="form-control widgEditor" cols="20" rows="10" required></textarea>
                          </div>
                        </div>

                        <div class="col-sm-8 col-sm-offset-5">
                          <input class="btn btn-primary" type="submit" name="create" value="Add Job Post">
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
  <div class="ts-main-content">
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h2 class="page-title">Manage Job Posts</h2>
            <div class="table-responsive">
            <?php 
              if(isset($_GET['del']))
              {
            ?>
                <div class="alert alert-error" style="color: red;">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <?php echo htmlentities($_SESSION['delmsg']); ?>
                  <?php echo htmlentities($_SESSION['delmsg']=""); ?>
                </div>
            <?php 
              } 
            ?>
              <table id="zctb" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th scope="col">Job Id</th>
                    <th scope="col">Job Title</th>
                    <th scope="col">Job Type</th>
                    <th scope="col">Job Country</th>
                    <th scope="col">Job State</th>
                    <th scope="col">Job Role</th>
                    <th scope="col">Job Qualification</th>
                    <th scope="col">Job Post Date</th>                    
                    <th scope="col">Job Update Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $sql="SELECT * from createjob";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    if($query->rowCount() > 0)
                    {
                      foreach($results as $result)
                      {
                  ?>
                        <tr>
                          <th scope="row"><?php echo $result->jobid; ?></th>
                          <td><?php echo $result->jobtitle; ?></td>
                          <td><?php echo $result->jobtype; ?></td>
                          <td><?php echo $result->jobcountry; ?></td>
                          <td><?php echo $result->jobstate; ?></td>
                          <td><?php echo $result->jobrole; ?></td>
                          <td><?php echo $result->jobqualification; ?></td>
                          <td><?php echo $result->jobpostdate; ?></td>
                          <td><?php echo $result->jobupdatedate; ?></td>
                          <td>
                            <?php
                              if($result->status==1)
                              {
                            ?>
                                <a href="" onclick="getjobstatus('0','<?php echo $result->jobid; ?>');" style="color: grey;"><i class="fa fa-ban"></i>Disable</a>&nbsp;&nbsp;
                                <a href="" onclick="getjobstatus('2','<?php echo $result->jobid; ?>');" style="color: red;"><i class="fa fa-ban"></i>Delete</a>&nbsp;&nbsp;
                                <a href="edit-jobpost.php?id=<?php echo $result->jobid;?>" onclick="return confirm('Do you want to Edit the job??');" style="color: blue;"><i class="fa fa-edit"></i>Edit</a>
                            <?php
                              }
                              elseif($result->status==0)
                              {
                            ?>
                                <a href="" onclick="getjobstatus('1','<?php echo $result->jobid; ?>');" style="color: green;"><i class="fa fa-check"></i>Enable</a>
                            <?php
                              }
                            ?>
                          </td>
                        </tr>
                  <?php
                      }
                    } 
                  ?>                                      
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include('includes/footer.php'); ?>