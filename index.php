<?php if(isset ($SESSION['logged_user']) ): ?>
Profile information:

<?php
require 'db.php';
?>
     
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php else : ?>
    
    <a href="/login.php" class="button button5" >Login</a>

    <br>
    <a href="/singup.php" >Registration</a>
          
    
<?php endif; ?>

 
 