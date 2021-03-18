<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "library");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// get the post records
$authorName = $_POST['athorname'];
$prodate = $_POST['bithd'];
$img= $_FILES['apic']['name'];
$imgsrc= $_FILES['apic']['tmp_name'];
$folderLocation = "images";
$path="$folderLocation/".$img;
move_uploaded_file($imgsrc,$path);


echo($imgsrc);
// Escape user inputs for security
// $first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
// $last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
// $email = mysqli_real_escape_string($link, $_REQUEST['email']);
 
// Attempt insert query execution
$sql = "INSERT INTO author (A_name,D_brith,img) VALUES ('$authorName', '$prodate','$path' )";


if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} 
else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 

// insert in database 
// $rs = mysqli_query($link, $sql);

// if($rs)
// {
// 	echo "Contact Records Inserted";
// }

// Close connection
mysqli_close($link);
?>
