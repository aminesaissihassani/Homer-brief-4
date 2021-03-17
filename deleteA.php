<?php
$link = mysqli_connect("localhost", "root", "", "library");

$id = $_GET['id']; 

$del = mysqli_query($link,"DELETE FROM bookauthor WHERE Id_author= '$id'"); // delete query
$del2 = mysqli_query($link,"delete from author  where ID = '$id'"); // delete query

if($del)
{
    mysqli_close($link); // Close connection
    header("Location: authoradd.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
    echo $id;
}
?>