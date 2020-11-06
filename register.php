<?php require_once("connection.php"); ?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div class="container d-flex justify-content-center">

        <?php
        if (isset($_REQUEST['btn_insert'])) {
            $u_username = strip_tags($_REQUEST['txt-username']);
            $u_password = strip_tags($_REQUEST['txt-password']);
            $u_firstname = strip_tags($_REQUEST['txt-firstname']);
            $u_lastname = strip_tags($_REQUEST['txt-lastname']);
            $u_email = strip_tags($_REQUEST['txt-email']);
            $u_phone = strip_tags($_REQUEST['txt-phone']);
            $u_status = "USER";
            $publickey = "";
            for ($i = 0; $i < 6; $i = $i + 1) {
                $publickey[$i] = strval(rand(0, 9));
            }
            $u_publickey = $publickey;
            // $insert_stmt = $db->prepare("INSERT INTO member(username,passwd,firstname,lastname,email,phone,public_key) VALUES ('$u_username','$u_password','$u_firstname','$u_lastname','$u_email','$u_address','$u_publickey')");
            // $insert_stmt->execute();
            $stmt = $db->prepare("INSERT INTO member(user_id,username,password,firstname,lastname,email,phone,status) VALUES (?,?,?,?,?,?,?,?)");
            $stmt->execute([null, $u_username, $u_password, $u_firstname, $u_lastname, $u_email, $u_phone, $u_status]);

            header("Location: login.php");
        }
        ?>
        
        <div <i class="fa fa-align-center" aria-hidden="true"></i>
        &ensp;
            <div class="row centered-form">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Register</h1>
                        <h3 class="panel-title">Please sign up for SHOOTING</h3>
                    </div>
                    <div class="panel-body">
                        <form name="regis" id="regis" role="form" onsubmit="return validateForm()" method="post" action="register_db.php">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="firstname" id="first_name" class="form-control input-sm" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="lastname" id="last_name" class="form-control input-sm" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="username" id="username" class="form-control input-sm" placeholder="User Name" >
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="phone" id="phone" class="form-control input-sm" placeholder="Phone" maxlength="10" pattern="[0-9]{1,}" title="กรอกตัวเลขเท่านั้น" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" ">
                                <input  onBlur=" checkAvailability()" type=" email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                            </div>

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input onchange='check_pass();' type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input onchange='check_pass();' type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>

                            <input type="submit" value="Register" id="submit" class="btn btn-info btn-block">
                            <!-- <input type="submit" value="Register" id="submit" class="btn btn-info btn-block" onclick="window.location='login.php'"> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function check_emty() {
            if (document.getElementById('first_name').value == "") {
                document.getElementById('submit').disabled = true;
            }
            if (document.getElementById('last_name').value == "") {
                document.getElementById('submit').disabled = true;
            }
            if (document.getElementById('username').value == "") {
                document.getElementById('submit').disabled = true;
            } else {
                document.getElementById('submit').disabled = false;
            }

        }

        function check_pass() {
            if (document.getElementById('password').value ==
                document.getElementById('password_confirmation').value) {
                document.getElementById('submit').disabled = false;
            } else {
                document.getElementById('submit').disabled = true;
            }
        }

        function validateForm() {
            var first_name = document.forms["regis"]["first_name"].value;
            var last_name = document.forms["regis"]["last_name"].value;
            var username = document.forms["regis"]["username"].value;
            var password = document.forms["regis"]["password"].value;
            var password_confirmation = document.forms["regis"]["password_confirmation"].value;
            if (first_name == "") {
                alert("Please fill out this form.");
                return false;
            }
            if (last_name == "") {
                alert("Please fill out this form.");
                return false;
            }
            if (username == "") {
                alert("Please fill out this form.");
                return false;
            }
            if (password == "" && password_confirmation == "") {
                alert("Please fill out this form.");
                return false;
            }

        }

        $("#username").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "checkmail.php",
                        type: "post"
                    }
                }
            },
            messages: {
                email: {
                    required: "Please Enter Email!",
                    email: "This is not a valid email!",
                    remote: "Email already in use!"
                }
            }
        });

        function checkAvailability() {

        }
    </script>
    <!--<form method="post" action="register_db.php">
            <div class="form-group">
                <label for="Username">Username</label>
                <input type="text" class="form-control" id="username" maxlength="10" name="txt-username" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="password" name="txt-password" maxlength="10" required>
            </div>
            <div class="form-group">
                <label for="Firstname">Firstname</label>
                <input type="text" class="form-control" id="firstname" name="txt-firstname" required>
            </div>
            <div class="form-group">
                <label for="Lastname">Lastname</label>
                <input type="text" class="form-control" id="lastname" name="txt-lastname" required>
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" class="form-control" id="email" name="txt-email" required>
            </div>
            <div class="form-group">
                <label for="Phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="txt-phone" maxlength="10" required>
            </div>
            <button type="submit" class="btn btn-success" name="btn_insert" value="Insert">Register</button>
            <a href="login.php" class="btn btn-danger">Back</a>
        </form>!-->
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>