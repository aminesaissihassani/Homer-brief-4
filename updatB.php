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
    <link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://kit.fontawesome.com/ebe1dbdd6a.js" crossorigin="anonymous"></script>
	<style type="text/css">
		.dropdown {
   position: relative;
}
.selected{
	cursor: pointer;
}
.options {
	width: 80%;
  position: absolute;
  left: 0;
  display: none;
  border: none;
  list-style: none;
  margin: 0;
  padding:0;
  max-height: 60px;
  overflow-y: scroll;
}

#checkboxes label {
  display: block;
}
input[type="checkbox"]{
	    border: 1px solid white;
    border-bottom: 1px solid #474646;
     width: auto; 
     height:auto; 
     margin-bottom: 0px; 
    color: #fca311;
    font-weight: bold;
}
	</style>
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


<script type="text/javascript">
	show();
	var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
function show(){
	
	
	var isChecked=document.getElementById('nameAth');
	isChecked.value ='';
    var elems= document.querySelectorAll('input[type="checkbox"]:checked');
                for (var i=0;i<elems.length;i++)
                {
                     isChecked.value +=elems[i].id+' / ';
					 
              
                    
                }
                // alert(isChecked[i]);
                // for (var i=0;i<isChecked.length;i++)
                // {
                //     alert(isChecked[i]);
                // }
               
}

</script>
</body>
</html>