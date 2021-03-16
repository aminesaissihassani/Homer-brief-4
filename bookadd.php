<?php
$connect = mysqli_connect("localhost", "root", "", "library");
 $query="SELECT ID,A_name FROM author ORDER BY ID ASC";
 $res=mysqli_query($connect,$query);
$option = '';
 while($row = mysqli_fetch_assoc($res))
{
  $option .= '<option value = "'.$row['ID'].'">'.$row['A_name'].'</option>';
}




$query2="SELECT B.*,a.A_name FROM book as b,author as a,bookauthor as atr where B.ID=atr.Id_book and atr.Id_author=a.ID ORDER BY ID DESC";
$res2=mysqli_query($connect,$query2);
// $tr = '';
//  while($row = mysqli_fetch_assoc($res2))
// {
//   $tr .= '<tr><td><label>'.$row['ID'].'</label></td><td><label>'.$row['b_name'].'</label></td><td><label>'.$row['price'].'</label></td><td><label>'.$row['prod_date'].'</label></td><td><label>'.$row['img'].'</label></td><td><label>'.$row['A_name'].'</label></td><td><i class="fas fa-trash-alt op"  onclick="alert(\'deleted\')" ></i><i class="far fa-edit op" onclick="location.href=\'UpdateB.html\'"></i></td></tr>';
// }
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>LibraryStore-library</title>
	 <meta name="Description" content="Description ">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/ebe1dbdd6a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://kit.fontawesome.com/ebe1dbdd6a.js" crossorigin="anonymous"></script>
</head>
<body>

<header>
	<img class="logo" src="images/homer.png">
		<div class="navcont">
			<a href="index.html">Home</a>
			<a href="Gallerie.html">Gallary</a>
			<a href="AddBooks.html">Books</a>
			<a href="AddAuthors.html">Authors</a>
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
			
		<form action="insertB.php"  method="post" enctype="multipart/form-data">
			<input type="file" name="flup" accept=".png, .jpg,.jpeg" id="upload" onchange="uj()" hidden>
			<div class="inp">
				<input type="text" id="title" name="booktit" placeholder="BOOK TITLE">
			</div>
			<div class="inp">
				<input type="text" id="price" name="bookprice" placeholder="BOOK PRICE">
			</div>
			<div class="inp">
				<input type="text" id="prodate" name="prodate" placeholder="PRODUCTION DATE" onfocus="(this.type='date')" onblur="(this.type='text')"> 
			</div>
			<div class="inp">
				   <select id="aid" name="authorid"> 
						<?php echo $option; ?>
					</select>
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
		<!-- <tr>
		<?php echo $tr; ?>
		</tr> -->
		<?php  while($row = mysqli_fetch_assoc($res2))
{?>
			 <tr>
				<td><label><?php echo $row['ID']?></label></td>
				<td><label><?php echo $row['b_name']?></label></td>
				<td><label><?php echo $row['price']?></label></td>
				<td><label><?php echo $row['prod_date']?></label></td>
				<td><img src="<?php echo $row['img']?>"></td>
				<td><label><?php echo $row['A_name']?></label></td>
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
		<!-- <div class="lgftr"><img src="images/hmr.png"></div> -->
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
<script>
	var fileup=document.querySelector("#upload");
	const img = document.querySelector("#addpc");
	function upld() {
		fileup.click();
	}

	function uj() {
		img.src = URL.createObjectURL(event.target.files[0]);
		
	}
</script>
</body>
</html>