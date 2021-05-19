<?php
session_start();
include("includes/dbgrad.php");
if(!empty($_GET['sid']))
{
	$logid=$_SESSION['logid'];
	$sid=$_GET['sid'];
	$sql="DELETE from skills where codeskillid=:sid";
	$query = $dbh->prepare($sql);
	$query->bindParam(':sid',$sid,PDO::PARAM_STR);
	$query->execute();
}
else
{
	echo "Code Skill id not received";
}
?>