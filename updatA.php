<?php
$link = mysqli_connect("localhost","root", "", "library");

$id = $_GET['id']; 

$qry = mysqli_query($link,"select * from author where ID=$id");
$data = mysqli_fetch_array($qry); 

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
		<img class="logo" src="images/homer.png">
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
		
			<img src="<?php echo $data['img']?>" id="addpc" onclick="upld()">
			
		<form  name="authorform" onsubmit="validation();" class="athform" style="margin-top: 150px;" action="editA.php"  method="post" enctype="multipart/form-data">
        <input type="file" accept=".png, .jpg,.jpeg" id="upload" onchange="uj()" name="flup" hidden>
			<div class="inp">
            <input type="text" name="idb" value="<?php echo $id?>" readonly hidden>
				<input type="text" id="fullname" name="athorname" placeholder="Full NAME" value="<?php echo $data['A_name']?>">
			</div>
			<div class="inp">
                <input type="text" id="birthd" name="bithd" placeholder="DATE OF BIRTH" onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo $data['D_brith']?>"> 
	
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
            
            <div class="app">
                
                <img src="images/as.png" alt="appstore">
                <img src="images/ps.png" alt="playstore">
            </div>
            <!-- <h4>Get Homer app</h4> -->
        </div>
            <form class="contact"><h3>Contact Us</h3>
                <div>
                    <label for="name">Full Name</label>
                    <input type="text" id="name" placeholder="Enter your  name" required>
                </div>
                <div>
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" placeholder="Enter your  phone number" required>
                </div>
                <div>
                    <label for="message">Message</label>
                <input type="text" id="message" placeholder="Enter your  Message" required>
                </div>
                
                
                <button class="sub">SUBMIT</button>
            </form>
    
    </footer>
    <div class="cp">&copy; CopyRight 2021 All Right Reserved by Homer.ml</div>
<script src="js/upauthor.js"></script>
</body>
</html>