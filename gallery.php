<?php
    $mysqli = new mysqli('localhost', 'root', '', 'library') or die($mysqli->error());

    $content = $mysqli->query("select distinct  b.* from book b, bookauthor ba where b.ID = ba.id_book ") or die($content->error());

    $row = $content->fetch_array();


    $option = '';
    function listauthor($ib) {
        global $option,$mysqli;
        $option = '';
        $qr="SELECT a.ID,a.A_name FROM author a,bookauthor ba where ba.Id_author=a.ID and  ba.Id_book=$ib ORDER BY ID ASC";
        $res=mysqli_query($mysqli,$qr);
    
        while($row2 = mysqli_fetch_assoc($res))
        {
            
        $option .= '<option value = "'.$row2['A_name'].'">'.$row2['A_name'].'</option>';
        }
    }





?>


<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gallery</title>
        <script src="https://kit.fontawesome.com/eb86766cbf.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="styles/styles.css">
        <link rel="stylesheet" href="styles/footerf.css">
        <script src="js/filter.js"></script>
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


        <!-- the bodyier -->
        <div class="boder">
            <!-- the filter -->
            <div class="filter">
                <h2>Filter</h2>
                <div>
                    <input id="booksnamefilter" value="" type="text" placeholder="Book's Name">
                    <label for="booksnamebtn"><i class="fas fa-plus-circle">+</i></label>
                    <input id="booksnamebtn" type="button" class="btnnone" onclick="filterBook();">
                </div>
                <div>
                    <input id="authorsnamefilter" value="" type="text" placeholder="Author's Name">
                    <label for="authorsnamebtn"><i class="fas fa-plus-circle">+</i></label>
                    <input id="authorsnamebtn" type="button" class="btnnone" onclick="filterAuthor();">
                </div>
                <div class="showfilter" id="showfilter">
                <div id="fbook" style="border:none;"></div>
                <div id="fauthor" style="border:none;"></div>
                    
                </div>
            </div>
            <!-- the books show -->
            <main>
                <?php
                    while ($row = $content->fetch_assoc()):
                ?>
                <section>
                    <div><img src="<?php echo $row['img']; ?>" alt="books"></div>
                    <h4 class="title"><?php echo $row['b_name']; ?></h4>
                    <h4>
                    <?php listauthor($row['ID']); ?> <select id="aid" class="author" name="authorid"> 
						
						<?php echo $option; ?>
					</select>
                    
                    
                    </h4>
                    <h4><span class="price"><?php echo $row['price']; ?></span>$</h4>
                </section>
                <?php endwhile; ?>
            </main>
        </div>

      
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
        <div class="cp"> CopyRight&copy;2021 All Right Reserved by Homer.ml</div>
    </body>
</html>