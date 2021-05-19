<?php
session_start();
include("includes/dbgrad.php");
if(!empty($_GET['did']))
{
	$logid=$_SESSION['login'];
	$did=$_GET['did'];
	$sql="DELETE from homedesignations where designationid=:did";
	$query = $dbh->prepare($sql);
	$query->bindParam(':did',$did,PDO::PARAM_STR);
	$query->execute();
}
else
{
	echo "Designation id not received";
}
?>