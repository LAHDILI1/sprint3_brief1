<?php

//namespace App\Controller;
//require __DIR__ . '/../../vendor/autoload.php';

include __DIR__ . '/../../models/Users.php';


class Authentification {

    private $objetUser;

    public function __construct(){
        $this -> objetUser = new Users();
    }

    public function registration($fullname,$Username,$email,$password,$confirm_password) {
       
        $deuplicate = $this -> objetUser->select_user($Username,$email);

        $_SESSION ['fullname'] = $fullname ;
        $_SESSION ['Username'] = $Username ;
        $_SESSION ['email'] = $email ;
        $_SESSION ['password'] = $password ;
        $_SESSION ['confirm_password'] = $confirm_password ;

        if(mysqli_num_rows($deuplicate) > 0) { // user username or email is already taken
            echo 'user username or email is already taken';
            $_SESSION ['error_user'] = 'user username or email is already taken';
            header('Location:http://localhost/sprint3_brief1/views/auth/register1.php');
        }

        else {
            echo 'register is currently';

            $insert_user = $this -> objetUser -> add_user($fullname, $email, $Username, $confirm_password);

           if($insert_user) {
           echo 'Votre compte a été crée avec succés';
           header('Location:http://localhost/sprint3_brief1/views/auth/login1.php');
            } else {
                     echo 'Erreur de connexion: ';
                }
    }

        }

        public function login($Username,$passwords){

            if(empty($Username)) {
                $Username_error = 'Username is required';
            }
            
            if(empty($passwords)) {
                $passwords_error = 'Password is required';
            }
            
            if(empty($Username_error) && empty($passwords_error)) {

                $result = $this -> objetUser->select_user2($Username);

                if(!$result) {
                     
                    $Username_error = 'This username does not exist';
                } else if($passwords !=$result['passe_word']) {
                    //!password_verify($passwords, $result['passe_word'])
                     
                        $passwords_error = 'The password is incorrect';
                    }
        
                    if(!empty($Username_error) || !empty($passwords_error)){
                        $_SESSION["Username_error"] = $Username_error ;
                        $_SESSION["passwords_error"] = $passwords_error ;
            
                        $_SESSION["Username"] = $Username ;
                        $_SESSION["passwords"] = $passwords ;
                        header('Location:http://localhost/sprint3_brief1/views/auth/login1.php');
                        //header('Location:http://localhost//briefs4_sprint3/Pages/authentification/login.php');
                    }
                    
                    else {
                        $_SESSION["Username_error"] = $Username_error ;
                        $_SESSION["passwords_error"] = $passwords_error ;
        
                        if($result['role_id'] == 1){
                            header('Location:http://localhost/sprint3_brief1/views/admin/dashboard.php');
                            //header('Location:http://localhost//briefs4_sprint3/Pages/authentification/admin/dashboard_admin.php');
                        } else if($result['role_id'] == 2){
                            header('Location:http://localhost/sprint3_brief1/views/developpeur/home.php');
                           // header('Location:http://localhost//briefs4_sprint3/Pages/authentification/developpeur/dashboard_developpeur.php');
                        } else {
                            //header('Location:http://localhost/sprint3_brief1/developpeur/home.php');
                            header('Location:http://localhost//briefs4_sprint3/Pages/authentification/visiteur/dashboard_visiteur.php');
                        }
                    
                }
            }
        }

        
    }




 
?>