<?php 
require_once("includes/config.php");
if(!empty($_POST["fullname"])) {
  $studentid= strtoupper($_POST["fullname"]);
 
    $sql ="SELECT fname,Status FROM tblclients WHERE fname=:fullname";
$query= $dbh -> prepare($sql);
$query-> bindParam(':fullname', $fullname, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
foreach ($results as $result) {
if($result->Status==0)
{
echo "<span style='color:red'> Student ID Blocked </span>"."<br />";
echo "<b>Student Name-</b>" .$result->fname;
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else {
?>


<?php  
echo htmlentities($result->fname);
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}
 else{
 echo "<script>$('#submit').prop('disabled',true);</script>";
}
}



?>
