<?php

require "init.php";
 include '../classes/Login.php';  

if (!isset($_SESSION['user'])) {
    header("location: index.php");
}

$user = $_SESSION['user'];

 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Google Profile</title>
</head>
<body style=" top:100px; margin: 0 auto; width: 300px; text-align: center; font-family: 'Arial';">
    <div>
        <img src="<?php echo $user->picture ?>" alt="user image"> <br><br>

<?php
$lg = new Login();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $insertGdata = $lg->gmailDataInsert($_POST);  
}
?>
        <form action="" method="post">

        
        <label ><?php echo $user->given_name ?> </label>
            <input type="hidden" value="<?php echo $user->given_name ?>" name="fname">
       <label ><?php echo $user->family_name ?></label>
        <input type="hidden" value="<?php echo $user->family_name ?>" name="lname">

        <br><br>

        <label  ><?php echo $user->email ?></label>
        <input type="hidden" value="<?php echo $user->email ?>" name="email">
        <br><br>
    <input style=" color: #fff; background-color: green; padding: 5px; border:2px solid blue; border-radius: 2px;" type="submit" name="submit">
      
          </form>
    </div>
    
</body>
</html>