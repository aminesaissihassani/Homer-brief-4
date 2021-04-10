<?php
include 'connect.php';

 $query="SELECT * FROM author ORDER BY ID DESC";
 $res=mysqli_query($connect,$query);


 if(isset($_POST['submit'])) {

	$authorName = $_POST['athorname'];
	$prodate = $_POST['bithd'];
	$img= $_FILES['apic']['name'];
	$imgsrc= $_FILES['apic']['tmp_name'];
	$folderLocation = "images";
	$path="$folderLocation/".$img;
	move_uploaded_file($imgsrc,$path);

	$sql = "INSERT INTO author (A_name,D_brith,img) VALUES ('$authorName', '$prodate','$path' )";


	if(mysqli_query($connect, $sql)){
		echo "Records added successfully.";
	} 

	else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}

	header("location:authoradd.php");

 }



 if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$del = mysqli_query($connect,"DELETE FROM bookauthor WHERE Id_author= '$id'"); // delete query
	$del2 = mysqli_query($connect,"delete from author  where ID = '$id'"); // delete query
	
if($del)
{

    header("Location: authoradd.php"); // redirects to all records page
}
else
{
    echo "Error deleting record"; // display error message if not delete
  
}


}

?>

<!DOCTYPE html>
<html>
<head>
	<title>LibraryStore-library</title>
	 <meta name="Description" content="Description ">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/ebe1dbdd6a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
	<script src="https://kit.fontawesome.com/ebe1dbdd6a.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="styles/styles.css">
	<link rel="stylesheet" href="styles/footerf.css">
        <script src="js/navbar.js"></script>
</head>
<body>
<header>
		<a href="index.php"><img class="logo" src="images/homer.png"></a>
		<div class="navmenu" id="navmenu">
			<input type="checkbox" id="check" onchange="menu(this)" name="checkbox">
			<label for="check" class="menu">
				<p>Menu</p>
			</label>
		</div>
		<div class="navcont navhide">
			<a href="index.php">Home</a>
			<a href="gallery.php">Gallary</a>
			<a href="bookadd.php">Books</a>
			<a href="authoradd.php">Authors</a>
		</div>
		<div class="login navhide">
			<button class="in">Sign in</button>
			<button class="up">Sign Up</button>
		</div>
		<div id="navhide">
			<div class="navcont navhide">
			<a href="index.php">Home</a>
			<a href="gallery.php">Gallary</a>
			<a href="bookadd.php">Books</a>
			<a href="authoradd.php">Authors</a>
			</div>
			<div class="login navhide">
				<button class="in">Sign in</button>
				<button class="up">Sign Up</button>
			</div>
		</div>
	</header>
<section class="bod">
	<h2 class="titleadd">ADD AUTHOR</h2>
	<div class="Add">
		
			<img src="images/addpic.png" id="addpc"  onclick="upld()">
			
		<form name="authorform" onsubmit="validation();" class="athform" style="margin-top: 150px;" action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post" enctype="multipart/form-data">
 		 
        <input type="file" accept=".png, .jpg,.jpeg" id="upload" onchange="uj()" name="apic" hidden>
			<div class="inp">
				<input type="text" id="title" name="athorname" placeholder="Full NAME">
			</div>
			<div class="inp">
                <input type="text" id="birthd" name="bithd" placeholder="DATE OF BIRTH" onfocus="(this.type='date')" onblur="(this.type='text')"> 
	
			</div>
			
		
			<div class="btn">
				<button name="submit">+</button>
			</div>
	
		
		</form>
		</div>
</section>
<h2>AUTHORS List</h2>
<table>
		<tr>
			<th>ID</th>
			<th>AUTHOR NAME</th>
			<th>DATE OF BIRTH</th>
			<th>IMAGE</th>
			<th></th>
		</tr>
        <?php  while($row = mysqli_fetch_assoc($res))
{?>
			 <tr>
				<td><label><?php echo $row['ID']?></label></td>
				<td><label><?php echo $row['A_name']?></label></td>
				<td><label><?php echo $row['D_brith']?></label></td>
				<td><img src="<?php echo $row['img']?>"></td>
				<td><a href="authoradd.php?id=<?php echo $row['ID']; ?>"><i class="fas fa-trash-alt op"  onclick="alert('deleted')"></i></a>  <a href="updatA.php?id=<?php echo $row['ID']; ?>"><i class="far fa-edit op" ></i> </a></td>
			</tr>
			<?php }?>
	
			
			
</table>
<footer>
        <div class="follow">
            <h3>Follow Us</h3>
            <p>Become a part of our dedicated team of innovative<br> book-loving professionals!</p>
            <div class="social">
                <img src="images/facebook.png">
                <img src="images/instagram.png">
                <img src="images/twitter.png">
            </div>
            
            <div class="app">
                
                <img src="images/as.png" alt="appstore">
                <img src="images/ps.png" alt="playstore">
            </div>
            <!-- <h4>Get Homer app</h4> -->
        </div>
            <form class="contact"><h3>Contact Us</h3>
                <div>
                    <label for="name">Full Name</label>
                    <input type="text" id="name" placeholder="Enter your  name">
                </div>
                <div>
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" placeholder="Enter your  phone number">
                </div>
                <div>
                    <label for="message">Message</label>
                <input type="text" id="message" placeholder="Enter your  Message">
                </div>
                
                
                <button class="sub">SUBMIT</button>
            </form>
    
    </footer>
    <div class="cp">&copy; CopyRight 2021 All Right Reserved by Homer.ml</div>
<script src="js/author.js"></script>
</body>
</html>

<?php 
include 'deconnect.php'; ?>