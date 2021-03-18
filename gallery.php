<?php
    $mysqli = new mysqli('localhost', 'root', '', 'library') or die($mysqli->error());

    $content = $mysqli->query("select b.*,a.A_name from book b, bookauthor ba, author a where b.ID = ba.id_book and ba.id_author = a.ID") or die($content->error());

    $row = $content->fetch_array();

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
                <a href="index.html">Home</a>
                <a href="Gallerie.html">Gallary</a>
                <a href="AddBooks.html">Books</a>
                <a href="AddAuthors.html">Authors</a>
            </div>
            <div class="login navhide">
                <button class="in">Sign in</button>
                <button class="up">Sign Up</button>
            </div>
            <div id="navhide">
                <div class="navcont navhide">
                    <a href="index.html">Home</a>
                    <a href="Gallerie.html">Gallary</a>
                    <a href="AddBooks.html">Books</a>
                    <a href="AddAuthors.html">Authors</a>
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
                <div class="showfilter" id="showfilter">
                    
                </div>
                <div>
                    <input id="booksnamefilter" value="" type="text" placeholder="Book's Name">
                    <label for="booksnamebtn"><i class="fas fa-plus-circle"></i></label>
                    <input id="booksnamebtn" type="button" class="btnnone" onclick="filterBook();">
                </div>
                <div>
                    <input id="authorsnamefilter" value="" type="text" placeholder="Author's Name">
                    <label for="authorsnamebtn"><i class="fas fa-plus-circle"></i></label>
                    <input id="authorsnamebtn" type="button" class="btnnone" onclick="filterAuthor();">
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
                    <h4 class="author"><?php echo $row['A_name']; ?></h4>
                    <h4><span class="price"><?php echo $row['price']; ?></span>$</h4>
                </section>
                <?php endwhile; ?>
            </main>
        </div>

        <footer></footer>
    </body>
</html>