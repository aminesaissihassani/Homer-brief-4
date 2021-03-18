<?php
$connect = mysqli_connect("localhost", "root", "", "library");
 $query="SELECT ID,A_name FROM author ORDER BY ID ASC";
 $res=mysqli_query($connect,$query);
$option = '';
 while($row = mysqli_fetch_assoc($res))
{
  $option .= '<option value = "'.$row['ID'].'">'.$row['A_name'].'</option>';
}
?>
<html>
<body>
<form>
 <select> 
<?php echo $option; ?>
</select>
<label > <?php echo $option; ?></label>
</form>
</body>
</html>