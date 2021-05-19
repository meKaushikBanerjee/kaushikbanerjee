<?php
session_start();
include("includes/dbgrad.php");
if(!empty($_GET['cid']))
{
	$logid=$_SESSION['logid'];
	$loc=$_GET['imgloc'];
	$cid=$_GET['cid'];
	$sql="DELETE from clients where clientid=:cid";
	$query = $dbh->prepare($sql);
	$query->bindParam(':cid',$cid,PDO::PARAM_STR);
	$query->execute();
	$path = $_SERVER['DOCUMENT_ROOT'].'admin/'.$loc;
	unlink($path);
}
else
{
	echo "Client id not received";
}
?>