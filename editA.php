<?php

$link = mysqli_connect("localhost", "root", "", "library");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$bid = $_POST['idb'];
$bookName = $_POST['athorname'];
$prodate = $_POST['bithd'];
$img= $_FILES['flup']['name'];
$imgsrc= $_FILES['flup']['tmp_name'];
$folderLocation = "images";
$path="$folderLocation/".$img;
move_uploaded_file($imgsrc,$path);
if(empty($img)){
    $sql = "UPDATE author set A_name='$bookName',D_brith='$prodate' where ID='$bid' ";
}
else{
    $sql = "UPDATE author set A_name='$bookName',D_brith='$prodate',img='$path' where ID='$bid' ";
}
// Attempt insert query execution

// $sql = "UPDATE book set b_name='$bookName',price='$bookprice',prod_date='$prodate',img='$path' where ID='$bid' ";
$s2=mysqli_query($link, $sql);

if($s2=0){
    echo "<script> alert('ERROR: Could not able to execute $sql')</script> " ;
}




  header("Location: authoradd.php");
// Close connection
mysqli_close($link);
?>

