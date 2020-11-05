<?php
    session_start();
    require ("connection.php");

    if(isset($_POST['login-user'])){
        $username = $_POST['txt-username'];
        $password = $_POST['txt-password'];

        if(empty($username)){
            $_SESSION['error'] = "Username required.";
            header("Location: login.php");
        }
        else if(empty($password)){
            $_SESSION['error'] = "Password required.";
            header("Location: login.php");
        }
        else{
            $select_stmt = $db->prepare("select * from member where username ='$username' and password ='$password'");
            $select_stmt->execute();
            $result = $select_stmt->fetch(PDO::FETCH_ASSOC);
            if(count($result)){
                $username = $result['username'];
                $_SESSION['username'] = $username;
                header("Location: index.php");
                unset($_SESSION['error']);

            }else{
                $_SESSION['error'] = "Username or Password Went Wrong!";
            }
        }

    }else{
        $_SESSION['error'] = "Something Wrong!";
        header("Location: login.php");
    }

?>