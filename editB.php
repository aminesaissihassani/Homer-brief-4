<?php

$link = mysqli_connect("localhost", "root", "", "library");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$bid = $_POST['idb'];
$bookName = $_POST['booktit'];
$bookprice = $_POST['bookprice'];
$prodate = $_POST['prodate'];
$authorid = $_POST['authorid'];
$aid = (int)$authorid;
$img= $_FILES['flup']['name'];
$imgsrc= $_FILES['flup']['tmp_name'];
$folderLocation = "images";
$path="$folderLocation/".$img;
move_uploaded_file($imgsrc,$path);
if(empty($img)){
    $sql = "UPDATE book set b_name='$bookName',price='$bookprice',prod_date='$prodate' where ID='$bid' ";
}
else{
    $sql = "UPDATE book set b_name='$bookName',price='$bookprice',prod_date='$prodate',img='$path' where ID='$bid' ";
}
// Attempt insert query execution

// $sql = "UPDATE book set b_name='$bookName',price='$bookprice',prod_date='$prodate',img='$path' where ID='$bid' ";
$s2=mysqli_query($link, $sql);

if($s2=0){
    echo "<script> alert('ERROR: Could not able to execute $sql')</script> " ;
}



$sql2 = "UPDATE bookauthor set Id_author='$aid' where Id_book ='$bid' "  ;
$s=mysqli_query($link, $sql2);
if($s=0){
    echo "ERROR: Could not able to execute $sql2. " . mysqli_error($link);
} 

  header("Location: bookadd.php");
// Close connection
mysqli_close($link);
?>

