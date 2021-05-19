<?php 
include('includes/mainheader.php');
if(isset($_POST['create']))
{
  function random_id_strings($length_of_string)
  {
    $str_id = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    return substr(str_shuffle($str_id),0,$length_of_string);
  }
  $randid = random_id_strings(6);
  $sql="SELECT * from experience";
  $query = $dbh->prepare($sql);
  $query->execute();
  $row=$query->rowCount();
  if($row>=0)
  {
    $row += 1;
    $id="EXP_".$row.$randid;
  }
  $aid=$_POST['id'];
  $post=$_POST['post'];
  $company=$_POST['company'];
  $role=$_POST['role'];
  $fm=$_POST['from'];
  if(isset($_POST['to']))
  {
    $to=$_POST['to'];
  }
  if(isset($_POST['current']))
  {
    $to="Present";
  }  
  $sql="INSERT into experience(adminid,expid,exppost,expcompany,exprole,expfrom,expto) VALUES(:aid,:id,:post,:company,:role,:fm,:to)";
  $query = $dbh->prepare($sql);        
  $query->bindParam(':id',$id,PDO::PARAM_STR);
  $query->bindParam(':post',$post,PDO::PARAM_STR);  
  $query->bindParam(':aid',$aid,PDO::PARAM_STR);   
  $query->bindParam(':company',$company,PDO::PARAM_STR);
  $query->bindParam(':role',$role,PDO::PARAM_STR);  
  $query->bindParam(':fm',$fm,PDO::PARAM_STR);  
  $query->bindParam(':to',$to,PDO::PARAM_STR);
  if($query->execute())
  {
    $_SESSION['msg']="Experience added Successfully!!";         
  }
  else
  {
    echo "<script>alert('Records could not be added');</script>";
  }
}
?>

<body>
  <script>
    function updatedate(value) 
    {
      var val=document.getElementById("newdate").value;
      var request = new XMLHttpRequest();
      request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200){
          location.reload();
          event.preventDefault(); 
        }
        if(this.readyState === 4 && this.status === 204){
          alert("Date could not be added!");
          location.reload(); 
          event.preventDefault();
        }
      };
      request.open("GET", "update-date.php?dt="+val+"&id="+value , true);
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
            <h2 class="page-title">Add Client</h2>
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-primary">
                  <div class="panel-heading">Add Client</div>
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
                        $logid=$_SESSION['login'];
                      ?>
                      <form class="form-horizontal row-fluid" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                          <div class="col-sm-8">                            
                            <input type="hidden" name="id" value="<?php echo $logid; ?>" class="form-control">
                          </div>
                        </div>
                                              
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Post</label>
                          <div class="col-sm-8">
                            <input type="text" name="post" id="post" class="form-control" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Company</label>
                          <div class="col-sm-8">
                            <input type="text" name="company" id="company" class="form-control" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Role</label>
                          <div class="col-sm-8">
                          <textarea name="role" id="role" class="widgEditor" cols="20" rows="10" required></textarea>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">From</label>
                          <div class="col-sm-8">
                            <input type="date" name="from" id="from" class="form-control" required>
                          </div>
                        </div>

                        <p>Currently Working: Yes <input type="radio" name="current" id="yes" value="CurrentJob" onclick="gettodate(this.value);"> No <input type="radio" name="current" id="no" onclick="gettodate(this.value);"></p>

                        <div id="todate">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">To</label>
                            <div class="col-sm-8">
                              <input type="date" name="to" id="to" class="form-control">
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-8 col-sm-offset-5">
                          <input class="btn btn-primary" type="submit" name="create" value="Create">
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
            <h2 class="page-title">Manage Experience</h2>
            <div class="table-responsive">
              <table id="zctb" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th scope="col">Experience Id</th>
                    <th scope="col">Company</th>
                    <th scope="col">Post</th>
                    <th scope="col">From </th>
                    <th scope="col">To</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $sql="SELECT * from experience";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    if($query->rowCount() > 0)
                    {
                      foreach($results as $result)
                      {
                  ?>
                        <tr>
                          <td scope="row" width="100"><?php echo $result->expid; ?></td>
                          <td scope="row" width="100"><?php echo $result->expcompany; ?></td>
                          <td scope="row" width="100"><?php echo $result->exppost; ?></td>
                          <td scope="row" width="100"><?php echo $result->expfrom; ?></td>
                          <td scope="row" width="100">
                          <?php
                            if($result->expto=="CurrentJob")
                            {
                          ?>
                            <input type="date" name="to" id="newdate" required>
                          <?php
                            }
                            else
                            {
                              echo $result->expto;
                            }
                          ?>
                          </td>
                          <td width="20">
                          <?php
                            if($result->expto=="CurrentJob")
                            {
                          ?>
                            <a href="" onclick="updatedate('<?php echo $result->expid; ?>');" style="color: green;">Update</a>
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

  <script type="text/javascript">
    function gettodate(val)
    {
      if(val=="CurrentJob")
      {
        document.getElementById("todate").style.display="none";
      }
      else
      {
        document.getElementById("todate").style.display="block";
      }
    }
  </script>

<?php include('includes/footer.php'); ?>