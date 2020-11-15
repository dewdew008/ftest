<?php
    session_start();
    require ("connection.php");
    require ("RSA.class.php");
    if(isset($_POST['login-user'])){
        $username = $_POST['txt-username'];
        $password = $_POST['txt-password'];
        $p = 2;
        $q = 31;
        $cipher =  RSA::Cryptosystem_En($password,$p,$q);
        $password = $cipher;

        if(empty($username)){
            $_SESSION['error'] = "Username required.";
            header("Location: login.php?text=Username required.");
        }
        else if(empty($password)){
            $_SESSION['error'] = "Password required.";
            header("Location: login.php?text=Password required.");
        }
        else{
            $select_stmt = $db->prepare("select * from member where username ='$username' and password ='$password'");
            $select_stmt->execute();
            $result = $select_stmt->fetch(PDO::FETCH_ASSOC);
            if(count($result)){
                $username = $result['username'];
                $user_id = $result['user_id'];
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $user_id;
                header("Location: index.php");
                unset($_SESSION['error']);

            }else{
                $_SESSION['error'] = "Username or Password Went Wrong!";
            }
        }

    }else{
        $_SESSION['error'] = "Something Wrong!";
        header("Location: login.php?text=Something Wrong!");
    }
