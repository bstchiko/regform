<?php
require 'db.php';
$data = $_POST;

if(isset($data['do_login']))
{
    $errors = array();
    $user = R::findOne('user', 'login = ?', array($data['login']));
    if($user)
    {
        //login exists
        if(password_verify($data['password'], $user->password))
        { 
            //all right, login user
            $_SESSION['logged_user'] = $user; 
             header('Location: https://maxbel.000webhostapp.com/profile.php');
            //echo '<div style="color: green" >Your profile information: </div><hr>';
            //echo'Login: '."$user[login]".'<p>';
            //echo'Email: '."$user[email]".'<p>';
        }
        else 
        {
        $errors[] = 'Password not correct!';
        }
    }
    else 
    {
        $errors[] = 'User with this login was not found!';
    }
    
    if ( ! empty($errors))
    {
 echo '<div style="color: red" >'.array_shift($errors).'</div><hr>';
    } 
         
}
?>

<form action="/login.php" method="POST">
    
    <p> 
        <p><strong>Login</stong></p>
        <input type='text' name='login' value="<?php echo @$data['login']?>">
    </p>
    
    <p> 
        <p><strong>Password</stong></p>
        <input type='password' name='password' value="<?php echo @$data['password']?>">
    </p>
    
    <p>  
        <button type='submit' name='do_login'>Enter</button>
    </p>
    
    
</form>