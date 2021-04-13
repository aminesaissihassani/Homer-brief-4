<?php
require 'connect.php';

 $query="SELECT ID,A_name FROM author ORDER BY ID ASC";
 $res=mysqli_query($connect,$query);





$query2="SELECT distinct B.* FROM book as b,bookauthor as atr where B.ID=atr.Id_book  ORDER BY ID DESC";
$res2=mysqli_query($connect,$query2);

$option = '';
function listauthor($ib) {
	global $option,$connect;
	$option = '';
	$qr="SELECT a.ID,a.A_name FROM author a,bookauthor ba where ba.Id_author=a.ID and  ba.Id_book=$ib ORDER BY ID ASC";
	$res=mysqli_query($connect,$qr);

	while($row = mysqli_fetch_assoc($res))
	{
		
	$option .= '<option value = "'.$row['ID'].'">'.$row['A_name'].'</option>';
	}
}


if(isset($_POST['submit'])) {

	$bookName = $_POST['booktit'];
	$bookprice = $_POST['bookprice'];
	$prodate = $_POST['prodate'];
	// $authorid = $_POST['authorid'];
	// $aid = (int)$authorid;
	$img= $_FILES['flup']['name'];
	$imgsrc= $_FILES['flup']['tmp_name'];
	$folderLocation = "images";
	$renm= rand();
	$path="$folderLocation/".$renm.$img;
	move_uploaded_file($imgsrc,$path);
	$authors=$_POST['author'];
	$sql = "INSERT INTO book (b_name,price,prod_date,img) VALUES ('$bookName', '$bookprice', '$prodate','$path' )";
	$s2=mysqli_query($connect, $sql);
	
	if($s2=0){
		echo "<script> alert('ERROR: Could not able to execute $sql')</script> " ;
	}

	//insert into book_author_tab
	$qr="SELECT ID FROM book ORDER BY ID DESC Limit 1";
	$rs=mysqli_query($connect,$qr);
	$row = mysqli_fetch_assoc($rs); 
	$id =  $row['ID'];
	
$bid = (int)$id;

	foreach($authors as $a){
	
		$sql2 = "INSERT INTO bookauthor (Id_book,Id_author) VALUES ($bid,$a)";
		$s=mysqli_query($connect, $sql2);
		if($s=0){
			echo "ERROR: Could not able to execute $sql2. " . mysqli_error($connect);
		} 
	}
	header("location:bookadd.php");
}

if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$del = mysqli_query($connect,"DELETE FROM bookauthor WHERE Id_book = '$id'"); // delete query
	$del2 = mysqli_query($connect,"delete from book  where ID = '$id'"); // delete query

if($del)
{

    header("Location: bookadd.php"); // redirects to all records page
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
	<h2 class="titleadd">ADD BOOKS</h2>
	<div class="Add">
		
			<img src="images/addpic.png" id="addpc" onclick="upld()">
			
		<form name="bookform" onsubmit="validation();" action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post" enctype="multipart/form-data">
			<input type="file" name="flup" accept=".png, .jpg,.jpeg" id="upload" onchange="uj()" hidden>
			<div class="inp">
				<input type="text" id="title" name="booktit" placeholder="BOOK TITLE">
			</div>
			<div class="inp">
				<input type="number" id="price" name="bookprice" placeholder="BOOK PRICE">
			</div>
			<div class="inp">
				<input type="text" id="prodate" name="prodate" placeholder="PRODUCTION DATE" onfocus="(this.type='date')" onblur="(this.type='text')"> 
			</div>
			<div class="inp">
				<div class="dropdown">
		
		 		 		<input class="selected" onclick="showCheckboxes()" id="nameAth" type="text" placeholder="Select book author(s)" readonly>
		  				<div class="options" id="checkboxes">
						  <?php  while($row = mysqli_fetch_assoc($res))
							{?>
		      		<label for="<?php echo $row['A_name']?>">
		       		 <input type="checkbox" name="author[]" id="<?php echo $row['A_name']?>" value="<?php echo $row['ID']?>" onchange="show();"/><?php echo $row['A_name']?></label>
						<?php }?>
		    		</div>
		 
				</div>
			</div>
			<div class="btn">
				<button name="submit">+</button>
			</div>
	
		
		</form>
	</div>
</section>
<h2>BOOKS List</h2>
<table>
		<tr>
			<th>ID</th>
			<th>BOOK NAME</th>
			<th>PRICE</th>
			<th>PROD DATE</th>
			<th>IMAGE</th>
			<th>AUTHOR</th>
			<th></th>
		</tr>
	
		<?php  while($row = mysqli_fetch_assoc($res2))
{?>
			 <tr>
				<td><label><?php echo $row['ID']?></label></td>
				<td><label><?php echo $row['b_name']?></label></td>
				<td><label><?php echo $row['price']?></label></td>
				<td><label><?php echo $row['prod_date']?></label></td>
				<td><img src="<?php echo $row['img']?>"></td>
				<td> <?php listauthor($row['ID']); ?> <select id="aid" name="authorid"> 
						
						<?php echo $option; ?>
					</select></td>
				<td><a href="bookadd.php?id=<?php echo $row['ID']; ?>"><i class="fas fa-trash-alt op"  onclick="alert('deleted')"></i></a> <a href="updatB.php?id=<?php echo $row['ID']; ?>"><i class="far fa-edit op" ></i> </a></td>
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
<script src="js/addbookjs.js"></script>
</body>
</html>
<?php 
include 'deconnect.php'; ?>