<?php require("connection.php");
session_start();
if(isset($_GET['text'])){
    $mess = $_GET['text'];
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">
    <title>Signin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
<div>
&ensp;
</div>
    <div class="container-fluid">
        <div class="d-flex justify-content-center h-300">
            <div class="card" style="width: 25rem;">
            
                <div class="card-header">
                    <h1>Sign in</h1>
                </div>
                <hr>
                <?php
                if (isset($mess)) {

                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $mess; 
                        ?>
                    </div>

                <?php
                }
                ?>
                <div class="card-body">
                    <form method="post" action="login_db.php">
                        <div class="form-group">
                            <label for="Username">Username</label>
                            <input type="text" class="form-control" id="username" maxlength="10" name="txt-username">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="password" name="txt-password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success float-right login_btn" name="login-user">Sign in</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        <a>Don't have an account?  </a> <a href="register.php">  Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>