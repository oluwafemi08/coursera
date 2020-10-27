
<?php  //start session;
if(!isset($_GET['name']) || strlen($_GET['name']) < 1 )
{
    die("Name Parameter cannot be blank");
}

if(isset($_POST['logout']))
{
    header('Location: index.php');
    return;
}
// Set up the values for the game...
// 0 is Rock, 1 is Paper, and 2 is Scissors
$names = array('Rock', 'Paper', 'Scissors');
$human = isset($_POST['human']) ? $_POST['human']+0 : -1 ;

$computer = rand(0, 2); 

function check($computer, $human)
{

if($human == $computer)

{
    return "Tie";
}elseif ($human > $computer) 

{
    return "You Win";
}elseif ($human < $computer) {
    return "You lose";
}
    return false;
}
$result = check($computer, $human);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oluwafemi Banji's Game Page</title>
</head>
<body>


<h1>Rock Paper Scissors</h1>

<?php

if (isset($_REQUEST['name'])){
    echo "<p>Welcome: ";
    echo htmlentities($_REQUEST['name']);
    echo "</p>\n"; 
}
    ?>
    <form method="post">
    <select name="human">
    <option value="-1">Select</option>
    <option value="0">Rock</option>
    <option value="1">Paper</option>
    <option value="2">Scissors</option>
    <option value="3">Test</option>
    </select>
    <input type="submit" value="Play">
    <input type="submit" name="logout" value="Logout">
    </form>

    <pre>
    <?php 
    if($human == -1){
        print "Please select a strategy and Play.\n";

    }elseif ($human == 3) {
        for($c=0;$c<3;$c++) {
            for($h=0;$h<3;$h++) {
                $r = check($c, $h);
                print "Human=$names[$h] Computer=$names[$c] Result=$r\n";
    
            }    
        }
    }else {
        print "Your Play=$names[$human] Computer Play=$names[$computer] Result=$result\n";
    }
    ?>
    </pre>
</body>
</html>