<?php
require 'db.php';
?>
<?php if( isset($_SESSION['logged_user'])); ?>

 Your profile information:
 <p>
<?php  
echo $_SESSION['logged_user']->login;
 ?>
 <p>
 <?php 
echo $_SESSION['logged_user']->email; 
 ?>
 <p>
 <a href='/logout.php'>Logout</>


 