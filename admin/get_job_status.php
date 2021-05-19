<?php
session_start();
include("includes/dbgrad.php");
if(!empty($_GET['job_id']))
{
	$logid=$_SESSION['logid'];
	$jobid=$_GET['job_id'];
	$status=$_GET['st'];
	if($status==2)
	{
		$sql="DELETE from createjob where jobid=:jobid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':jobid',$jobid,PDO::PARAM_STR);
		$query->execute();
	}
	else
	{
		$sql="UPDATE createjob set status=:status where jobid=:jobid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':jobid',$jobid,PDO::PARAM_STR);
		$query->bindParam(':status',$status,PDO::PARAM_STR);
		$query->execute();	
	}
}
else
{
	echo "Job id not received";
}
?>