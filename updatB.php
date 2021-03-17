<?php
$link = mysqli_connect("localhost","root", "", "library");

$id = $_GET['id']; 

$qry = mysqli_query($link,"select * from book where ID=$id");
$data = mysqli_fetch_array($qry); 

$selc="SELECT Id_author FROM bookauthor as atr where  atr.Id_book=$id";
$res2=mysqli_query($link,$selc);
$dataselec= mysqli_fetch_array($res2); 
$query="SELECT ID,A_name FROM author ORDER BY ID ASC";
$res=mysqli_query($link,$query);

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
	<h2 class="titleadd">UPDATE BOOKS</h2>
	<div class="Add">
		
			<img src="<?php echo $data['img']?>" id="addpc" onclick="upld()">
			
		<form action="editB.php"  method="post" enctype="multipart/form-data">
        <input type="file" accept=".png, .jpg,.jpeg" id="upload" onchange="uj()" name="flup" hidden>
			<div class="inp">
                <input type="text" name="idb" value="<?php echo $id?>" readonly hidden>
				<input type="text" id="title" name="booktit" placeholder="BOOK TITLE" value="<?php echo $data['b_name']?>">
			</div>
			<div class="inp">
				<input type="text" id="price" name="bookprice" placeholder="BOOK PRICE" value="<?php echo $data['price']?>">
			</div>
			<div class="inp">
				<input type="text" id="prodate" name="prodate" placeholder="PRODUCTION DATE" onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo $data['prod_date']?>""> 
			</div>
			<div class="inp">
                    <select id="aid" name="authorid" > 
						<?php while($row = mysqli_fetch_assoc($res)) {?>
                            <option  value = "<?php echo $row['ID']?>" <?php if($row['ID']== $dataselec['Id_author']) echo 'selected="selected"'; ?>><?php echo $row['A_name'] ?></option>
                            <?php }?>
					</select>
			</div>
			<div class="btn">
				<button>+</button>
			</div>
	
		
		</form>
	</div>
</section>

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