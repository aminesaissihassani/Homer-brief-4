<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "library");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


// get the post records
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


// Escape user inputs for security
// $first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
// $last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
// $email = mysqli_real_escape_string($link, $_REQUEST['email']);
 
// Attempt insert query execution
$sql = "INSERT INTO book (b_name,price,prod_date,img) VALUES ('$bookName', '$bookprice', '$prodate','$path' )";
$s2=mysqli_query($link, $sql);

if($s2=0){
    echo "<script> alert('ERROR: Could not able to execute $sql')</script> " ;
}
//insert into book_author_tab
$qr="SELECT ID FROM book ORDER BY ID DESC Limit 1";
$rs=mysqli_query($link,$qr);
$row = mysqli_fetch_assoc($rs); 
$id =  $row['ID'];


$bid = (int)$id;


$sql2 = "INSERT INTO bookauthor (Id_book,Id_author) VALUES ($bid,$aid)";
$s=mysqli_query($link, $sql2);
if($s=0){
    echo "ERROR: Could not able to execute $sql2. " . mysqli_error($link);
} 

  header("Location: bookadd.php");

// Close connection
mysqli_close($link);
?>
