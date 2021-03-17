<?php
$connect = mysqli_connect("localhost", "root", "", "library");
 $query="SELECT * FROM author ORDER BY ID ASC";
 $res=mysqli_query($connect,$query);
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
	<h2 class="titleadd">ADD AUTHOR</h2>
	<div class="Add">
		
			<img src="images/addpic.png" id="addpc"  onclick="upld()">
			
		<form class="athform" style="margin-top: 150px;" action="insertA.php"  method="post" enctype="multipart/form-data">
 		 
        <input type="file" accept=".png, .jpg,.jpeg" id="upload" onchange="uj()" name="apic" hidden>
			<div class="inp">
				<input type="text" id="title" name="athorname" placeholder="Full NAME">
			</div>
			<div class="inp">
                <input type="text" id="birthd" name="bithd" placeholder="DATE OF BIRTH" onfocus="(this.type='date')" onblur="(this.type='text')"> 
	
			</div>
			
		
			<div class="btn">
				<button>+</button>
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
				<td><a href="deleteA.php?id=<?php echo $row['ID']; ?>"><i class="fas fa-trash-alt op"  onclick="alert('deleted')"></i></a>  <a href="updatA.php?id=<?php echo $row['ID']; ?>"><i class="far fa-edit op" ></i> </a></td>
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