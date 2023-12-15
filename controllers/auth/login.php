<?php
include __DIR__ . '/Authentification.php';

if(isset($_POST['submit'])) { 

    $Username = $_POST['Username'];
    $passwords = $_POST['passwords'];

    session_start();
    session_unset();

    $set_user = new Authentification();
    
    $set_user->login($Username,$passwords);

}

?>