<?php
session_start();
include("includes/dbgrad.php");
if(!empty($_GET['seid']))
{
	$seid=$_GET['seid'];
	$sql="DELETE from services where serviceid=:seid";
	$query = $dbh->prepare($sql);
	$query->bindParam(':seid',$seid,PDO::PARAM_STR);
	$query->execute();
}
else
{
	echo "Service id not received";
}
?>