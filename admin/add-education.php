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
  $sql="SELECT * from education";
  $query = $dbh->prepare($sql);
  $query->execute();
  $row=$query->rowCount();
  if($row>=0)
  {
    $row += 1;
    $id="EDU_".$row.$randid;
  }
  $aid=$_POST['id'];
  $name=$_POST['name'];
  $degree=$_POST['degree'];
  $course=$_POST['course'];
  $fm=$_POST['from'];
  $to=$_POST['to'];  
  $sql="INSERT into education(adminid,eduid,educollege,edudegree,educourse,edufrom,eduto) VALUES(:aid,:id,:name,:degree,:course,:fm,:to)";
  $query = $dbh->prepare($sql);        
  $query->bindParam(':id',$id,PDO::PARAM_STR);
  $query->bindParam(':name',$name,PDO::PARAM_STR);  
  $query->bindParam(':aid',$aid,PDO::PARAM_STR);   
  $query->bindParam(':degree',$degree,PDO::PARAM_STR);
  $query->bindParam(':course',$course,PDO::PARAM_STR);  
  $query->bindParam(':fm',$fm,PDO::PARAM_STR);  
  $query->bindParam(':to',$to,PDO::PARAM_STR);
  if($query->execute())
  {
    $_SESSION['msg']="Education added Successfully!!";         
  }
  else
  {
    echo "<script>alert('Records could not be added');</script>";
  }
}
?>

<body>

<?php include("includes/header.php");?>  
  <div class="ts-main-content">
<?php include('includes/sidebar.php'); ?>

    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">          
            <h2 class="page-title">Add Education</h2>
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-primary">
                  <div class="panel-heading">Add Education</div>
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
                          <label class="col-sm-3 control-label">College</label>
                          <div class="col-sm-8">
                            <input type="text" name="name" id="name" class="form-control" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Degree</label>
                          <div class="col-sm-8">
                            <input type="text" name="degree" id="degree" class="form-control" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Course</label>
                          <div class="col-sm-8">
                            <input type="text" name="course" id="course" class="form-control" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">From</label>
                          <div class="col-sm-8">
                            <input type="date" name="from" id="from" class="form-control" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">To</label>
                          <div class="col-sm-8">
                            <input type="date" name="to" id="to" class="form-control" required>
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

<?php include('includes/footer.php'); ?>