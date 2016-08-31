<?php
session_start();
require_once "includes/secure.php";
require_once "includes/connect.php";
?>
<?php
$id=$_GET['id'];
$sql=mysql_query("delete from tbltestimonials where tid=".$id);
if(mysql_query)
{
   echo "<script>alert('Deleted succesfully !!!');window.location.href='viewtestimonials.php';";
}
else
{
   echo "<script>alert('Some error occurred !!! Try again ..');window.location.href='viewtestimonials.php';";
}
?>