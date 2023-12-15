<?php

include __DIR__ . '/Authentification.php';                 
          
if(isset($_POST)){

    $fullname = htmlspecialchars($_POST['fullname']);
    $Username = htmlspecialchars($_POST['Username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['passwords']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);

    session_start();

    session_unset();

    $set_user = new Authentification();
    
    $set_user->registration($fullname,$Username,$email,$password,$confirm_password);

}  
    
?>

