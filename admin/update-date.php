<?php
session_start();
include("includes/dbgrad.php");
if(!empty($_GET['dt']))
{
	$logid=$_SESSION['login'];
	$dt=$_GET['dt'];
	$id=$_GET['id'];
	$sql="UPDATE experience set expto=:dt where adminid=:logid and expid=:id";
	$query = $dbh->prepare($sql);
	$query->bindParam(':logid',$logid,PDO::PARAM_STR);
	$query->bindParam(':dt',$dt,PDO::PARAM_STR);
	$query->bindParam(':id',$id,PDO::PARAM_STR);
	$query->execute();
}
else
{
	echo "Client id not received";
}
?>