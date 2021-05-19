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
  $sql="SELECT * from works";
  $query = $dbh->prepare($sql);
  $query->execute();
  $row=$query->rowCount();
  if($row>=0)
  {
    $row += 1;
    $id="PRO_".$row.$randid;
  }
  $adminid=$_POST['logid'];
  $head=$_POST['head'];
  $catname=$_POST['catname'];
  $detail=$_POST['details'];
  $git=$_POST['git'];
  $demo=$_POST['demo'];
  $file=$_FILES['img']['name'];
  $size_file=$_FILES['img']['size'];
  $file_ext=explode('.',$file);
  $fileext=$file_ext[1];
  $newfilename=$id.".".$fileext;
  $extensions= array("jpg","jpeg","png");
      
  if(in_array($fileext,$extensions)==true)
  {
    if($size_file<=5242880)
    {
      $dir="uploads/projects/";
      if(!is_dir($dir))
      {
        mkdir("uploads/projects/");
      }
      $filepath="uploads/projects/".$newfilename;
      move_uploaded_file($_FILES["img"]["tmp_name"],"uploads/projects/".$newfilename);
      $sql="INSERT into works(adminid,categoryid,heading,categoryname,details,github,demo,thumbnailimage) values(:adminid,:id,:head,:catname,:detail,:git,:demo,:filepath)";
      $query = $dbh->prepare($sql);  
      $query->bindParam(':adminid',$adminid,PDO::PARAM_STR);
      $query->bindParam(':id',$id,PDO::PARAM_STR);
      $query->bindParam(':head',$head,PDO::PARAM_STR);
      $query->bindParam(':catname',$catname,PDO::PARAM_STR);
      $query->bindParam(':detail',$detail,PDO::PARAM_STR); 
      $query->bindParam(':git',$git,PDO::PARAM_STR);
      $query->bindParam(':demo',$demo,PDO::PARAM_STR);
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
                          $logid=$_SESSION['login'];
                        ?>
                            <div class="form-group">
                              <label class="col-sm-3 control-label">Id</label>
                              <div class="col-sm-8">                            
                                <input type="text" name="logid" value="<?php echo $logid; ?>" class="form-control" readonly>                
                                </select>
                              </div>
                            </div>
                                              
                            <div class="form-group">
                              <label class="col-sm-3 control-label">Project Name</label>
                              <div class="col-sm-8">
                                <input type="text" name="head" id="head" class="form-control">
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-3 control-label">Project Category Name</label>
                              <div class="col-sm-8">
                                <input type="text" name="catname" id="catname" class="form-control">
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-3 control-label">Details</label>
                              <div class="col-sm-8">
                                <textarea name="details" id="details" class="widgEditor" cols="20" rows="10"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-3 control-label">Github Link</label>
                              <div class="col-sm-8">
                                <input type="text" name="git" id="git" class="form-control" required>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-3 control-label">Demo Link</label>
                              <div class="col-sm-8">
                                <input type="text" name="demo" id="demo" class="form-control" required>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-3 control-label">Upload Resume</label>
                              <div class="col-sm-8">
                                <input type="file" name="img" id="img" class="form-control">
                              </div>
                            </div>

                            <div class="col-sm-4 col-sm-offset-3">
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