<?php
require'db.php'; 
$data = $_POST;
if( isset($data['do_singup']) )
{
    //registration here
    $errors=array();
    
    if(trim($data['login'] == ''))
    {
        $errors[] = 'enter login!';
    }
    
    if(trim($data['email'] == ''))
    {
        $errors[] = 'enter email!';
    }
    
    if($data['password'] == '')
    {
        $errors[] = 'enter password!';
    }
    
    if(R::count('user', "login = ?", array($data['login'])) > 0)
    {
        $errors[] = 'User with this login was found, you cant use it!';
    }
    
    if(R::count('user', "email = ?", array($data['email'])) > 0)
    {
        $errors[] = 'User with this email was found, you cant use it!';
    }
    
    
    if($data['password2'] != $data['password'] )
    {
        $errors[] = 'wrong confirmation of password';
    }
    
    if (empty($errors))
    {
        //all fine, register
        $user = R::dispense('user');
        $user -> login = $data['login'];
        $user -> email = $data['email'];
        $user -> password = password_hash($data['password'], PASSWORD_DEFAULT);
        R::store($user);
        echo '<div style="color: green" >Registration succeed! Go to <a href="/">main page<a/> to login</div><hr>';
        
        
    } 
    else 
    {
    echo '<div style="color: red" >'.array_shift($errors).'</div><hr>';
    }
    
    
    
}

?>

<form action='/singup.php' method='POST'>
    <p> 
        <p><strong>Your login</stong></p>
        <input type='text' name='login' value="<?php echo @$data['login']?>">
    </p>
    
    <p> 
        <p><strong>Your email</stong></p>
        <input type='email' name='email' value="<?php echo @$data['email']?>" >
    </p>
    
    <p> 
        <p><strong>Your password</stong></p>
        <input type='password' name='password' >
    </p>
    
    <p> 
        <p><strong>Repeat your password</stong></p>
        <input type='password' name='password2' >
    </p>
    
    <p>  
        <button type='submit' name='do_singup'>Register</button>
    </p>
</form>