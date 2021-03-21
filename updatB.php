<?php
$link = mysqli_connect("localhost","root", "", "library");

$id = $_GET['id']; 

$qry = mysqli_query($link,"select * from book where ID=$id");
$data = mysqli_fetch_array($qry); 

$selc="SELECT Id_author FROM bookauthor as atr where  atr.Id_book=$id";
$res2=mysqli_query($link,$selc);
$arr = array();
while($dataselec= mysqli_fetch_array($res2))
{
	$arr[] =$dataselec['Id_author'];
}

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
	<h2 class="titleadd">UPDATE BOOKS</h2>
	<div class="Add">
		
			<img src="<?php echo $data['img']?>" id="addpc" onclick="upld()">
			
		<form name="bookform"  onsubmit="validation();" action="editB.php"  method="post" enctype="multipart/form-data">
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
				<div class="dropdown">
		
		 		 		<input class="selected" onclick="showCheckboxes()" id="nameAth" type="text" placeholder="Select book author(s)" readonly>
		  				<div class="options" id="checkboxes">
						  <?php  while($row = mysqli_fetch_assoc($res))
							{?>
		      		<label for="<?php echo $row['A_name']?>">
		       		 <input type="checkbox" name="author[]" id="<?php echo $row['A_name']?>" value="<?php echo $row['ID']?>" onchange="show();" 
						 <?php foreach ($arr as $x) {
							  if($x== $row['ID'])
							    {
           							 echo "checked";
									}
								}
								?>
					 /><?php echo $row['A_name']?></label>
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
    <div class="cp">&copy; CopyRight2021 All Right Reserved by Homer.ml</div>
<script src="js/upbook.js"></script>
</body>
</html>