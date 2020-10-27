<?php
if(isset($_POST['cancel'])){
    header("Location: index.php");
    return;
}
$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';  //PSWRD php123

$failure= false;

if(isset($_POST['who']) && isset($_POST['pass']))
{
    
if(strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1 )

{
    $failure="User name and pasword are required";
}else{
    $auth = hash('md5', $salt.$_POST['pass']);
    if($auth == $stored_hash) 
    {
        //redirect browser to game.php
        header("Location: game.php?name=".urlencode($_POST['who']));
        return;
    }else{
        $failure = "Incorrect password";
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oluwafemi Banji's Login Page</title>
</head>
<body>


    <h1> Please Log In</h1> 
    
    <?php 

    if($failure !== false){
    echo('<p style="color:red;">'.htmlentities($failure)."</p>\n");
}

    ?>
    <form method="post"><form method="post">
    <label for="name">User name<input type="text" name="who"><br></label>
    <label for="password"> Password<input type="password" name="pass"><br></label>
    <input type="submit" value="Log In">
    <input type="submit" name="cancel" value="Cancel">
    </form>
    
</body>