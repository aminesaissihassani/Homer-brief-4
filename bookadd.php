<?php
$connect = mysqli_connect("localhost", "root", "", "library");
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
	
</head>
<body>

<header>
	<img class="logo" src="images/homer.png">
		<div class="navcont">
			<a href="index.html">Home</a>
			<a href="Gallerie.html">Gallary</a>
			<a href="bookadd.php">Books</a>
			<a href="authoradd.php">Authors</a>
		  </div>
		  <div class="login">
			  <button class="in">Sign in</button>
			  <button class="up">Sign Up</button>
		  </div>
</header>
<section class="bod">
	<h2 class="titleadd">ADD BOOKS</h2>
	<div class="Add">
		
			<img src="images/addpic.png" id="addpc" onclick="upld()">
			
		<form name="bookform" onsubmit="validation();" action="insertB.php"  method="post" enctype="multipart/form-data">
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
				<button>+</button>
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
				<td><a href="deleteb.php?id=<?php echo $row['ID']; ?>"><i class="fas fa-trash-alt op"  onclick="alert('deleted')"></i></a> <a href="updatB.php?id=<?php echo $row['ID']; ?>"><i class="far fa-edit op" ></i> </a></td>
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
<script src="js/addbookjs.js"></script>
</body>
</html>