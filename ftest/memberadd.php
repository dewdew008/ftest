<?php  require_once("connection.php"); ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Register</h1>
<?php
//if ($_POST['btn_insert']) {
//    $u_username = $_POST['username'];
//    $u_password = $_POST['password'];
//    $u_firstname = $_POST['firstname'];
//    $u_lastname = $_POST['lastname'];
//    $u_email = $_POST['email'];
//    $u_address = $_POST['address'];
//
//    $publickey = "";
//    for($i = 0; $i < 6 ;$i++){
//        $publickey[$i] = strval(rand(0,9));
//    }
//    $insert_stmt = $db->prepare("insert into member(username,passwd,firstname,lastname,email,address,public_key) values ('$u_username','$u_password','$u_firstname','$u_lastname','$u_email','$u_email','$u_address','$publickey')");
//    if ($insert_stmt->execute()){
//        $insertMsg = "Insert Successfully . . .";
//        header("Location: login.php");
//    }
//    ?>
    <?php
    if (isset($_REQUEST['btn_insert']))
    {
        $u_username = strip_tags($_REQUEST['txt-username']);
        $u_password = strip_tags($_REQUEST['txt-password']);
        $u_firstname = strip_tags($_REQUEST['txt-firstname']);
        $u_lastname = strip_tags($_REQUEST['txt-lastname']);
        $u_email = strip_tags($_REQUEST['txt-email']);
        $u_phone = strip_tags($_REQUEST['txt-phone']);
        $u_status = "USER";
        $publickey = "";
        for ($i = 0; $i < 6 ; $i = $i + 1){
            $publickey[$i] = strval(rand(0,9));
        }
        $u_publickey = $publickey;
        // $insert_stmt = $db->prepare("INSERT INTO member(username,passwd,firstname,lastname,email,phone,public_key) VALUES ('$u_username','$u_password','$u_firstname','$u_lastname','$u_email','$u_address','$u_publickey')");
        // $insert_stmt->execute();
        $stmt = $db->prepare("INSERT INTO member(user_id,username,password,firstname,lastname,email,phone,status) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->execute([null,$u_username,$u_password,$u_firstname,$u_lastname,$u_email,$u_phone,$u_status]);

        header("Location: login.php");
    }


    ?>

    <form method="post">

        <div class="form-group">
            <label for="Username">Username</label>
            <input type="text" class="form-control" id="username" maxlength="10" name="txt-username" >
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="password" name="txt-password" maxlength="10">
        </div>
        <div class="form-group">
            <label for="Firstname">Firstname</label>
            <input type="text" class="form-control" id="firstname" name="txt-firstname">
        </div>
        <div class="form-group">
            <label for="Lastname">Lastname</label>
            <input type="text" class="form-control" id="lastname" name="txt-lastname">
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" id="email" name="txt-email">
        </div>
        <div class="form-group">
            <label for="Phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="txt-phone" maxlength="10">
        </div>
        <button type="submit" class="btn btn-success" name="btn_insert" value="Insert">Register</button>
        <a href="login.php" class="btn btn-danger">Back</a>
    </form>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
