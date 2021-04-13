<?php
    class User{

        public $db = null;

        public function __construct(DBController $db){
            if(!isset($db -> con)) return null;
            $this -> db = $db;
        }

        public function user_login($username, $password) { 
            
            
            //Check empty input form
            if(isset($username) && isset($password)) {
                header('Location: index.php');
               
                // $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password' LIMIT 1";
                // $result = $this -> db -> con -> query($query); //Execute the command

                // if($result) {
                //     //Take data
                   
                //     $value = $result -> fetch_assoc(); 
                //     echo  $value ;
                //     //Back to index page
                    
                    
                // }

                //return $value;
            }
        }
    }
?>