html
<?php
$username_errror="";
$password_error="";
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty($_POST['username'])){
        $username_errror="please enter your username";
        }
        else{
            $username_errror="";
        }

        if(empty($_POST['password'])){
            $password_error="please enter your password";
        }
        else{
            $password_error="";
        }
    }



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
    <input type="text" name="username" placeholder="Username" id="">
    <span>*<?php  echo  $username_errror ?></span>
    <input type="password" name="password" placeholder="Password" id="">
    <span>*<?php  echo  $password_error ?></span>
    <button>submit</button>
    </form>
</body>
</html>