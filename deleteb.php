<?php
$link = mysqli_connect("localhost", "root", "", "library");

$id = $_GET['id']; 

$del = mysqli_query($link,"DELETE FROM bookauthor WHERE Id_book = '$id'"); // delete query
$del2 = mysqli_query($link,"delete from book  where ID = '$id'"); // delete query

if($del)
{
    mysqli_close($link); // Close connection
    header("Location: bookadd.php"); // redirects to all records page
    echo $id;
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
    echo $id;
}
?>